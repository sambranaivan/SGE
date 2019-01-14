<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\eoh;
use App\hotel;
use App\municipio;
use App\eoh_value;
use App\User;
class EohController extends Controller
{
    //
    // turismo branch
public function index(){

    // $h = Hotel::orderBy('zona')->orderby('municipio_id')->get();
    //$m = Municipio::all();

    //$models = Member::hydrateRaw( "SELECT * FROM members...");
    $results = DB::select('SELECT DISTINCT m.* from municipios m
LEFT JOIN hotels h
on m.id = h.municipio_id
where h.muestra = true');
    $m = Municipio::hydrate($results);

    return view('turismo.eoh')->with('municipios',$m);
}
public function save(Request $request)
{

    $e = new eoh();

    print_r($request->all());

    $e->desde = $request->desde;
    $e->hasta = $request->hasta;
    $e->hotel_id = $request->hotel;
    // $e->plazas = $request->plazas;
    $e->reservas = $request->reservas;
    $e->user_id = Auth::user()->id;
    $e->save();

    if($request->has('fecha_0'))
    {
        $v = new eoh_value();
        $v->eoh_id = $e->id;
        $v->day = $request->day_0;
        $v->fecha = str_replace('/','-',$request->fecha_0);
        $v->ocupadas = $request->plaza_0;
        $v->porcentaje = $request->porcentaje_0;
        $v->save();
    }
    if($request->has('fecha_1'))
    {
        $v = new eoh_value();
        $v->eoh_id = $e->id;
        $v->day = $request->day_1;
        $v->fecha = str_replace('/','-',$request->fecha_1);
        $v->ocupadas = $request->plaza_1;
        $v->porcentaje = $request->porcentaje_1;
        $v->save();
    }
    if($request->has('fecha_2'))
    {
        $v = new eoh_value();
        $v->eoh_id = $e->id;
        $v->day = $request->day_2;
        $v->fecha = str_replace('/','-',$request->fecha_2);
        $v->ocupadas = $request->plaza_2;
        $v->porcentaje = $request->porcentaje_2;
        $v->save();
    }
    if($request->has('fecha_3'))
    {
        $v = new eoh_value();
        $v->eoh_id = $e->id;
        $v->day = $request->day_3;
        $v->fecha = str_replace('/','-',$request->fecha_3);
        $v->ocupadas = $request->plaza_3;
        $v->porcentaje = $request->porcentaje_3;
        $v->save();
    }

    if($request->has('fecha_4'))
    {
        $v = new eoh_value();
        $v->eoh_id = $e->id;
        $v->day = $request->day_4;
        $v->fecha = str_replace('/','-',$request->fecha_4);
        $v->ocupadas = $request->plaza_4;
        $v->porcentaje = $request->porcentaje_4;
        $v->save();
    }

    return redirect('turismo/eoh/confirmar/'.$e->id);

}
public function confirmar($id){
    $e = eoh::find($id);
    $arrayDias = ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'];
    return view('turismo.eohConfirmar')->with('encuesta',$e)->with('arrayDias',$arrayDias);
}
public function show(){

    //TODO
    // SELECT DISTINCT desde,hasta, IF(IFNULL(reservas,0) = 0,'Ocupacion','Reserva') as tipo from eohs
    // $e = eoh::all();
    if(Auth::user()->id == 1)
    {
        $e = eoh::all();

    }
    else{
        $e = Auth::user()->eoh;

    }

    // rangos



    return view('turismo.eohDetalle')->with('encuestas',$e)->with('default',true);
}



// con filtro
public function showfilter(Request $request){


    if(Auth::user()->id == 1)
    {
        if($request->tipo == "reserva"){
        $e = eoh::whereDate('desde','>=',$request->desde)
        ->whereDate('hasta','<=',$request->hasta)->whereNotNull('reservas')->get();
        }
        else
        {
        $e = eoh::whereDate('desde','>=',$request->desde)
        ->whereDate('hasta','<=',$request->hasta)->whereNull('reservas')->get();
        }

    }
    else{
        // $e = Auth::user()->eoh

         if($request->tipo == "reserva"){
        $e = eoh::whereDate('desde','>=',$request->desde)
        ->whereDate('hasta','<=',$request->hasta)->whereNotNull('reservas')->where('id','=',Auth::user()->id)->get();
        }
        else
        {
        $e = eoh::whereDate('desde','>=',$request->desde)
        ->whereDate('hasta','<=',$request->hasta)->whereNull('reservas')->where('id','=',Auth::user()->id)->get();
        }

    }




    // echo($request->input('tipo'));
    return view('turismo.eohDetalle')->with('encuestas',$e)->with('default',false);
}


public function delete($id)
{
    $e = eoh::find($id);
    $e->delete();

    return redirect('turismo/eoh/detalle');
}

public function cancel($id)
{

    $e = eoh::find($id);
    $e->delete();

    return redirect('turismo/eoh')->with('mensaje','Envio cancelado');
}

}
