@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Reporte
                    <a name="" id="" class="btn btn-primary float-right" href="/pobreza" role="button">Nueva Carga</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>participacion</th>
                                <th>semana</th>
                                <th>trimestre</th>
                                <th>año</th>
                                <th>area</th>
                                <th>numero_vivienda</th>
                                <th>direccion</th>
                                <th>telefono</th>
                                <th>miembros</th>
                            </tr>
                        </thead>
                        <tbody>
                              @foreach ($pobreza as $p)
                                    <tr>
                                        <td scope="row">{{$p->id}}</td>

                    <td>{{$p->participacion}}</td>
                    <td>{{$p->semana}}</td>
                    <td>{{$p->trimestre}}</td>
                    <td>{{$p->anio}}</td>
                    <td>{{$p->area}}</td>
                    <td>{{$p->numero_vivienda}}</td>
                    <td>{{$p->direccion}}</td>
                    <td>{{$p->telefono}}</td>
                    <td>{{$p->miembros}}</td>








                                    </tr>


                              @endforeach


                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
