@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
    <div class="col-md-6">
    <div class="card">

        <div class="card-header">
            Seleccionar Día
        </div>
        <div class="card-body">

              <h3>Encuestas Totales:{{$cantidad}}

        </h3>
    </div>
</div>
</div>
<div class="col-md-6">


</div>
</div>



    {{-- graficos --}}

    <div id="chartprocedencia" style="margin-bottom:25px;float:left;height: 300px; width: 50%;"></div>
    <div id="chartcuantas_personas" style="margin-bottom:25px;float:left;height: 300px; width: 50%;"></div>
    <div id="charttipo_alojamiento" style="margin-bottom:25px;float:left;height: 300px; width: 50%;"></div>
    <div id="chartcuantas_noches" style="margin-bottom:25px;float:left;height: 300px; width: 50%;"></div>
    <div id="chartgasto_alojamiento" style="margin-bottom:25px;float:left;height: 300px; width: 50%;"></div>
    <div id="chartcuantos_dias" style="margin-bottom:25px;float:left;height: 300px; width: 50%;"></div>
    <div id="chartcuantas_participo" style="margin-bottom:25px;float:left;height: 300px; width: 50%;"></div>
    <div id="chartinformo" style="margin-bottom:25px;float:left;height: 300px; width: 50%;"></div>
    <div id="chartgasto_salida" style="margin-bottom:25px;float:left;height: 300px; width: 50%;"></div>
    <div id="chartuso_guia" style="margin-bottom:25px;float:left;height: 300px; width: 50%;"></div>
    <div id="chartparticipo_pesca" style="margin-bottom:25px;float:left;height: 300px; width: 50%;"></div>
    <div id="chartmodalidad_pesca" style="margin-bottom:25px;float:left;height: 300px; width: 50%;"></div>
    <div id="chartactividad_cena" style="margin-bottom:25px;float:left;height: 300px; width: 50%;"></div>
    <div id="chartactividad_show" style="margin-bottom:25px;float:left;height: 300px; width: 50%;"></div>
    <div id="chartactividad_exposicion" style="margin-bottom:25px;float:left;height: 300px; width: 50%;"></div>
    <div id="chartactividad_feria" style="margin-bottom:25px;float:left;height: 300px; width: 50%;"></div>
    <div id="chartvolveria" style="margin-bottom:25px;float:left;height: 300px; width: 50%;"></div>
    <div id="chartgastos_alimentos" style="margin-bottom:25px;float:left;height: 300px; width: 50%;"></div>
    <div id="chartgastos_artesanias" style="margin-bottom:25px;float:left;height: 300px; width: 50%;"></div>
    <div id="chartgastos_transporte" style="margin-bottom:25px;float:left;height: 300px; width: 50%;"></div>
    {{-- <div id="chartvolveria_visitar" style="margin-bottom:25px;float:left;height: 300px; width: 50%;"></div> --}}
    <div id="chartvolveria_porque" style="margin-bottom:25px;float:left;height: 300px; width: 50%;"></div>
    <div id="chartevalua_alojamiento" style="margin-bottom:25px;float:left;height: 300px; width: 50%;"></div>
    <div id="chartevalua_gastronomia" style="margin-bottom:25px;float:left;height: 300px; width: 50%;"></div>
    <div id="chartevalua_info_turistica" style="margin-bottom:25px;float:left;height: 300px; width: 50%;"></div>
    <div id="chartevalua_excursiones" style="margin-bottom:25px;float:left;height: 300px; width: 50%;"></div>
    <div id="chartevalua_limpieza" style="margin-bottom:25px;float:left;height: 300px; width: 50%;"></div>
    <div id="chartevalua_seguridad" style="margin-bottom:25px;float:left;height: 300px; width: 50%;"></div>
    <div id="chartevalua_naturaleza" style="margin-bottom:25px;float:left;height: 300px; width: 50%;"></div>
    <div id="chartevalua_accesso" style="margin-bottom:25px;float:left;height: 300px; width: 50%;"></div>




