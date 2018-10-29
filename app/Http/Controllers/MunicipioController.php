<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\municipio;
class municipioController extends Controller
{
    //

    public function test(){
        $m = Municipio::find(1);

        print($m->toJson());
    }
}
