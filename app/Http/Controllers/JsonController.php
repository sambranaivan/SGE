<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\json;
use App\carnaval;
use App\pesca;
use DB;
class JsonController extends Controller
{
    //

    public function recieve(Request $request)
    {
    	$data = new json;
    	$data->data = $request->getContent();
    	$data->save();
    	// guardo los datos originales
    	$this->process($data->data);
    	// proceso la informacion recibida


    }

    public function recievePesca(Request $request){
        $data = new json;
    	$data->data = $request->getContent();
    	$data->save();
    	// guardo los datos originales
    	$this->processPesca($data->data);
    	// proceso la informacion recibida
    }

    public function process($data)
    {

    	$json = json_decode($data);

    	foreach ($json as $encuesta) {
    		///genero hash unico
    		$hash = $encuesta->userid.$encuesta->timestamp;
    		///me fijo si existe el hash

    		if( carnaval::where('hash','=',$hash)->exists())
    			{

    				echo "existe";
    			}
    			else
    			{
    				echo "no existe";
    				// no existe creo
    				$this->registrar($encuesta);

    			}

    		// return;

    	}


    }


    //

 public function processPesca($data)
    {

    	$json = json_decode($data);

    	foreach ($json as $pesca) {
    		///genero hash unico
    		$hash = $pesca->userid.$pesca->timestamp;
    		///me fijo si existe el hash

    		if( pesca::where('hash','=',$hash)->exists())
    			{

    				echo "existe";
    			}
    			else
    			{
    				echo "no existe";
    				// no existe creo
    				$this->registrarPesca($pesca);

    			}

    		// return;

    	}


    }


    public function registrar($data)
    {
    	$carnaval = new carnaval;
    	$hash = $data->userid.$data->timestamp;
    	$carnaval->hash = $hash;

		$carnaval->procedencia = $data->procedencia;
		$carnaval->sexo = 	$data->sexo;
		$carnaval->edad = 	$data->edad;
		$carnaval->viaje = 	$data->viaje;
		$carnaval->cantidad_personas = 	$data->viaje_cantidad;

		if($data->informo == 'otro')
		{$carnaval->informo = $data->otros_informo;}
		else
		{$carnaval->informo = $data->informo;}

		if($data->motivo == 'otro')
		{$carnaval->motivo = $data->otro_motivo;}
		else
		{$carnaval->motivo = $data->motivo;}

		if($data->transporte == 'otro')
		{$carnaval->transporte = $data->otro_transporte;}
		else
		{$carnaval->transporte = $data->transporte;}

		$carnaval->lugar_alojamiento = $data->alojamiento;
		$carnaval->tipoalojamiento = $data->tipoalojamiento;
		$carnaval->primeravez = $data->primeravez;
		// $carnaval->recomendaria = $data->recomendaria;
		
            $carnaval->gastos = $data->gastos;
      
            
            if(isset($data->opinion))
            {
                $carnaval->opinion = $data->opinion;    
            }
            else
            {
             $carnaval->opinion = null;       
            }
        $carnaval->userid = $data->userid;
        $carnaval->latitud = $data->latitud;
        $carnaval->longitud = $data->longitud;
		$carnaval->timestamp = $data->timestamp;
		$carnaval->save();
		echo $carnaval->id;


    }


