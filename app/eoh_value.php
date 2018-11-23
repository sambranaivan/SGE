<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class eoh_value extends Model
{
    //
    public function eoh(){
        return $this->belongsTo('App\eoh');
    }

    public function getHotel()
    {
        return $this->eoh->hotel;
    }

    public function getPorcentual(){
        return ($this->ocupadas / $this->getHotel()->plazas);
    }


}
