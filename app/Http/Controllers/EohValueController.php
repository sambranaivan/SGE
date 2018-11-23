<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\hotel;
use App\eoh;
use App\eoh_value;

class EohValueController extends Controller
{
//
public function reporte()
{
        $user = 2; //usuario de la encuesta
        $day = '2018-11-16';



        /**
         * Busco todos lo hoteles de la muestra*/
        $h = hotel::whereRaw('muestra = 1 or municipio_id = 15')->get();
        // return $h;
         /**
          *
         * pregunto si fueron encuestado en eoh_values en esa fecha
         * si esta no hago nada y seteo ponderado = false
         * si no esta creo un nuevo eoh_values con la ponderacion
         * primero tengo que obtener las ponderaciones
         */
        $i = 0;
        foreach ($h as $key => $hotel)
        {   $i++;
            $ocupacion = $hotel->hasOcupacion($day,$user);
            if($ocupacion)//tiene encuesta de ocupacion ese dia?
            {
                // echo $i."-".$hotel->denominacion.":".($ocupacion->getPorcentual()*100)."id:".$ocupacion->id."</br>";
                //si tiene no hago nada
                //busco la ocupacion (eoh_values) de ese dia y seteo ponderado = 0
                $ocupacion->ponderado = false;
                // $ocupacion->save();
            }
            else {
                ///no esta encuestado
                //buscar ponderacion
                 echo $i."-".$hotel->denominacion.":No Ponderando:->";

                 echo $this->ponderacion($hotel,$day,$user);

                 echo "</br>";
            }

        }

}


////get ponderacion
    public function ponderacion($hotel,$dia,$user)
    {
        echo 'Ponderacion('.$dia.')';

// SELECT municipio_id, avg(ocupadas/plazas) * 100 as ponderador FROM `eoh_values` v
// left JOIN eohs e
// on e.id = v.eoh_id
// LEFT JOIN hotels h
// on h.id = e.hotel_id
// LEFT JOIN municipios m
// on m.id = h.municipio_id
// WHERE fecha = '2018-11-16'
// and m.id = 15
// and e.user_id =2
// GROUP by municipio_id

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



}
