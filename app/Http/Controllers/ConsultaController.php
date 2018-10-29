<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\valor_simple;
use App\valor_libre;
use App\valor_multiple;
use App\valor_tabla;
use App\Consulta;
class ConsultaController extends Controller
{
    //
   public function save(Request $request)
    {
        //recorrer el request
        //identificar tipo de pregunta
        ///guardar en cada base de datos
        $c = new Consulta();
        $c->encuesta_id = $request->encuesta_id;
        $c->save();

            foreach ($request->all() as $key => $value)
            {
                $k = explode('_',$key);
                // print_r($k);
                switch($k[0])
                {
                    case 'simple':
                    $l = new valor_simple();
                    $l->consulta_id = $c->id;
                    $l->pregunta_simple_id = $k[1];
                    $l->valor = $value;
                    $l->save();
                    break;
                    case 'libre':
                    $l = new valor_libre();
                    $l->consulta_id = $c->id;
                    $l->pregunta_libre_id = $k[1];
                    $l->valor = $value;
                    $l->save();
                    break;
                    case 'multiple':
                    $m = new valor_multiple();
                    break;
                    case 'tabla':
                    $t = new valor_tabla();
                    $t->consulta_id = $c->id;
                    $t->tabla_id= $k[1];
                    $t->row_tabla_id = $k[2];
                    $t->column_tabla_id = $k[3];
                    $t->valor = $value;
                    $t->save();
                    break;
                }
            }

        return redirect('confirmacion/'.$c->id);


    }


    public function show($id)
    {
        $c = Consulta::find($id);
        return view('confirmacion')->with('consulta',$c);
    }
}
