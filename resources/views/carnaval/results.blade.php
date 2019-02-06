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
         <form class="form">
        <div class="form-group">
            <select name="dia" id="select" class="form-control form-control-lg">
                <option value="1" @if($dia == 1) selected @endif >Viernes 8</option>
                <option value="2" @if($dia == 2) selected @endif >Sábado 9</option>
                <option value="3" @if($dia == 3) selected @endif >Viernes 15</option>
                <option value="4" @if($dia == 4) selected @endif >Sábado 16</option>
                <option value="5" @if($dia == 5) selected @endif >Viernes 22</option>
                <option value="6" @if($dia == 6) selected @endif >Sábado 23</option>
                <option value="7" @if($dia == 7) selected @endif >Viernes 1</option>
                <option value="8" @if($dia == 8) selected @endif >Sábado 2</option>
                <option value="9" @if($dia == 9) selected @endif >Domingo 3</option>
                <option value="10" @if($dia == 10) selected @endif >Lunes 4</option>
                 <option value="11" @if($dia == 11) selected @endif >Global</option>





            </select>
        </div>
        <form>
              <h3>Encuestas Totales:
            @foreach ($cantidad as $cant)
                {{$cant->cantidad}}
            @endforeach

        </h3>
    </div>
</div>
</div>
<div class="col-md-6">
<div class="card">
    <div class="card-header">
        Encuestadores
    </div>
    <div class="card-body">

        <ul class="list-group">
            @foreach ($encuestadores as $encuestador)
        <li class="list-group-item"><strong>{{$encuestador->nombre}}<strong> :{{$encuestador->cantidad}}</li>
    @endforeach
        </ul>

    </div>
</div>

</div>
</div>



    {{-- graficos --}}
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

   $(document).ready(function(){
$('select').on('change', function() {
//  alert( this.value );
window.location.href = "/carnaval/"+this.value;
});

   })

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
