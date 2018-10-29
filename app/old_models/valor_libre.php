<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class valor_libre extends Model
{
       //
     public function pregunta()
    {
        return $this->belongsTo('App\pregunta_libre','pregunta_libre_id');
    }
}