     public function registrarPesca($data)
    {
    	$pesca = new pesca;
    	$hash = $data->userid.$data->timestamp;
    	$pesca->hash = $hash;

        $pesca->latitud = $data->latitud;
        $pesca->longitud = $data->longitud ;
        $pesca->userid = $data->userid ;
        $pesca->timestamp = $data->timestamp ;
        $pesca->localidad = $data->localidad ;
        $pesca->concurso = $data->concurso ;
        $pesca->fecha = $data->fecha ;
        $pesca->procedencia = $data->procedencia ;
        $pesca->cuantas_personas = $data->cuantas_personas ;
        $pesca->tipo_alojamiento = $data->tipo_alojamiento ;
        $pesca->cuantas_noches = $data->cuantas_noches ;
        $pesca->gasto_alojamiento = $data->gasto_alojamiento ;
        $pesca->cuantos_dias = $data->cuantos_dias ;
        $pesca->cuantas_participo = $data->cuantas_participo ;
        $pesca->informo = $data->informo ;
        $pesca->gasto_salida = $data->gasto_salida ;
        $pesca->uso_guia = $data->uso_guia ;
        $pesca->participo_pesca = $data->participo_pesca ;
        $pesca->modalidad_pesca = $data->modalidad_pesca ;
        $pesca->actividad_cena = $data->actividad_cena ;
        $pesca->actividad_show = $data->actividad_show ;
        $pesca->actividad_exposicion = $data->actividad_exposicion ;
        $pesca->actividad_feria = $data->actividad_feria ;
        $pesca->volveria = $data->volveria ;
        $pesca->gastos_alimentos = $data->gastos_alimentos ;
        $pesca->gastos_artesanias = $data->gastos_artesanias ;
        $pesca->gastos_transporte = $data->gastos_transporte ;
        $pesca->volveria_visitar = $data->volveria_visitar ;
        $pesca->volveria_porque = $data->volveria_porque ;
        $pesca->evalua_alojamiento = $data->evalua_alojamiento ;
        $pesca->evalua_gastronomia = $data->evalua_gastronomia ;
        $pesca->evalua_info_turistica = $data->evalua_info_turistica ;
        $pesca->evalua_excursiones = $data->evalua_excursiones ;
        $pesca->evalua_limpieza = $data->evalua_limpieza ;
        $pesca->evalua_seguridad = $data->evalua_seguridad ;
        $pesca->evalua_naturaleza = $data->evalua_naturaleza ;
        $pesca->evalua_accesso = $data->evalua_accesso ;
        $pesca->timestamp = $data->timestamp ;

		$pesca->save();
		echo $pesca->id;


    }

    // api results
    public function reporte(){
        return $this->report(1);
    }

