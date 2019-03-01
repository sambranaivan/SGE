<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PescaController extends Controller
{
    //

    public function reporte()
    {

        $cantidad = DB::select('SELECT COUNT(*) as cantidad from pescas');
        $cantidad = $cantidad[0]->cantidad;
        $locales = DB::select('SELECT COUNT(*) as cantidad from pescas where procedencia not like "%Esquina%"');
        $locales = $locales[0]->cantidad;

        $procedencia = DB::select("SELECT procedencia as label, count(*) as y, CONCAT(ROUND(count(*) / ".$cantidad." * 100),'%') as indexLabel from pescas group by procedencia");
        $cuantas_personas = DB::select("SELECT cuantas_personas as label, count(*) as y, CONCAT(ROUND(count(*) / ".$cantidad." * 100),'%') as indexLabel from pescas group by cuantas_personas");
        $tipo_alojamiento = DB::select("SELECT tipo_alojamiento as label, count(*) as y, CONCAT(ROUND(count(*) / ".$locales." * 100),'%') as indexLabel from pescas WHERE procedencia not like '%Esquina%' group by tipo_alojamiento");
        $cuantas_noches = DB::select("SELECT cuantas_noches as label, count(*) as y, CONCAT(ROUND(count(*) / ".$locales." * 100),'%') as indexLabel from pescas WHERE procedencia not like '%Esquina%' group by cuantas_noches");
        $gasto_alojamiento = DB::select("SELECT gasto_alojamiento as label, count(*) as y, CONCAT(ROUND(count(*) / ".$locales." * 100),'%') as indexLabel from pescas WHERE procedencia not like '%Esquina%' group by gasto_alojamiento");
        $cuantos_dias = DB::select("SELECT cuantos_dias as label, count(*) as y, CONCAT(ROUND(count(*) / ".$locales." * 100),'%') as indexLabel from pescas WHERE procedencia not like '%Esquina%' group by cuantos_dias");
        $cuantas_participo = DB::select("SELECT cuantas_participo as label, count(*) as y, CONCAT(ROUND(count(*) / ".$cantidad." * 100),'%') as indexLabel from pescas group by cuantas_participo");
        $informo = DB::select("SELECT informo as label, count(*) as y, CONCAT(ROUND(count(*) / ".$locales." * 100),'%') as indexLabel from pescas WHERE procedencia not like '%Esquina%' group by informo");
        $gasto_salida = DB::select("SELECT gasto_salida as label, count(*) as y, CONCAT(ROUND(count(*) / ".$cantidad." * 100),'%') as indexLabel from pescas group by gasto_salida");
        $uso_guia = DB::select("SELECT uso_guia as label, count(*) as y, CONCAT(ROUND(count(*) / ".$cantidad." * 100),'%') as indexLabel from pescas group by uso_guia");
        $participo_pesca = DB::select("SELECT participo_pesca as label, count(*) as y, CONCAT(ROUND(count(*) / ".$cantidad." * 100),'%') as indexLabel from pescas group by participo_pesca");
        $modalidad_pesca = DB::select("SELECT modalidad_pesca as label, count(*) as y, CONCAT(ROUND(count(*) / ".$cantidad." * 100),'%') as indexLabel from pescas group by modalidad_pesca");
        $actividad_cena = DB::select("SELECT actividad_cena as label, count(*) as y, CONCAT(ROUND(count(*) / ".$cantidad." * 100),'%') as indexLabel from pescas group by actividad_cena");
        $actividad_show = DB::select("SELECT actividad_show as label, count(*) as y, CONCAT(ROUND(count(*) / ".$cantidad." * 100),'%') as indexLabel from pescas group by actividad_show");
        $actividad_exposicion = DB::select("SELECT actividad_exposicion as label, count(*) as y, CONCAT(ROUND(count(*) / ".$cantidad." * 100),'%') as indexLabel from pescas group by actividad_exposicion");
        $actividad_feria = DB::select("SELECT actividad_feria as label, count(*) as y, CONCAT(ROUND(count(*) / ".$cantidad." * 100),'%') as indexLabel from pescas group by actividad_feria");
        $volveria = DB::select("SELECT volveria as label, count(*) as y, CONCAT(ROUND(count(*) / ".$cantidad." * 100),'%') as indexLabel from pescas group by volveria");
        $gastos_alimentos = DB::select("SELECT gastos_alimentos as label, count(*) as y, CONCAT(ROUND(count(*) / ".$cantidad." * 100),'%') as indexLabel from pescas group by gastos_alimentos");
        $gastos_artesanias = DB::select("SELECT gastos_artesanias as label, count(*) as y, CONCAT(ROUND(count(*) / ".$cantidad." * 100),'%') as indexLabel from pescas group by gastos_artesanias");
        $gastos_transporte = DB::select("SELECT gastos_transporte as label, count(*) as y, CONCAT(ROUND(count(*) / ".$locales." * 100),'%') as indexLabel from pescas WHERE procedencia not like '%Esquina%'  group by gastos_transporte");
        $volveria_visitar = DB::select("SELECT volveria_visitar as label, count(*) as y, CONCAT(ROUND(count(*) / ".$locales." * 100),'%') as indexLabel from pescas WHERE procedencia not like '%Esquina%' group by volveria_visitar");
        $volveria_porque = DB::select("SELECT volveria_porque as label, count(*) as y, CONCAT(ROUND(count(*) / ".$cantidad." * 100),'%') as indexLabel from pescas group by volveria_porque");
        $evalua_alojamiento = DB::select("SELECT evalua_alojamiento as label, count(*) as y, CONCAT(ROUND(count(*) / ".$locales." * 100),'%') as indexLabel from pescas WHERE procedencia not like '%Esquina%'  group by evalua_alojamiento");
        $evalua_gastronomia = DB::select("SELECT evalua_gastronomia as label, count(*) as y, CONCAT(ROUND(count(*) / ".$locales." * 100),'%') as indexLabel from pescas WHERE procedencia not like '%Esquina%'  group by evalua_gastronomia");
        $evalua_info_turistica = DB::select("SELECT evalua_info_turistica as label, count(*) as y, CONCAT(ROUND(count(*) / ".$cantidad." * 100),'%') as indexLabel from pescas group by evalua_info_turistica");
        $evalua_excursiones = DB::select("SELECT evalua_excursiones as label, count(*) as y, CONCAT(ROUND(count(*) / ".$locales." * 100),'%') as indexLabel from pescas WHERE procedencia not like '%Esquina%' group by evalua_excursiones");
        $evalua_limpieza = DB::select("SELECT evalua_limpieza as label, count(*) as y, CONCAT(ROUND(count(*) / ".$locales." * 100),'%') as indexLabel from pescas WHERE procedencia not like '%Esquina%' group by evalua_limpieza");
        $evalua_seguridad = DB::select("SELECT evalua_seguridad as label, count(*) as y, CONCAT(ROUND(count(*) / ".$locales." * 100),'%') as indexLabel from pescas WHERE procedencia not like '%Esquina%' group by evalua_seguridad");
        $evalua_naturaleza = DB::select("SELECT evalua_naturaleza as label, count(*) as y, CONCAT(ROUND(count(*) / ".$locales." * 100),'%') as indexLabel from pescas WHERE procedencia not like '%Esquina%' group by evalua_naturaleza");
        $evalua_accesso = DB::select("SELECT evalua_accesso as label, count(*) as y, CONCAT(ROUND(count(*) / ".$locales." * 100),'%') as indexLabel from pescas WHERE procedencia not like '%Esquina%' group by evalua_accesso");

        return view('pesca.pesca',[
            'cantidad'=>$cantidad,
'procedencia'=>$procedencia,
'cuantas_personas'=>$cuantas_personas,
'tipo_alojamiento'=>$tipo_alojamiento,
'cuantas_noches'=>$cuantas_noches,
'gasto_alojamiento'=>$gasto_alojamiento,
'cuantos_dias'=>$cuantos_dias,
'cuantas_participo'=>$cuantas_participo,
'informo'=>$informo,
'gasto_salida'=>$gasto_salida,
'uso_guia'=>$uso_guia,
'participo_pesca'=>$participo_pesca,
'modalidad_pesca'=>$modalidad_pesca,
'actividad_cena'=>$actividad_cena,
'actividad_show'=>$actividad_show,
'actividad_exposicion'=>$actividad_exposicion,
'actividad_feria'=>$actividad_feria,
'volveria'=>$volveria,
'gastos_alimentos'=>$gastos_alimentos,
'gastos_artesanias'=>$gastos_artesanias,
'gastos_transporte'=>$gastos_transporte,
'volveria_visitar'=>$volveria_visitar,
'volveria_porque'=>$volveria_porque,
'evalua_alojamiento'=>$evalua_alojamiento,
'evalua_gastronomia'=>$evalua_gastronomia,
'evalua_info_turistica'=>$evalua_info_turistica,
'evalua_excursiones'=>$evalua_excursiones,
'evalua_limpieza'=>$evalua_limpieza,
'evalua_seguridad'=>$evalua_seguridad,
'evalua_naturaleza'=>$evalua_naturaleza,
'evalua_accesso'=>$evalua_accesso
        ]);

    }
}
