@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <div class="row">
                    <div class="col-md-12">
                        Encuestas Disponibles
                    </div>
                    {{--  <div class="col-md-5">
                        <a class="btn btn-success btn-block" href="#">
                                    Nuevo formulario de Encuesta <i class="fas fa-plus"></i>
                              </a>
                    </div>  --}}
                </div>
                </div>

                <div class="card-body">
                    <div class="list-group">

                        @if (Auth::user()->id == 1)
                        <a href="/pobreza" class="list-group-item list-group-item-action active">Encuesta de Pobreza</a>
                          <a href="turismo/eoh" class="list-group-item list-group-item-action active">Encuesta de Ocupación Hotelera</a>

                        @else
                            <a href="turismo/eoh" class="list-group-item list-group-item-action active">Encuesta de Ocupación Hotelera</a>
                        @endif



                 {{--  @foreach ($encuestas as $item)
                        <a href="encuesta/{{$item->id}}" class="list-group-item list-group-item-action active">{{$item->titulo}}</a>


                        @endforeach  --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
