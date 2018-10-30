<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsTo('App\municipio','municipio_id','municipio_id');
    }
}