    public function report($dia){

        switch ($dia) {
                case 99:
                    $desde = '2018-02-08 20:00:00';
                    $hasta = '2020-03-05 08:00:00';
                    break;
               case 11:
                    $desde = '2019-02-08 20:00:00';
                    $hasta = '2019-03-05 08:00:00';
                    break;
                case 12:
                    $desde = '2019-02-17 20:00:00';
                    $hasta = '2019-02-18 08:00:00';
                break;
                case 1:
                    $desde = '2019-02-08 20:00:00';
                    $hasta = '2019-02-09 08:00:00';
                break;
                case 2:
                    $desde = '2019-02-09 20:00:00';
                    $hasta = '2019-02-10 08:00:00';
                break;
                case 3:
                    $desde = '2019-02-15 20:00:00';
                    $hasta = '2019-02-16 08:00:00';
                break;
                case 4:
                    $desde = '2019-02-16 20:00:00';
                    $hasta = '2019-02-17 08:00:00';
                break;
                case 5:
                    $desde = '2019-02-22 20:00:00';
                    $hasta = '2019-02-23 08:00:00';
                break;
                case 6:
                    $desde = '2019-02-23 20:00:00';
                    $hasta = '2019-02-24 08:00:00';
                break;
                case 7:
                    $desde = '2019-03-01 20:00:00';
                    $hasta = '2019-03-02 08:00:00';
                break;
                case 8:
                    $desde = '2019-03-02 20:00:00';
                    $hasta = '2019-03-03 08:00:00';
                break;
                case 9:
                    $desde = '2019-03-03 20:00:00';
                    $hasta = '2019-03-04 08:00:00';
                break;
                case 10:
                    $desde = '2019-03-04 20:00:00';
                    $hasta = '2019-03-05 08:00:00';
                break;

            default:
                # code...
                break;
        }


$clausula = 'from carnavals c INNER JOIN encuestadores_carnaval e on c.userid LIKE CONCAT("%",e.codigo) WHERE transporte IS NOT NULL and (FROM_UNIXTIME(ROUND(timestamp/1000)) BETWEEN "'.$desde.'" AND "'.$hasta.'" )';

// $cantidad = DB::select('SELECT COUNT(*) '.$clausula);

        // $test = DB::select("SELECT id,timestamp, FROM_UNIXTIME(ROUND(timestamp/1000)) AS 'date_formatted' FROM `carnavals` ORDER BY `carnavals`.`id` DESC");;
$cantidad = DB::select('SELECT COUNT(*) as cantidad from (SELECT c.id as carnaval_id from encuestadores_carnaval e
INNER JOIN carnavals c
on c.userid like CONCAT("%",e.codigo)
where (FROM_UNIXTIME(ROUND(timestamp/1000)) BETWEEN "'.$desde.'" AND "'.$hasta.'" )) as Cantidad
');

$encuestadores =  DB::select('SELECT nombre, count(*) as cantidad from encuestadores_carnaval e
INNER JOIN carnavals c
on c.userid like CONCAT("%",e.codigo)
where (FROM_UNIXTIME(ROUND(timestamp/1000)) BETWEEN "'.$desde.'" AND "'.$hasta.'" )
GROUP by nombre
 ');


        // Consulta de transporte
$transporte = DB::select('SELECT transporte as label,
COUNT(*) as y,
CONCAT(ROUND(COUNT(*) * 100 / (SELECT COUNT(*)
'.$clausula.' )),"%") as indexLabel
'.$clausula.'  GROUP BY transporte ORDER BY y desc
');
        $t = [];
        foreach ($transporte as $key => $value)
        {
            if($value->label == 'corrientes')
            {
                $value->label = 'Aeropuerto Corrientes';
            }
             if($value->label == 'resistencia')
            {
                $value->label = 'Aeropuerto Resistencia';
            }
            $t[] = (array) $value;
        }


        // consulta de procedencia
        $p = [];
$clausula = 'from carnavals c INNER JOIN encuestadores_carnaval e on c.userid LIKE CONCAT("%",e.codigo) WHERE procedencia IS NOT NULL and (FROM_UNIXTIME(ROUND(timestamp/1000)) BETWEEN "'.$desde.'" AND "'.$hasta.'" )';
        // $procedencia = DB::select('SELECT procedencia as label, COUNT(*) as y, CONCAT(ROUND(COUNT(*) * 100 / (SELECT COUNT(*) from carnavals)),"%") as indexLabel from carnavals where procedencia IS NOT NULL GROUP BY procedencia ORDER BY y desc');
        $procedencia = DB::select('SELECT procedencia as label,
COUNT(*) as y,
CONCAT(ROUND(COUNT(*) * 100 / (SELECT COUNT(*)
'.$clausula.' )),"%") as indexLabel
'.$clausula.'  GROUP BY procedencia ORDER BY y desc
');
         foreach ($procedencia as $key => $value)
        {

            $p[] = (array) $value;
        }
        // consulta sexo
        $s = [];
        $clausula = 'from carnavals c INNER JOIN encuestadores_carnaval e on c.userid LIKE CONCAT("%",e.codigo) WHERE sexo IS NOT NULL and (FROM_UNIXTIME(ROUND(timestamp/1000)) BETWEEN "'.$desde.'" AND "'.$hasta.'" )';
        // $sexo = DB::select('SELECT sexo as label, COUNT(*) as y, CONCAT(ROUND(COUNT(*) * 100 / (SELECT COUNT(*) from carnavals)),"%") as indexLabel from carnavals where sexo IS NOT NULL GROUP BY sexo ORDER BY y desc');
         $sexo = DB::select('SELECT sexo as label,
COUNT(*) as y,
CONCAT(ROUND(COUNT(*) * 100 / (SELECT COUNT(*)
'.$clausula.' )),"%") as indexLabel
'.$clausula.'  GROUP BY sexo ORDER BY y desc
');
         foreach ($sexo as $key => $value)
        {
           if($value->label == 'F')
            {
                $value->label = 'Femenino';
            }
             if($value->label == 'M')
            {
                $value->label = 'Masculino';
            }
            $s[] = (array) $value;
        }

// lugar_alojamiento
$clausula = 'from carnavals c INNER JOIN encuestadores_carnaval e on c.userid LIKE CONCAT("%",e.codigo) WHERE lugar_alojamiento IS NOT NULL and (FROM_UNIXTIME(ROUND(timestamp/1000)) BETWEEN "'.$desde.'" AND "'.$hasta.'" )';
        $la = [];
        // $lugar_alojamiento = DB::select('SELECT lugar_alojamiento as label, COUNT(*) as y, CONCAT(ROUND(COUNT(*) * 100 / (SELECT COUNT(*) from carnavals)),"%") as indexLabel from carnavals where lugar_alojamiento IS NOT NULL GROUP BY lugar_alojamiento ORDER BY y desc');
         $lugar_alojamiento = DB::select('SELECT lugar_alojamiento as label,
COUNT(*) as y,
CONCAT(ROUND(COUNT(*) * 100 / (SELECT COUNT(*)
'.$clausula.' )),"%") as indexLabel
'.$clausula.'  GROUP BY lugar_alojamiento ORDER BY y desc
');
         foreach ($lugar_alojamiento as $key => $value)
        {

            $la[] = (array) $value;
        }
// tipoalojamiento
        $ta = [];

        $clausula = 'from carnavals c INNER JOIN encuestadores_carnaval e on c.userid LIKE CONCAT("%",e.codigo) WHERE tipoalojamiento IS NOT NULL and (FROM_UNIXTIME(ROUND(timestamp/1000)) BETWEEN "'.$desde.'" AND "'.$hasta.'" )';
        // $tipoalojamiento = DB::select('SELECT tipoalojamiento as label, COUNT(*) as y, CONCAT(ROUND(COUNT(*) * 100 / (SELECT COUNT(*) from carnavals)),"%") as indexLabel from carnavals where tipoalojamiento IS NOT NULL GROUP BY tipoalojamiento ORDER BY y desc');
        $tipoalojamiento = DB::select('SELECT tipoalojamiento as label,
COUNT(*) as y,
CONCAT(ROUND(COUNT(*) * 100 / (SELECT COUNT(*)
'.$clausula.' )),"%") as indexLabel
'.$clausula.'  GROUP BY tipoalojamiento ORDER BY y desc
');
         foreach ($tipoalojamiento as $key => $value)
        {

            $ta[] = (array) $value;
        }
// edad
// viaje
         $vi = [];
         $clausula = 'from carnavals c INNER JOIN encuestadores_carnaval e on c.userid LIKE CONCAT("%",e.codigo) WHERE viaje IS NOT NULL and (FROM_UNIXTIME(ROUND(timestamp/1000)) BETWEEN "'.$desde.'" AND "'.$hasta.'" )';
        // $viaje = DB::select('SELECT viaje as label, COUNT(*) as y, CONCAT(ROUND(COUNT(*) * 100 / (SELECT COUNT(*) from carnavals)),"%") as indexLabel from carnavals where viaje IS NOT NULL  GROUP BY viaje ORDER BY y desc');
        $viaje = DB::select('SELECT viaje as label,
COUNT(*) as y,
CONCAT(ROUND(COUNT(*) * 100 / (SELECT COUNT(*)
'.$clausula.' )),"%") as indexLabel
'.$clausula.'  GROUP BY viaje ORDER BY y desc
');
         foreach ($viaje as $key => $value)
        {

            $vi[] = (array) $value;
        }
// cantidad_personas
// informo
         $in = [];
         $clausula = 'from carnavals c INNER JOIN encuestadores_carnaval e on c.userid LIKE CONCAT("%",e.codigo) WHERE informo IS NOT NULL and (FROM_UNIXTIME(ROUND(timestamp/1000)) BETWEEN "'.$desde.'" AND "'.$hasta.'" )';
        // $informo = DB::select('SELECT informo as label, COUNT(*) as y, CONCAT(ROUND(COUNT(*) * 100 / (SELECT COUNT(*) from carnavals)),"%") as indexLabel from carnavals where informo IS NOT NULL  GROUP BY informo ORDER BY y desc');
        $informo = DB::select('SELECT informo as label,
COUNT(*) as y,
CONCAT(ROUND(COUNT(*) * 100 / (SELECT COUNT(*)
'.$clausula.' )),"%") as indexLabel
'.$clausula.'  GROUP BY informo ORDER BY y desc
');
         foreach ($informo as $key => $value)
        {

            $in[] = (array) $value;
        }
// motivo
         $mo = [];
         $clausula = 'from carnavals c INNER JOIN encuestadores_carnaval e on c.userid LIKE CONCAT("%",e.codigo) WHERE motivo IS NOT NULL and (FROM_UNIXTIME(ROUND(timestamp/1000)) BETWEEN "'.$desde.'" AND "'.$hasta.'" )';
        // $motivo = DB::select('SELECT motivo as label, COUNT(*) as y, CONCAT(ROUND(COUNT(*) * 100 / (SELECT COUNT(*) from carnavals)),"%") as indexLabel from carnavals where motivo IS NOT NULL  GROUP BY motivo ORDER BY y desc');
        $motivo = DB::select('SELECT motivo as label,
COUNT(*) as y,
CONCAT(ROUND(COUNT(*) * 100 / (SELECT COUNT(*)
'.$clausula.' )),"%") as indexLabel
'.$clausula.'  GROUP BY motivo ORDER BY y desc
');
         foreach ($motivo as $key => $value)
        {

            $mo[] = (array) $value;
        }


// primeravez
// recomendaria
// gastos
        $gas = [];
        $clausula = 'from carnavals c INNER JOIN encuestadores_carnaval e on c.userid LIKE CONCAT("%",e.codigo) WHERE gastos IS NOT NULL and (FROM_UNIXTIME(ROUND(timestamp/1000)) BETWEEN "'.$desde.'" AND "'.$hasta.'" )';
        // $gastos = DB::select('SELECT gastos as label, COUNT(*) as y, CONCAT(ROUND(COUNT(*) * 100 / (SELECT COUNT(*) from carnavals)),"%") as indexLabel from carnavals where gastos IS NOT NULL  GROUP BY gastos ORDER BY y desc');
        $gastos = DB::select('SELECT gastos as label,
COUNT(*) as y,
CONCAT(ROUND(COUNT(*) * 100 / (SELECT COUNT(*)
'.$clausula.' )),"%") as indexLabel
'.$clausula.'  GROUP BY gastos ORDER BY y desc
');
         foreach ($gastos as $key => $value)
                {
                switch ($value->label) {
                    case 'a':
                        $value->label = "Menos de $500";
                        break;
                    case 'b':
                        $value->label = "de $500 a $1000";
                        break;
                    case 'c':
                        $value->label = "entre $1000 y $3000";
                        break;
                    case 'd':
                        $value->label = "Mas de $3000";
                        break;
                        case 'e':
                        $value->label = "NS/NC";
                        break;
                    default:
                        # code...
                        break;
                        }
                    $gas[] = (array) $value;
                 }
// userid
// timestamp


// print_r($cantidad);
// return;

        return view('carnaval/results')
        ->with('transporte',$t)
        ->with('procedencia',$p)
        ->with('sexo',$s)
        ->with('lugar_alojamiento',$la)
        ->with('tipoalojamiento',$ta)
        ->with('gastos',$gas)
        ->with('viaje',$vi)
        ->with('motivo',$mo)
        ->with('informo',$in)
        ->with('desde',$desde)
        ->with('hasta',$hasta)
        ->with('cantidad',$cantidad)
->with('encuestadores',$encuestadores)
->with('dia',$dia);

    }



}

