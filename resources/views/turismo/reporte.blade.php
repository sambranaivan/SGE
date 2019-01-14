@extends('layouts.app')
{{--  day of week  --}}
@section('content')
{{--  if is admin  --}}

<div class="container">




    <table class="table">
        <thead>
            <tr>
                <th>Hotel</th>
                <th>Dia</th>
                <th>Ocupación</th>
                <th>Municipio</th>
                <th>Ponderado</th>
            </tr>
        </thead>
        <tbody>
@foreach ($values as $item)
        @if ($item->ponderado)
                 <tr class="table-success">
                @else
                 <tr>
                @endif
            {{--  <td scope="row">{{$item->id}}</td>  --}}
            <td>{{$item->hotel}}</td>
            <td>{{$item->fecha}}</td>

            <td>{{$item->porcentaje}}%</td>
            <td>{{$item->nombre}}</td>
            <td>
                @if ($item->ponderado)
                 Si
                @else
                 No
                @endif
            </td>
        </tr>


        @endforeach
    </tbody>
</table>

</div>



@endsection
