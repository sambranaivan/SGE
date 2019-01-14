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
                filename: "eoh_" + new Date().toISOString().replace(/[\-\:\.]/g, ""), //do not include extension
            });
            })
    })
</script>

<div class="container">

            <div class="card">
                <div class="card-header">
                    <nav class="navbar navbar-expand-md  ">

                        <form method="POST" action="/turismo/eoh/detalle" class="form-inline">
                            @csrf
                            <div class="form-group">
                                <label for="desde">Desde</label>
                                <input type="date" name="desde" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                <label for="hasta">Hasta</label>
                                <input type="date" name="hasta" id="" class="form-control" placeholder="" aria-describedby="helpId">

                                  <select class="form-control" name="tipo" id="">
                                    <option value="ocupacion">Ocupación</option>
                                    <option value="reserva">Reservas</option>
                                  </select>

                                  <input type="submit"  class="btn btn-small btn-primary" value="Buscar">
                            </div>
                        </form>


                        <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">

                             <li class="nav-item">
                              <a class="btn btn-success" href="/turismo/eoh">
                                    Nueva Carga <i class="fas fa-plus"></i>
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
                    <table class="table table-striped table-responsive" id="tabla">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Zona</th>
                                <th>Localidad</th>
                                <th>Categoria</th>
                                <th>Denominación</th>
                                <th>Plazas Totales</th>
                                <th>Reservas Totales</th>

                                <th>Dia</th>
                                <th>Plazas Ocupadas</th>
                                <th>Porcentaje</th>

                                <th>Dia</th>
                                <th>Plazas Ocupadas</th>
                                <th>Porcentaje</th>

                                <th>Dia</th>
                                <th>Plazas Ocupadas</th>
                                <th>Porcentaje</th>

                                <th>Dia</th>
                                <th>Plazas Ocupadas</th>
                                <th>Porcentaje</th>

                                <th>Dia</th>
                                <th>Plazas Ocupadas</th>
                                <th>Porcentaje</th>

                            </tr>
                        </thead>
                        <tbody>

                                           {{--  ///por cada consulta  --}}

                      @foreach ($encuestas as $item)

                                {{--  por defecto mostrar ultimas dos semanas  --}}
                                @if ($default)
                                    @if($item->desde >= Carbon\Carbon::now()->subDay(14))
                                            <tr>
                                                        <th scope="row">
                                                            {{$item->id}}
                                                        </th>
                                                        <td>{{$item->hotel->zona}}</td>
                                                        <td>{{$item->hotel->municipio->nombre}}</td>
                                                        <td>{{$item->hotel->categoria}}</td>
                                                        <td>{{$item->hotel->denominacion}}</td>

                                                        <td>{{$item->hotel->plazas}}</td>
                                                        <td>{{$item->reservas}}</td>
                                                        @foreach ($item->valores as $dia)
                                                        <td>
                                                            {{date('d-m-Y', strtotime($dia->fecha))}}
                                                        </td>
                                                        <td>
                                                            {{$dia->ocupadas}}
                                                        </td>
                                                        <td>
                                                            {{$dia->porcentaje}}%
                                                        </td>
                                                        @endforeach
                                            </tr>
                                    @endif
                                @else
                                            {{--    --}}

                                             <tr>
                                                        <th scope="row">
                                                            {{$item->id}}
                                                        </th>
                                                        <td>{{$item->hotel->zona}}</td>
                                                        <td>{{$item->hotel->municipio->nombre}}</td>
                                                        <td>{{$item->hotel->categoria}}</td>
                                                        <td>{{$item->hotel->denominacion}}</td>

                                                        <td>{{$item->hotel->plazas}}</td>
                                                        <td>{{$item->reservas}}</td>
                                                        @foreach ($item->valores as $dia)
                                                        <td>
                                                            {{date('d-m-Y', strtotime($dia->fecha))}}
                                                        </td>
                                                        <td>
                                                            {{$dia->ocupadas}}
                                                        </td>
                                                        <td>
                                                            {{$dia->porcentaje}}%
                                                        </td>
                                                        @endforeach
                                            </tr>
                                            {{--    --}}

                                @endif

                    @endforeach
                        </tbody>
                    </table>



                </div>
            </div>

</div>
@endsection
