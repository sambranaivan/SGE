@extends('layouts.app')
{{--  SCRIPT FOR DATATABLE DOWNLOAD  --}}


@section('content')
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
    <script>
    $(document).ready(function(){
            $("#descargar").click(function(){
                $("#tabla").table2excel({
                exclude: ".excludeThisClass",
                name: "Pagina 1",
                filename: "{{$encuesta->titulo}}" + new Date().toISOString().replace(/[\-\:\.]/g, ""), //do not include extension
            });
            })
    })
</script>

<div class="container">

            <div class="card">
                <div class="card-header">
                    <nav class="navbar navbar-expand-md  ">

                        <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">

                             <li class="nav-item">
                              <a class="btn btn-success" href="/encuesta/{{$encuesta->id}}">
                                    Nueva Consulta <i class="fas fa-plus"></i>
                              </a>
                            </li>
                            <span>&nbsp;</span>
                            <li class="nav-item">
                              <a class="btn btn-primary" href="#" id="descargar">
                                    Descargar <i class="fas fa-file-excel"></i>
                              </a>
                            </li>

                        </ul>


                    </nav>
</div>

                <div class="card-body">
                    <table class="table table-striped table-responsive " id="tabla">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">N°</th>
                                @foreach ($encuesta->simples as $simple)
                                <th scope="col"> {{$simple->pregunta}}</th>
                                @endforeach
                                 @foreach ($encuesta->libres as $libre)
                                <th scope="col"> {{$libre->pregunta}}</th>
                                @endforeach
                                 @foreach ($encuesta->multiples as $multiple)
                                <th scope="col"> {{$multiple->pregunta}}</th>
                                @endforeach
                                @foreach ($encuesta->tablas as $tabla)
                                <th scope="col"> {{$tabla->pregunta}}</th>
                                @endforeach
                                <th scope="col"></th>
                                    <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>

                                           {{--  ///por cada consulta  --}}
                    @foreach ($encuesta->consultas as $consulta)

                    <tr>
                        <th scope="row"> {{$consulta->id}}</th>
                        {{--  ///por cada tipo de pregunta de la encuesta una columna de la tabla  --}}
                                 @foreach ($consulta->simples as $simple)
                                    <td> {{$simple->valor}}</td>
                                 @endforeach
                                 @foreach ($consulta->libres as $libre)
                                    <td> {{$libre->valor}}</td>
                                 @endforeach
                                 @foreach ($consulta->multiples as $multiple)
                                    <td> {{$multiple->valor}}</td>
                                 @endforeach
                                  @foreach ($encuesta->tablas as $tabla)
                                    <td>
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal{{$tabla->id}}{{$consulta->id}}"> {{--  lanzar model de tabla  --}}
                                           Ver tabla de valores <i class="fas fa-table"></i>
                                        </a>


{{--  MODAL  --}}

<div class="modal fade" id="modal{{$tabla->id}}{{$consulta->id}}" tabindex="-1" role="dialog" aria-labelledby="modal{{$tabla->id}}{{$consulta->id}}Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal{{$tabla->id}}{{$consulta->id}}Label">
            {{$tabla->pregunta}}
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{--  y aca la tabla  --}}
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th></th>
                        @foreach ($tabla->columns as $column)
                            <th>{{$column->titulo}}</th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($tabla->rows as $row)
                        <tr>
                            <th>{{$row->titulo}}</th>
                                @foreach ($tabla->columns as $column)
                            <td>
                           {{ $consulta->getTablaValor($tabla->id,$row->id,$column->id)}}
                            </td>
                            @endforeach
                         </tr>
                        @endforeach
                    </tbody>
                </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>





{{--  /MODAL  --}}
</td>

                                @endforeach

                                 {{--  //edit buttons  --}}
                                 <td>
                                     <a class="btn btn-sm btn-danger" href="#">
                                         <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                        <td>

                                                                                <a class="btn btn-sm btn-success" href="#">
                                         <i class="fas fa-edit"></i>
                                        </a>
                                 </td>
                                    </tr>
                    @endforeach
                        </tbody>
                    </table>



                </div>
            </div>

</div>
@endsection
