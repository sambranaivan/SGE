@extends('layouts.app')
{{--  day of week  --}}
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <ul class="list-group list-group-flush">
                            <li class="list-group-item list-group-item-primary text-center">Encuesta <b>#{{$encuesta->id}}</b></li>
                            <li class="list-group-item"><b>Zona</b>:{{$encuesta->hotel->zona}}</li>
                            <li class="list-group-item"><b>Localidad</b>: {{$encuesta->hotel->localidad}}</li>
                            <li class="list-group-item"><b>Categoría</b>: {{$encuesta->hotel->categoria}}</li>
                            <li class="list-group-item"><b>Denominación</b>: {{$encuesta->hotel->denominacion}}
                                <a href="#">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </li>
                            <li class="list-group-item"><b>Plazas Totales</b>: {{$encuesta->plazas}}</li>
                            <li class="list-group-item"><b>Reservas Totales</b>: {{$encuesta->reservas}}</li>

                        {{--  aca empieza el has de los dias---siempre va a tener 3 minimo  --}}
                            @foreach ($encuesta->valores as $dia)

                            <li class="list-group-item" >
                                <div class="row">
                                    <div class="col-md-2">
                                       {{$arrayDias[$dia->day]}}
                                    </div>
                                       <div class="col-md-2">
                                       {{date('d-m-Y', strtotime($dia->fecha))}}
                                       </div>

                                    <div class="col-md-3">
                                    <b>Plazas Ocupadas: </b>{{$dia->ocupadas}}
                                    </div>

                                    <div class="col-md-5">
                                    <b>Porcentaje de Ocupacion: </b>{{$dia->porcentaje}}%
                                    </div>
                                </div>

                            </li>
                            @endforeach

                    </ul>




                   <div class="row">
                       <div class="col-md-6"><a href="/turismo/eoh/cancelar/{{$encuesta->id}}" class="btn btn-danger btn-lg btn-block">Cancelar
                        <i class="fas fa-backward    "></i>
                    </a></div>
                       <div class="col-md-6"><a href="/turismo/eoh/detalle" class="btn btn-success btn-lg btn-block">Confirmar
                        <i class="fas fa-check    "></i>
                    </a></div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
