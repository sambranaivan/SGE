<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class valor_tabla extends Model
{
    //

    public function getTabla(){
        return $this->belongsTo('App\tabla');
    }
}
