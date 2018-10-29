<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\pregunta_libre;
use App\pregunta_simple;
use App\pregunta_multiple;
use App\tabla;
use App\consulta;
class encuesta extends Model
{
    //
    private $order = 1;

    function getOrder()
    {
        $o = $this->order;
        $this->order = $o + 1;
        return $o;

    }

    public function addTabla($titulo,$type,$opciones,$columnas)
    {
        $t = new Tabla();
        $t->order = $this->getOrder();
        $t->construct($titulo,$type,$opciones,$columnas,$this->id);
        return $this;
    }

    public function addLibre($pregunta,$type = 'text')
    {
        //crear la pregunta
        $l = new pregunta_libre();
        $l->order = $this->getOrder();
        $l->construct($pregunta,$this->id,$type);
        return $this;

    }
    public function addSimple($pregunta,$opciones)
    {
        //crear pregunta
        //crear opciones
        //asociar a encuenta
        $s = new pregunta_simple();
        $s->order = $this->getOrder();
        $s->construct($pregunta,$opciones,$this->id);
        //return
        return $this;
    }
     public function addMultiple($pregunta,$opciones)
    {
        //crear pregunta
        //crear opciones
        //asociar a encuenta
        $s = new pregunta_multiple();
        $s->order = $this->getOrder();
        $s->construct($pregunta,$opciones,$this->id);
        //return
        return $this;
    }

    //relaciones

    public function libres(){
        return $this->hasMany('App\pregunta_libre');
    }
    public function simples(){
        return $this->hasMany('App\pregunta_simple');
    }
    public function multiples(){
        return $this->hasMany('App\pregunta_multiple');
    }
      public function tablas(){
        return $this->hasMany('App\tabla');
    }

    public function consultas()
    {
    return $this->hasMany('App\consulta');
    }
}
