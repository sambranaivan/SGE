<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EncuestaController extends Controller
{
    //

    public function index(){

        return view('encuestas');
    }

     public function listado(){

        return view('listado');
    }


    public function show($id){
        // $e = encuesta::find($id);
        // return view('encuesta')->with('encuesta',$e);
    }
       public function showDetalle($id){
        // $e = encuesta::find($id);
        // return view('encuestaDetalle')->with('encuesta',$e);
    }


    public function crear(Request $request){
        // $e = new Encuesta();
        // $e->titulo($request->titulo);

        // return redirect('editencuesta')->with('encu')
    }


}
