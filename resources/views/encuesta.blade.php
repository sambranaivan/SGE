@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1 class="text-center">{{$encuesta->titulo}}</h1></div>

                <div class="card-body">
                <form action="/enviar" id="encuesta_form">

                    @csrf
                    @foreach ($encuesta->simples as $item)

                    <div class="form-group" order="{{$item->order}}">

                        <label for="{{$item->name()}}">{{$item->pregunta}}</label>
                          <select class="form-control" name="{{$item->name()}}" id="{{$item->name()}}" form="encuesta_form">
                            @foreach ($item->options as $option)
                            <option value="{{$option->valor}}" >{{$option->titulo}}</option>
                            @endforeach
                          </select>
                    </div>
                    @endforeach
                    @foreach ($encuesta->libres as $item)
                    <div class="form-group" order="{{$item->order}}">
                        <label for="{{$item->name()}}">{{$item->pregunta}}</label>
                        <input type="{{$item->type}}" name="{{$item->name()}}" class="form-control" required>
                    </div>
                    @endforeach
                    @foreach ($encuesta->multiples as $item)
                    <div class="form-group" order="{{$item->order}}">
                        <label for="{{$item->name()}}">{{$item->pregunta}}</label>
                        <input type="text" name="{{$item->name()}}" class="form-control" required>
                    </div>
                    @endforeach

                    @foreach ($encuesta->tablas as $item)

                    {{--  tabla vertical  --}}
                        <div class="form-group" order="{{$item->order}}">

                            <table class="table table table-responsive">
                                <label class="text-center text-muted">{{$item->pregunta}}</label>
                                <thead>
                                    <tr>
                                    <th>-</th>
                                    @foreach ($item->columns as $column)
                                            <th>{{$column->titulo}}</th>
                                    @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($item->rows as $row)
                                    <tr>
                                    <td>{{$row->titulo}}</td>
                                    @foreach ($item->columns as $column)
                                            <td>


                                                  <input type="{{$item->type}}" class="form-control" name="tabla_{{$item->id}}_{{$row->id}}_{{$column->id}}" id="" value="1"required>


                                            </td>
                                    @endforeach
                                    <tr>
                                    @endforeach
                                </tbody>

                            </table>




                            </div>

                        </div>

                        {{--  Tabla Horizontal
                        <div class="form-group" order="{{$item->order}}">

                            <table class="table table-responsive">
                                <label class="text-center text-muted">{{$item->pregunta}}</label>
                                <thead>
                                    <tr>
                                    <th>-</th>
                                    @foreach ($item->options as $option)
                                            <th>{{$option->titulo}}</th>
                                    @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($item->rows as $row)
                                    <tr>
                                    <td>{{$row->titulo}}</td>
                                    @foreach ($item->options as $option)
                                            <td>


                                                  <input type="{{$item->type}}" class="form-control" name="'tabla_'.{{$item->id}}.'_'.{{$row->id}}.'_'.{{$option->id}}" required>


                                            </td>
                                    @endforeach
                                    <tr>
                                    @endforeach
                                </tbody>

  --}}




                            </div>

                        </div>
                    @endforeach
                    {{--  submit  --}}
                        <div class="form-group">
                            <input type="hidden" name="encuesta_id" value="{{$encuesta->id}}">
                            <input type="submit" value="Enviar" class="form-control btn btn-success">
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{--  Javascript  --}}
<script>
    {{--  ready  --}}
$(function(){

console.log("ready")


//Reordenar los div
var divList = $(".form-group");
divList.sort(function(a, b){ return $(a).attr("order")-$(b).attr("order")});

$("#encuesta_form").html(divList);
console.log("orderDone")

})
</script>
@endsection

