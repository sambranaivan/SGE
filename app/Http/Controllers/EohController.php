<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\eoh;
use App\hotel;
use App\eoh_value;
class EohController extends Controller
{
    //
    // turismo branch
public function index(){

    $h = Hotel::orderBy('zona')->orderby('localidad')->get();
    return view('turismo.eoh')->with('hoteles',$h);
}
public function save(Request $request)
{

    $e = new eoh();

    print_r($request->all());

    $e->desde = $request->desde;
    $e->hasta = $request->hasta;
    $e->hotel_id = $request->hotel;
    $e->plazas = $request->plazas;
    $e->reservas = $request->reservas;
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
    $e = eoh::all();
    return view('turismo.eohDetalle')->with('encuestas',$e);
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
