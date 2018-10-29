@extends('layouts.app')
{{--  Listado de Encuestas  --}}
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detalle de Encuestas</div>

                <div class="card-body">
                    <div class="list-group">
                @foreach ($encuestas as $item)
                        <a href="encuesta/detalle/{{$item->id}}" class="list-group-item list-group-item-action active">{{$item->titulo}}</a>


                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
