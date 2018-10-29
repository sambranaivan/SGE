<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\option_simple;
class pregunta_simple extends Model
{
    /**
	 * Overload model constructor.
	 *
	 */
        public function construct ($pregunta,$options,$encuesta_id)
	{

            $this->pregunta = $pregunta;
            $this->encuesta_id = $encuesta_id;
            $this->save();
            $this->addOptions($options);
            // Do great things...
    }

    public function addOption($key,$value)
    {
        $o = new option_simple();
        $o->titulo = $value;
        $o->valor = $value;
        $o->pregunta_simple_id = $this->id;
        $o->save();
    }

    public function addOptions($array)
    {
        foreach ($array as $key => $value)
        {
            $this->addOption($key,$value);
        }
    }

    public function options()
    {
    return $this->hasMany('App\option_simple');
    }


        public function name(){
            return 'simple_'.$this->id;
        }
}
