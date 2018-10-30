@extends('layouts.app')
{{--  Listado de Encuestas  --}}
@section('content')
    {{--  <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>  --}}
<div class="container">

@if (session()->has('mensaje'))

<div class="alert alert-primary alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong>Envio cancelado</strong>.
</div>

@endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Encuesta de Ocupación Hotelera</div>

                <div class="card-body">

                    <form method="post">

                    @csrf

                        {{--  <div class="form-group">
                          <label for="hotel">Alojamiento</label>
                          <select class="form-control selectpicker" name="hotel" id="frm_hotel" data-show-subtext="true" data-live-search="true" required>
                            <option selected disabled>Seleccionar Alojamiento</option>
                            @foreach ($hoteles as $h)
                                <option data-subtext="{{$h->municipio->nombre}}" value="{{$h->id}}" plazas="{{$h->plazas}}"
                                    >{{$h->denominacion}}</option>
                            @endforeach
                          </select>
                          <label for="" id="plazas"></label>
                        </div>  --}}
                        <div class="form-group" id="DivMunicipo">
                          <label for="municipio">Municipio</label>
                          <select onchange="updateMunicipio(this.value)" class="form-control" name="municipio" id="municipioOption" data-live-search="true" required>
                            <option selected disabled>Seleccione Municipio</option>
                            @foreach ($municipios as $m)
                                <option value="{{$m->id}}">{{$m->nombre}}</option>
                            @endforeach
                          </select>
                        </div>


                        {{--  hago un combo por cada municipio? y muesto cada uno cuando se elija?  --}}

                        <div class="form-group" id="divHotel">

                        </div>




                        <div class="form-group">
                          <label for="">Plazas Totales</label>
                          <input type="number" name="plazas" id="frm_plazas" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                          <label for="">Reservas Totales</label>
                          <input type="number" name="reservas" id="" class="form-control" placeholder="" aria-describedby="helpreservas">
                           <small id="helpreservas" class="text-muted">Del fin de semana relevado</small>
                        </div>
                        <h3 class="text-muted text-center">Fechas del relevamiento</h3>
                        <div class="form-group">
                            <div class="row">
                             <div class="col-md-12">
                                 <label for="desde">Inicio</label>
                                 <input type="date" name="desde" id="desde" class="form-control fechas" placeholder="" aria-describedby="helpDesde">
                                 <small id="helpDesde" class="text-muted">Inicio del relevamiento</small>
                                </div>
                                <div class="col-md-12">

                                    <label for="hasta">Fin</label>
                                    <input type="date" name="hasta" id="hasta" class="form-control fechas" placeholder="" aria-describedby="helphasta">
                                    <small id="helphasta" class="text-muted">Fin del relevamiento</small>
                                </div>
                                {{-- <div class="col-md-12">
                                    <a class="from-control btn btn-block btn-success text-center" href="#" id="confirmarFechas">
                                        Confirmar Fechas
                                    </a>
                                </div> --}}


                            </div>
                        </div>

                        <div class="form-group" id="campos" style="display:none">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Día</th>
                                        <th>Plazas Ocupadas</th>
                                        <th>Porcentaje de Ocupación</th>
                                    </tr>
                                </thead>
                                <tbody id="cbody">



                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                        </div>
                        <div class="alert alert-danger" id="alert_fechas" role="alert" style="display:none";>
                          <h4 class="alert-heading">Error, el rango de fechas debe ser entre 3 y 5 días</h4>
                          <p></p>
                          <p class="mb-0"></p>
                        </div>

                    </form>




                </div>
            </div>
        </div>
    </div>
</div>
    {{--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"> </script>  --}}
  <script>
Date.prototype.toDateInputValue = (function() {
    var local = new Date(this);
    //local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0,10);
});

function addDays(date, days) {
  var result = new Date(date);
  result.setTime(result.getTime() + (days * 1000 * 3600 * 24));
  return result;
}



function updateMunicipio(muni_id)
{

            var div = $("#divHotel").html("");
            div.append('<label for="hotel">Alojamiento</label>')
            div.append('<select id="hotelOption" onchange="updateHotel(this.value)" class="form-control" name="hotel" data-live-search="true" required>')
            //div.append('<option selected disabled>Seleccione Alojamiento</option>')
            div.append('</select>');

            $.getJSON('/getHotels/'+muni_id,function(data){
                console.log(data);
                var o = new Option('Seleccione Alojamiento','')
                $(o).attr('disabled');
                $(o).html('Seleccione Alojamiento');
                        $("#hotelOption").append(o);
                data.forEach(function(item){
                        var o = new Option(item.denominacion, item.id);
                        /// jquerify the DOM object 'o' so we can use the html method
                        $(o).html(item.denominacion);
                        $("#hotelOption").append(o);


                })
                $("#hotelOption").selectpicker();
                })

            div.append('<label id="plazasLabel"></label>')
            div.show();
}

function updateHotel(hotel_id)
{

    $.getJSON('/getHotel/'+hotel_id,function(data){

        $("#plazasLabel").html('Plazas Totales: '+data.plazas);
        $("#frm_plazas").attr("max",data.plazas)
         $(".max_dia").attr("max",data.plazas)

    })
}

////////////////////////////////////
////////READY//////////////////
////////////////////////////////////
    $(function(){
            //ready
            $("#municipioOption").selectpicker();
        ///prevent enter submit
        $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });






        var campos = $("#campos");
        var alerta = $("#alert_fechas");


        // $('.fechas').val(new Date().toDateInputValue());

        $("#hasta").change(function(){

            var dias = diferencia();
            if(validarFechas(dias))
            {
                crearCampos(dias)
                campos.show();
                alerta.hide();
            }
            else
            {
                campos.hide();
                alerta.show();
            }

        })

        function crearCampos(dias){
            $("#cbody").html("");

            var inicio = new Date($("#desde").val());
            var i = 0;
            for (i = 0; i < dias; i++)
            {
                max =   $("#frm_plazas").attr("max")
                console.log(inicio)
                inicio = addDays(inicio,1);
                fecha = inicio.getDate()+"/"+(inicio.getMonth()+1)+"/"+inicio.getFullYear();
                dbfecha = inicio.getFullYear()+"/"+(inicio.getMonth()+1)+"/"+inicio.getDate();
                var t = '<tr>'
                    t +='<td scope="row">'+fecha+'</td>'
                    t +='<td><input name="plaza_'+i+'" type="number" min="0" class="form-control max_dia" max="'+max+'"  required></td>'
                    t +='<td><input name="porcentaje_'+i+'" type="number" min="0" max="100" class="form-control" required></td>'
                    t +='</tr>'
                    t +='<input type="hidden" name="fecha_'+i+'" value="'+dbfecha+'">'
                    t +='<input type="hidden" name="day_'+i+'" value="'+inicio.getDay()+'">'
                    $("#cbody").append(t)

            }


        }


        function validarFechas(c){
            if (c == 3 || c == 4 || c == 5)
            {
                return true
            }
            else
            {
                return false
            }

        }

        function diferencia(){
            var desde = new Date($("#desde").val());
            var hast = new Date($("#hasta").val());
            var timeDiff = Math.abs(hast.getTime() - desde.getTime());
            var oneday = 1000 * 3600 * 24;
            var diffDays = Math.ceil(timeDiff / (oneday));
            console.log("Dias: "+ diffDays +1)
            return diffDays + 1;
        }


        $("#frm_hotel").change(function(){
            var element = $("option:selected", this);
            var myTag = element.attr("plazas");
            console.log('mytag');
            $('#plazas').html(myTag);
        });

    })
  </script>
@endsection
