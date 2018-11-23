<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\eoh_values;
class hotel extends Model
{
    //

    public function construct($string)
    {
        $values = explode(';',$string);

            $this->zona = $values[0];
            $this->municipio_id = $values[1];
            $this->categoria = $values[2];
            $this->denominacion = $values[3];
            $this->habitacion = $values[4];
            $plaza = $values[5] == ''? null:$values[5];
            $this->plazas = $plaza;
            $this->titular = $values[6];
            $this->telefono = $values[7];
            $this->direccion = $values[8];
            $this->email = $values[9];
            $this->web = $values[10];
            $this->facebook = $values[11];
            $this->instagram = $values[12];
            $this->chekin = $values[13];
            $this->checkout = $values[14];
            $this->observaciones = $values[15];
            $this->situacion = $values[16];
            $this->estrellas = $values[17];
            $this->resolucion = $values[18];
            $this->save();

    }

    public function municipio()
    {
        return $this->belongsTo('App\municipio');
    }


    public function eoh(){
        return $this->hasMany('App\eoh');
    }


    public function hasOcupacion($fecha,$user_id)///return tipe eoh_values
    {
        foreach ($this->eoh as $key => $eoh)
        {
            if($eoh->user_id == $user_id)///coincide el usuario
            {
                    foreach ($eoh->valores as $key => $value)
                        {
                            if($value->fecha == $fecha) // si la fecha coincide
                            {

                                return $value;
                            }
                        }
            }
        }
        return false;

    }
}
