<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hotel;
use App\municipio;
class MunicipioController extends Controller
{
    //

    public function getHotels($id)
    {
        $m = Municipio::find($id);
        return $m->hoteles->toJson();
    }

}
