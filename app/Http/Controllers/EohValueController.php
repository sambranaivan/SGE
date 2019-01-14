<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\hotel;
use App\eoh;
use App\User;
use App\eoh_value;
use DatePeriod;
use DateTime;
use DateInterval;
class EohValueController extends Controller
{
//

public function reporte(){
    $this->getReport(2,'2018-11-16','2018-11-19');
}


public function cierre(){
    $u = User::all();

    return view('turismo.cierre')->with('users',$u);
}

public function showReporte($desde,$hasta,$user)
{

$values = DB::table('eoh_values')->select('eoh_values.id as id','fecha','day','ocupadas','fecha','porcentaje','ponderado','municipios.nombre','porcentaje','hotels.denominacion as hotel')
       ->leftJoin('eohs','eohs.id',"=",'eoh_values.eoh_id')
       ->leftJoin('hotels','eohs.hotel_id',"=",'hotels.id')
       ->leftJoin('municipios','municipios.id',"=",'hotels.municipio_id')
       ->where('eohs.user_id',$user)
       ->whereDate('fecha','>=',$desde)
       ->whereDate('fecha','<=',$hasta)
       ->orderBy('nombre','desc')
       ->get();
// echo $values->toJson();
    //    print_r($values);
return view('turismo.reporte')->with('values',$values);

}


public function getReport(request $request)
{
        $user = $request->user_id; //usuario de la encuesta
        $desde = $request->desde;
        $hasta = $request->hasta;
        // $day = '2018-11-16';
     $period = new DatePeriod(
     new DateTime($desde),
     new DateInterval('P1D'),
     new DateTime($hasta));

        /**
         * Busco todos lo hoteles de la muestra*/
        $h = hotel::whereRaw('muestra = 1 or municipio_id = 15')->get();
        // return $h;
         /**
         * pregunto si fueron encuestado en eoh_values en esa fecha
         * si esta no hago nada y seteo ponderado = false
         * si no esta creo un nuevo eoh_values con la ponderacion
         * primero tengo que obtener las ponderaciones
         */
foreach ($period as $key => $date) {
        $day = $date->format('Y-m-d');
        $i = 0;
        foreach ($h as $key => $hotel)
        {   $i++;
            $ocupacion = $hotel->hasOcupacion($day,$user);
            if($ocupacion)//tiene encuesta de ocupacion ese dia?
            {
                //si tiene no hago nada
                //busco la ocupacion (eoh_values) de ese dia y seteo ponderado = 0
                $ocupacion->ponderado = false;
                $ocupacion->save();
            }
            else {
                ///no esta encuestado
                //buscar ponderacion
                 echo $i."-".$hotel->denominacion.":No Ponderando:->";

                 $ponderador = $this->getPonderacion($hotel,$day,$user);
                 echo $ponderador;

                 echo "</br>";

                 $this->createDummy($hotel,$day,$user,$desde,$hasta,$ponderador);
            }

        }

}//end foreach day_array



// mostrar reporte
return redirect('turismo/reporte/'.$desde.'/'.$hasta.'/'.$user);
}


////get ponderacion retorno ponderacon
//si hay categoria pondera
    public function getPonderacion($hotel,$dia,$user)
    {
        echo 'Ponderacion('.$dia.')';


       $pond = DB::table('eoh_values')
       ->leftJoin('eohs','eohs.id',"=",'eoh_values.eoh_id')
       ->leftJoin('hotels','hotels.id',"=",'eohs.hotel_id')
       ->leftJoin('municipios','municipios.id',"=",'hotels.municipio_id')
       ->where('fecha',$dia)
       ->where('municipios.id',$hotel->municipio_id)
       ->where('hotels.categoria',$hotel->categoria)
       ->where('eohs.user_id',$user)
       ->get();

       $i = 0;
       $ponderador = 0;
        foreach ($pond as $key => $value)
        {
            $i++;
            $eoh = eoh::find($value->eoh_id);
            $ponderador += ($value->ocupadas / $eoh->hotel->plazas);
        }
        if($i){
            return ($ponderador/$i) * 100;
        }
        else
        {
            ///ponderacion solo por municipio
 $pond = DB::table('eoh_values')
       ->leftJoin('eohs','eohs.id',"=",'eoh_values.eoh_id')
       ->leftJoin('hotels','hotels.id',"=",'eohs.hotel_id')
       ->leftJoin('municipios','municipios.id',"=",'hotels.municipio_id')
       ->where('fecha',$dia)
       ->where('municipios.id',$hotel->municipio_id)
    //    ->where('hotels.categoria',$hotel->categoria)
       ->where('eohs.user_id',$user)
       ->get();

       $i = 0;
       $ponderador = 0;
        foreach ($pond as $key => $value)
        {
            $i++;
            $eoh = eoh::find($value->eoh_id);
            $ponderador += ($value->ocupadas / $eoh->hotel->plazas);


        }
        if($i){
            return ($ponderador/$i) * 100;
        }



        }

    }



    //////CON LOS PONDERADOR CREO REGISTROS DUMMY EN LA BASE DE DATOS
    public function createDummy($hotel,$dia,$user,$desde,$hasta,$ponderador)
    {


        $ocupacionPonderada = ($hotel->plazas * $ponderador) / 100;

        ///crear eohs
        $e = new eoh();
        $e->desde = $desde;
        $e->hasta = $hasta;
        $e->hotel_id = $hotel->id;
        $e->user_id = $user;
        $e->save();
        ///crear eoh_values
        $v = new eoh_value();
        $v->eoh_id = $e->id;
        $v->day = date('w', strtotime($dia));;
        $v->fecha = $dia;
        $v->ocupadas = $ocupacionPonderada;
        $v->porcentaje = $ponderador;
        $v->ponderado = 1;
        $v->save();

    }



}
