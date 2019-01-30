@extends('layouts.app')

@section('content')

<div class="container">


    <div id="chartProcedencia"  style="margin-bottom:25px;float:left;height: 300px; width: 50%;"></div>
    <div id="chartTransporte"  style="margin-bottom:25px;float:left;height: 300px; width: 50%;"></div>
        <div id="chartSexo"  style="margin-bottom:25px;float:left;height: 300px; width: 50%;"></div>
        <div id="chartAlojamiento"  style="margin-bottom:25px;float:left;height: 300px; width: 50%;"></div>
        <div id="chartTipoAlojamiento"  style="margin-bottom:25px;float:left;height: 300px; width: 50%;"></div>
        <div id="chartGastos"  style="margin-bottom:25px;float:left;height: 300px; width: 50%;"></div>
        <div id="chartMotivo"  style="margin-bottom:25px;float:left;height: 300px; width: 50%;"></div>
        <div id="chartInformo"  style="margin-bottom:25px;float:left;height: 300px; width: 50%;"></div>
        <div id="chartViaje"  style="margin-bottom:25px;float:left;height: 300px; width: 50%;"></div>



<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</div>
<script>

window.onload = function () {

var chartTransporte = new CanvasJS.Chart("chartTransporte", {
    animationEnabled: true,
    exportEnabled: true,
    theme: "light1", // "light1", "light2", "dark1", "dark2"
    title:{
        text: "Medios de Transporte utilizado"
    },
    data: [{
        type: "column", //change type to bar, line, area, pie, etc
        // indexLabel: "{y}", //Shows y value on all Data Points
        indexLabelFontColor: "#5A5757",
        // indexLabelPlacement: "outside",
        dataPoints: {!! json_encode($transporte) !!}
    }]
});
chartTransporte.render();

var chartProcedencia = new CanvasJS.Chart("chartProcedencia", {
    animationEnabled: true,
    exportEnabled: true,
    theme: "light1", // "light1", "light2", "dark1", "dark2"
    title:{
        text: "Procedencia"
    },
    data: [{
        type: "column", //change type to bar, line, area, pie, etc
        // indexLabel: "{y}", //Shows y value on all Data Points
        indexLabelFontColor: "#5A5757",
        // indexLabelPlacement: "outside",
        dataPoints: {!! json_encode($procedencia) !!}
    }]
});
chartProcedencia.render();


var chartSexo = new CanvasJS.Chart("chartSexo", {
    animationEnabled: true,
    exportEnabled: true,
    theme: "light1", // "light1", "light2", "dark1", "dark2"
    title:{
        text: "Sexo"
    },
    data: [{
        type: "column", //change type to bar, line, area, pie, etc
        // indexLabel: "{y}", //Shows y value on all Data Points
        indexLabelFontColor: "#5A5757",
        // indexLabelPlacement: "outside",
        dataPoints: {!! json_encode($sexo) !!}
    }]
});
chartSexo.render();

//

var chartAlojamiento = new CanvasJS.Chart("chartAlojamiento", {
    animationEnabled: true,
    exportEnabled: true,
    theme: "light1", // "light1", "light2", "dark1", "dark2"
    title:{
        text: "Ciudad donde se Aloja"
    },
    data: [{
        type: "column", //change type to bar, line, area, pie, etc
        // indexLabel: "{y}", //Shows y value on all Data Points
        indexLabelFontColor: "#5A5757",
        // indexLabelPlacement: "outside",
        dataPoints: {!! json_encode($lugar_alojamiento) !!}
    }]
});
chartAlojamiento.render();

var chartTipoAlojamiento = new CanvasJS.Chart("chartTipoAlojamiento", {
    animationEnabled: true,
    exportEnabled: true,
    theme: "light1", // "light1", "light2", "dark1", "dark2"
    title:{
        text: "Tipo de Alojamiento"
    },
    data: [{
        type: "column", //change type to bar, line, area, pie, etc
        // indexLabel: "{y}", //Shows y value on all Data Points
        indexLabelFontColor: "#5A5757",
        // indexLabelPlacement: "outside",
        dataPoints: {!! json_encode($tipoalojamiento) !!}
    }]
});
chartTipoAlojamiento.render();

//

var chartGastos = new CanvasJS.Chart("chartGastos", {
    animationEnabled: true,
    exportEnabled: true,
    theme: "light1", // "light1", "light2", "dark1", "dark2"
    title:{
        text: "Gastos durante la estadia (Por persona por dia)"
    },
    data: [{
        type: "column", //change type to bar, line, area, pie, etc
        // indexLabel: "{y}", //Shows y value on all Data Points
        indexLabelFontColor: "#5A5757",
        // indexLabelPlacement: "outside",
        dataPoints: {!! json_encode($gastos) !!}
    }]
});
chartGastos.render();

//
//

var chartMotivo = new CanvasJS.Chart("chartMotivo", {
    animationEnabled: true,
    exportEnabled: true,
    theme: "light1", // "light1", "light2", "dark1", "dark2"
    title:{
        text: "Motivos del Viaje"
    },
    data: [{
        type: "column", //change type to bar, line, area, pie, etc
        // indexLabel: "{y}", //Shows y value on all Data Points
        indexLabelFontColor: "#5A5757",
        // indexLabelPlacement: "outside",
        dataPoints: {!! json_encode($motivo) !!}
    }]
});
chartMotivo.render();

//
//

var chartInformo = new CanvasJS.Chart("chartInformo", {
    animationEnabled: true,
    exportEnabled: true,
    theme: "light1", // "light1", "light2", "dark1", "dark2"
    title:{
        text: "¿Como se informo del evento?"
    },
    data: [{
        type: "column", //change type to bar, line, area, pie, etc
        // indexLabel: "{y}", //Shows y value on all Data Points
        indexLabelFontColor: "#5A5757",
        // indexLabelPlacement: "outside",
        dataPoints: {!! json_encode($informo) !!}
    }]
});
chartInformo.render();

//
//

var chartViaje = new CanvasJS.Chart("chartViaje", {
    animationEnabled: true,
    exportEnabled: true,
    theme: "light1", // "light1", "light2", "dark1", "dark2"
    title:{
        text: "¿Con quién vino de viaje?"
    },
    data: [{
        type: "column", //change type to bar, line, area, pie, etc
        // indexLabel: "{y}", //Shows y value on all Data Points
        indexLabelFontColor: "#5A5757",
        // indexLabelPlacement: "outside",
        dataPoints: {!! json_encode($viaje) !!}
    }]
});
chartViaje.render();


}
</script>
@endsection
