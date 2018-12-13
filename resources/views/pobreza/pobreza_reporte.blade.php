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
                                <th>familia</th>
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
                                                    <td>
                                                        <a href="#" data-toggle="modal" data-target="#modal_{{$p->id}}"> {{-- //launch modal --}}
                                                            <i class="fa fa-th" aria-hidden="true"></i>
                                                        </a>
                                                    </td>
                                                    {{-- <!-- Modal --> --}}
                                                            <div class="modal fade" id="modal_{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="modal_{{$p->id}}_label" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="modal_{{$p->id}}_label">Modal title</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                         <div class="row">
                                                                         <div class="col-md-4">Nombre</div>
                                                                         <div class="col-md-4">Edad</div>
                                                                         <div class="col-md-4">Sexo</div>
                                                                         </div>

                                                                            @foreach ($p->familia as $familiar)
                                                                                     <div class="row">
                                                                         <div class="col-md-4">{{$familiar->nombre}}</div>
                                                                         <div class="col-md-4">{{$familiar->edad}}</div>
                                                                         <div class="col-md-4">{{$familiar->sexo}}</div>
                                                                         </div>

                                                                            @endforeach

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                </div>
                                                                </div>
                                                            </div>
                                                            </div>








                                    </tr>
                                    {{-- END TABLE --}}


                              @endforeach


                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
