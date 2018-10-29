<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class valor_multiple extends Model
{
   //
     public function pregunta()
    {
        return $this->belongsTo('App\pregunta_multiple','pregunta_multiple_id');
    }
}
