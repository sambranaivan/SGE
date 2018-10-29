<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class municipio extends Model
{
    //
    public function construct($d)
    {
        //   $table->increments('id'
            $this->municipio_id = $d['id'];
            $this->nombre = $d['nombre'];
            $this->url = $d['url'];
            $this->logo = $d['logo'];
            $this->microrregion_id = $d['microrregion_id'];
            $this->indec_id = $d['indec_id'];
            $this->indec_nombre= $d['indec_nombre'];
            $this->departamento_id = $d['departamento_id'];
            $this->save();

    }

}
