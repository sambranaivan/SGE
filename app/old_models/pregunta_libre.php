<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pregunta_libre extends Model
{
    /**
	 * Overload model constructor.
	 *
	 */
        public function construct ($pregunta,$encuesta_id,$type="text")
        {
                $this->pregunta = $pregunta;
                $this->encuesta_id = $encuesta_id;
                $this->type = $type;
                $this->save();

        }

        public function name(){
            return 'libre_'.$this->id;
        }
}
