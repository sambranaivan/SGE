<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tabla extends Model
{
    /**
	 * Overload model constructor.
	 *
	 */
        public function construct ($pregunta,$type = 'text',$rows,$colums,$encuesta_id)
	{

            $this->pregunta = $pregunta;
            $this->encuesta_id = $encuesta_id;
            $this->type = $type;
            $this->save();
            $this->addColumns($colums);
            $this->addRows($rows);
            // Do great things...
    }

    public function addColumn($value)
    {
        $o = new column_tabla();
        $o->titulo = $value;
        $o->tabla_id = $this->id;
        $o->save();
    }

    public function addColumns($array)
    {
        foreach ($array as $key => $value)
        {
            $this->addColumn($value);
        }
    }

    public function columns()
    {
    return $this->hasMany('App\column_tabla');
    }

    // rows
    public function addrow($value)
    {
        $o = new row_tabla();
        $o->titulo = $value;
        $o->tabla_id = $this->id;
        $o->save();
    }

    public function addrows($array)
    {
        foreach ($array as $key => $value)
        {
            $this->addrow($value);
        }
    }

    public function rows()
    {
    return $this->hasMany('App\row_tabla');
    }
        public function name(){
            return 'tabla_'.$this->id;
        }


}
