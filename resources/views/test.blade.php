@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Plataforma de Encuestas</div>

                <div class="card-body">



                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
       $.getJSON('getHotels/3',function(data){
           console.log(data);
       })
    })
</script>
@endsection
