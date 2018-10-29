@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><label class=="text-center">Confirmación</label></div>

                <div class="card-body">
                    {{$consulta->encuesta->titulo}}
                    <ul class="list-group">
                  @foreach ($consulta->simples as $item)

                        <li class="list-group-item">{{$item->pregunta->pregunta}}:{{$item->valor}}</li>

                        @endforeach
                         @foreach ($consulta->libres as $item)

                        <li class="list-group-item">{{$item->pregunta->pregunta}}:{{$item->valor}}</li>

                        @endforeach
                         @foreach ($consulta->multiples as $item)

                        <li class="list-group-item">{{$item->pregunta->pregunta}}:{{$item->valor}}</li>

                        @endforeach
                        <li class="list-group-item">
                            <a href="/encuesta/detalle/{{$consulta->encuesta->id}}" class="btn btn-success btn-block">Confirmar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
