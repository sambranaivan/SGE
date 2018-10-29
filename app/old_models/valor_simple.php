<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\pregunta_simple;
class valor_simple extends Model
{

    public function pregunta()
    {
        return $this->belongsTo('App\pregunta_simple','pregunta_simple_id');
    }
}
