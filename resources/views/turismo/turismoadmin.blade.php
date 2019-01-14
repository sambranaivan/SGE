@extends('layouts.app')
{{--  day of week  --}}
@section('content')
{{--  if is admin  --}}
@if(Auth::user()->id == 1)
<div class="container">

<div class="list-group">
    <a href="/turismo/cierre" class="list-group-item list-group-item-action active">Cerrar Encuesta y Generar Informe</a>
</div>

</div>
@else
<h2>Acceso no Autorizado</h2>
@endauth



@endsection
