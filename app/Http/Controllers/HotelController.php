<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hotel;
class HotelController extends Controller
{
    //

    public function getHotel($id)
    {
        $h = Hotel::find($id);
        return $h->toJson();
    }
}
