<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class eoh extends Model
{
    //

    public function hotel()
    {
        return $this->belongsTo('App\hotel');
    }

    public function valores()
    {
        return $this->hasMany('App\eoh_value');
    }
}