<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</div>
<script>

   $(document).ready(function(){


window.onload = function () {


var chartprocedencia = new CanvasJS.Chart("chartprocedencia", { animationEnabled: true, exportEnabled: true, theme: "light1",
    title:{ text: "Procedencia" }, data: [{ type: "column", indexLabelFontColor: "#5A5757",
    dataPoints: {!! json_encode($procedencia) !!} }] });
chartprocedencia.render();

var chartcuantas_personas = new CanvasJS.Chart("chartcuantas_personas", { animationEnabled: true, exportEnabled: true, theme: "light1",
    title:{ text: "Cuantas Personas Viajo? (Equipo)" }, data: [{ type: "column", indexLabelFontColor: "#5A5757",
    dataPoints: {!! json_encode($cuantas_personas) !!} }] });
chartcuantas_personas.render();

var charttipo_alojamiento = new CanvasJS.Chart("charttipo_alojamiento", { animationEnabled: true, exportEnabled: true, theme: "light1",
    title:{ text: "Tipo de Alojamiento" }, data: [{ type: "column", indexLabelFontColor: "#5A5757",
    dataPoints: {!! json_encode($tipo_alojamiento) !!} }] });
charttipo_alojamiento.render();

var chartcuantas_noches = new CanvasJS.Chart("chartcuantas_noches", { animationEnabled: true, exportEnabled: true, theme: "light1",
    title:{ text: "Cuantas Noches se Aloja?" }, data: [{ type: "column", indexLabelFontColor: "#5A5757",
    dataPoints: {!! json_encode($cuantas_noches) !!} }] });
chartcuantas_noches.render();

var chartgasto_alojamiento = new CanvasJS.Chart("chartgasto_alojamiento", { animationEnabled: true, exportEnabled: true, theme: "light1",
    title:{ text: "¿Cuanto gasto en alojamiento?" }, data: [{ type: "column", indexLabelFontColor: "#5A5757",
    dataPoints: {!! json_encode($gasto_alojamiento) !!} }] });
chartgasto_alojamiento.render();

var chartcuantos_dias = new CanvasJS.Chart("chartcuantos_dias", { animationEnabled: true, exportEnabled: true, theme: "light1",
    title:{ text: "Cuantos dias participa?" }, data: [{ type: "column", indexLabelFontColor: "#5A5757",
    dataPoints: {!! json_encode($cuantos_dias) !!} }] });
chartcuantos_dias.render();

var chartcuantas_participo = new CanvasJS.Chart("chartcuantas_participo", { animationEnabled: true, exportEnabled: true, theme: "light1",
    title:{ text: "Cuantas veces ah participado?" }, data: [{ type: "column", indexLabelFontColor: "#5A5757",
    dataPoints: {!! json_encode($cuantas_participo) !!} }] });
chartcuantas_participo.render();

var chartinformo = new CanvasJS.Chart("chartinformo", { animationEnabled: true, exportEnabled: true, theme: "light1",
    title:{ text: "Como se Informo del evento?" }, data: [{ type: "column", indexLabelFontColor: "#5A5757",
    dataPoints: {!! json_encode($informo) !!} }] });
chartinformo.render();

var chartgasto_salida = new CanvasJS.Chart("chartgasto_salida", { animationEnabled: true, exportEnabled: true, theme: "light1",
    title:{ text: "Cuanto Gasto en la Salida de Pesca?" }, data: [{ type: "column", indexLabelFontColor: "#5A5757",
    dataPoints: {!! json_encode($gasto_salida) !!} }] });
chartgasto_salida.render();

var chartuso_guia = new CanvasJS.Chart("chartuso_guia", { animationEnabled: true, exportEnabled: true, theme: "light1",
    title:{ text: "Contrato Guia de Pesca?" }, data: [{ type: "column", indexLabelFontColor: "#5A5757",
    dataPoints: {!! json_encode($uso_guia) !!} }] });
chartuso_guia.render();

var chartparticipo_pesca = new CanvasJS.Chart("chartparticipo_pesca", { animationEnabled: true, exportEnabled: true, theme: "light1",
    title:{ text: "Participo en otros concursos de pesca?" }, data: [{ type: "column", indexLabelFontColor: "#5A5757",
    dataPoints: {!! json_encode($participo_pesca) !!} }] });
chartparticipo_pesca.render();

var chartmodalidad_pesca = new CanvasJS.Chart("chartmodalidad_pesca", { animationEnabled: true, exportEnabled: true, theme: "light1",
    title:{ text: "Modalidad" }, data: [{ type: "column", indexLabelFontColor: "#5A5757",
    dataPoints: {!! json_encode($modalidad_pesca) !!} }] });
chartmodalidad_pesca.render();

var chartactividad_cena = new CanvasJS.Chart("chartactividad_cena", { animationEnabled: true, exportEnabled: true, theme: "light1",
    title:{ text: "Participo de la Cena de Premiación?" }, data: [{ type: "column", indexLabelFontColor: "#5A5757",
    dataPoints: {!! json_encode($actividad_cena) !!} }] });
chartactividad_cena.render();

var chartactividad_show = new CanvasJS.Chart("chartactividad_show", { animationEnabled: true, exportEnabled: true, theme: "light1",
    title:{ text: "MParticipo del Show" }, data: [{ type: "column", indexLabelFontColor: "#5A5757",
    dataPoints: {!! json_encode($actividad_show) !!} }] });
chartactividad_show.render();

var chartactividad_exposicion = new CanvasJS.Chart("chartactividad_exposicion", { animationEnabled: true, exportEnabled: true, theme: "light1",
    title:{ text: "Participo de la Exposicion?" }, data: [{ type: "column", indexLabelFontColor: "#5A5757",
    dataPoints: {!! json_encode($actividad_exposicion) !!} }] });
chartactividad_exposicion.render();

var chartactividad_feria = new CanvasJS.Chart("chartactividad_feria", { animationEnabled: true, exportEnabled: true, theme: "light1",
    title:{ text: "Participo de la Feria?" }, data: [{ type: "column", indexLabelFontColor: "#5A5757",
    dataPoints: {!! json_encode($actividad_feria) !!} }] });
chartactividad_feria.render();

var chartvolveria = new CanvasJS.Chart("chartvolveria", { animationEnabled: true, exportEnabled: true, theme: "light1",
    title:{ text: "Volveria a Participar del evento?" }, data: [{ type: "column", indexLabelFontColor: "#5A5757",
    dataPoints: {!! json_encode($volveria) !!} }] });
chartvolveria.render();

var chartgastos_alimentos = new CanvasJS.Chart("chartgastos_alimentos", { animationEnabled: true, exportEnabled: true, theme: "light1",
    title:{ text: "Cuanto Gasto en alimentos?" }, data: [{ type: "column", indexLabelFontColor: "#5A5757",
    dataPoints: {!! json_encode($gastos_alimentos) !!} }] });
chartgastos_alimentos.render();

var chartgastos_artesanias = new CanvasJS.Chart("chartgastos_artesanias", { animationEnabled: true, exportEnabled: true, theme: "light1",
    title:{ text: "Cuanto Gasto en artesanias?" }, data: [{ type: "column", indexLabelFontColor: "#5A5757",
    dataPoints: {!! json_encode($gastos_artesanias) !!} }] });
chartgastos_artesanias.render();

var chartgastos_transporte = new CanvasJS.Chart("chartgastos_transporte", { animationEnabled: true, exportEnabled: true, theme: "light1",
    title:{ text: "Cuanto Gasto en Transporte local?" }, data: [{ type: "column", indexLabelFontColor: "#5A5757",
    dataPoints: {!! json_encode($gastos_transporte) !!} }] });
chartgastos_transporte.render();

var chartvolveria_visitar = new CanvasJS.Chart("chartvolveria_visitar", { animationEnabled: true, exportEnabled: true, theme: "light1",
    title:{ text: "Volveria a visitar esta localidad?" }, data: [{ type: "column", indexLabelFontColor: "#5A5757",
    dataPoints: {!! json_encode($volveria_visitar) !!} }] });
chartvolveria_visitar.render();

// var chartvolveria_porque = new CanvasJS.Chart("chartvolveria_porque", { animationEnabled: true, exportEnabled: true, theme: "light1",
//     title:{ text: "Medios de Transporte utilizado" }, data: [{ type: "column", indexLabelFontColor: "#5A5757",
//     dataPoints: {!! json_encode($volveria_porque) !!} }] });
// chartvolveria_porque.render();

var chartevalua_alojamiento = new CanvasJS.Chart("chartevalua_alojamiento", { animationEnabled: true, exportEnabled: true, theme: "light1",
    title:{ text: "Como evalua el Alojamiento?" }, data: [{ type: "column", indexLabelFontColor: "#5A5757",
    dataPoints: {!! json_encode($evalua_alojamiento) !!} }] });
chartevalua_alojamiento.render();

var chartevalua_gastronomia = new CanvasJS.Chart("chartevalua_gastronomia", { animationEnabled: true, exportEnabled: true, theme: "light1",
    title:{ text: "Como evalua la Gastronomía?"  }, data: [{ type: "column", indexLabelFontColor: "#5A5757",
    dataPoints: {!! json_encode($evalua_gastronomia) !!} }] });
chartevalua_gastronomia.render();

var chartevalua_info_turistica = new CanvasJS.Chart("chartevalua_info_turistica", { animationEnabled: true, exportEnabled: true, theme: "light1",
    title:{ text: "Como evalua la Informacion turistica?"  }, data: [{ type: "column", indexLabelFontColor: "#5A5757",
    dataPoints: {!! json_encode($evalua_info_turistica) !!} }] });
chartevalua_info_turistica.render();

var chartevalua_excursiones = new CanvasJS.Chart("chartevalua_excursiones", { animationEnabled: true, exportEnabled: true, theme: "light1",
    title:{ text: "Como evalua las Excursiones?"  }, data: [{ type: "column", indexLabelFontColor: "#5A5757",
    dataPoints: {!! json_encode($evalua_excursiones) !!} }] });
chartevalua_excursiones.render();

var chartevalua_limpieza = new CanvasJS.Chart("chartevalua_limpieza", { animationEnabled: true, exportEnabled: true, theme: "light1",
    title:{ text: "Como evalua la Limpieza?"  }, data: [{ type: "column", indexLabelFontColor: "#5A5757",
    dataPoints: {!! json_encode($evalua_limpieza) !!} }] });
chartevalua_limpieza.render();

var chartevalua_seguridad = new CanvasJS.Chart("chartevalua_seguridad", { animationEnabled: true, exportEnabled: true, theme: "light1",
    title:{ text: "Como evalua el Seguridad?"  }, data: [{ type: "column", indexLabelFontColor: "#5A5757",
    dataPoints: {!! json_encode($evalua_seguridad) !!} }] });
chartevalua_seguridad.render();

var chartevalua_naturaleza = new CanvasJS.Chart("chartevalua_naturaleza", { animationEnabled: true, exportEnabled: true, theme: "light1",
    title:{ text: "Como evalua el Cuidado de la Naturaleza?"  }, data: [{ type: "column", indexLabelFontColor: "#5A5757",
    dataPoints: {!! json_encode($evalua_naturaleza) !!} }] });
chartevalua_naturaleza.render();

var chartevalua_accesso = new CanvasJS.Chart("chartevalua_accesso", { animationEnabled: true, exportEnabled: true, theme: "light1",
    title:{ text: "Como evalua el Accesso a esta localidad?"  }, data: [{ type: "column", indexLabelFontColor: "#5A5757",
    dataPoints: {!! json_encode($evalua_accesso) !!} }] }); chartevalua_accesso.render();
}})

</script>

@endsection
