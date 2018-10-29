<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\pregunta_simple;
use App\valor_simple;
class consulta extends Model
{
    //


public function simples()
{
    return $this->hasMany('App\valor_simple');
}
public function libres()
{
    return $this->hasMany('App\valor_libre');
}
public function multiples()
{
    return $this->hasMany('App\valor_multiple');
}


public function getTablas()
{
    return $this->encuesta()->tablas;
}



public function getTablaValor($t,$r,$c){
    $v = valor_tabla::where('consulta_id',$this->id)
    ->where('tabla_id',$t)
    ->where('row_tabla_id',$r)
    ->where('column_tabla_id',$c)->value('valor');
    return $v;
}


public function encuesta()
{
    return $this->belongsTo('App\encuesta');
}

}
