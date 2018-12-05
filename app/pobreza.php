<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pobreza extends Model
{
    //
    public function familia(){
        return $this->hasMany('App\pobreza_familia');
    }
}
