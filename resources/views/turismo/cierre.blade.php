@extends('layouts.app')
{{--  day of week  --}}
@section('content')
{{--  if is admin  --}}
@if(Auth::user()->id == 1)
<div class="container">

 <div class="row text-center">

    <div class="col-md-6 offset-md-3">
<div class="card text-left">

  <div class="card-body">
    <h4 class="card-title">Cierre de Encuesta de Ocupacion Hotelera</h4>

    <form method="post" action="/turismo/getreport">
        @csrf
        <div class="form-group">
          <label for="usuario">Usuario</label>
          <select class="form-control" name="user_id" id="" required>
            @foreach ($users as $usuario)
                <option value="{{$usuario->id}}">{{$usuario->name}}</option>
            @endforeach
          </select>
        </div>
    <div class="form-group">
      <label for="desde">Desde</label>
      <input type="date" name="desde" id="" class="form-control" placeholder="" aria-describedby="helpId" required>
    </div>
    <div class="form-group">
      <label for="hasta">Hasta</label>
      <input type="date" name="hasta" id="" class="form-control" placeholder="" aria-describedby="helpId" required>
    </div>
    <button type="submit" class="btn btn-block btn-primary">Generar Reporte</button>

    </form>

    </div>
    {{--  end body  --}}



</div>
  </div>
</div>

</div>
@else
<h2>Acceso no Autorizado</h2>
@endauth



@endsection
