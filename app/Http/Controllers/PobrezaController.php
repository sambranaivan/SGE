<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pobreza;
use App\pobreza_familia;
use App\User;

class PobrezaController extends Controller
{
    //

    public function post(Request $request)
    {
        $p = new Pobreza();
        $p->participacion = $request->participacion;
        $p->semana = $request->semana;
        $p->trimestre = $request->trimestre;
        $p->anio = $request->anio;
        $p->area = $request->codigo_area;
        $p->numero_vivienda = $request->vivienda_numero;
        $p->direccion = $request->direccion;
        $p->telefono = $request->telefono;
        $p->miembros = $request->miembros;

        if($request->cuanto_option_1 == "1"){$p->trabajo = $request->cuanto_value_1;}
        if($request->cuanto_option_2 == "1"){$p->jubilacion = $request->cuanto_value_2;}
        if($request->cuanto_option_3 == "1"){$p->despido = $request->cuanto_value_3;}
        if($request->cuanto_option_4 == "1"){$p->desempleo = $request->cuanto_value_4;}
        if($request->cuanto_option_5 == "1"){$p->subsidio = $request->cuanto_value_5;}
        if($request->cuanto_option_6 == "1"){$p->alquiler = $request->cuanto_value_6;}
        if($request->cuanto_option_7 == "1"){$p->negocio = $request->cuanto_value_7;}
        if($request->cuanto_option_8 == "1"){$p->intereses = $request->cuanto_value_8;}
        if($request->cuanto_option_9 == "1"){$p->beca = $request->cuanto_value_9;}
        if($request->cuanto_option_10 == "1"){$p->cuota_alimentos = $request->cuanto_value_10;}

        $p->save();


        for ($i=1; $i <= $request->miembros ; $i++)
        {

            $f = new Pobreza_familia();
            $f->sexo = $request->input('sexo_'.$i);
            $f->edad = $request->input('edad_'.$i);
            $f->pobreza_id = $p->id;
            $f->save();
        }

        return redirect('/pobreza/reporte');

    }

    public function reporte(){
        $p = pobreza::all();

        return view('pobreza.pobreza_reporte')->with('pobreza',$p);
    }


}
