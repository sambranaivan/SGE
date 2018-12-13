@extends('layouts.app')

@section('content')
<script>


    $(document).ready(function(){


        fillStep3();

       // $("#step2").hide();
       // $("#step3").hide();

        $("#continuar2").click(function(){
                    $("#step2").hide();
                    $("#step3").show();
        })


        $("#volver2").click(function(){
                    $("#step1").show();
                    $("#step2").hide();
        })



        $("#continuar").click(function(e){


            ///get value of cantidad de familiares

            valid = true
            $(".step1").each(function(){
                if($(this)[0].checkValidity())
                {

                }
                else
                {
                    valid = false;

                }

            })


            if(valid){
                var cantidad = $("#miembros").val();
                if(cantidad){
                    $("#step1").hide();
                    $("#table_body").html("");//limpio tabla
                    for(i=1;i<=cantidad;i++)
                    {
                                row =  '<tr>'
                                row += '<td scope="row">'+i+'</td><td>'
                                row += '<div class="form-group">'
                                row += '<input type="text" min="0" max="99" class="form-control" name="nombre_'+i+'">'
                                row += '</div>'
                                row += '</td><td>'
                                row += '<div class="form-group">'
                                row += '<select name="sexo_'+i+'" class="form-control">'
                                row += '<option value="0" selected="selected" disabled>--</option>'
                                row += '<option value="H">Hombre</option>'
                                row += '<option value="M">Mujer</option>'
                                row += '</select>'
                                row += '</div>'
                                row += '</td>'
                                row += '<td>'
                                row += '<div class="form-group">'
                                row += '<input type="text" min="0" max="99" class="form-control" name="edad_'+i+'">'
                                row += '</div>'
                                row += '</td>'
                                row += '</tr>'
                                $("#table_body").append(row);
                    }

                    $("#step2").show();
                }
            }
            else{
                alert("Complete todos los campos");
            }



        })

        function fillStep3(){


            w = $("#step3");

            bloque = '<h4>En los últimos 3 meses, las personas de este hogas han vivido...</h4>'
            querys = [
                '1 ... de lo que ganan en el trabajo?',//trabajo
                '2 ... de alguna jubilacion o pensión?',//jubilacion
                '3 ... de indemnización por despido?',//despido
                '4 ... de seguro de desempleo?',//desempleo
                '5 ... de subsidio o ayuda social (en dinero) del gobierno, iglesias, etc.?'//subsidio
                ]


            w.append(bloque);
            querys.forEach(function(el,i) {
                w.append(generateRowStep3(el,i+1))

                    }
                )

            bloque = '<h4>Cobraron ...</h4>'
            querys = [
                '8 ... algún alquiler (por un alquiler, terreno, oficina, etc) de su propiedad?',//alquiler
                '9 ... ganancias de algún negocio en ell que no trabajan?',//negocio
                '10 ... intereses o rentas por plazos fijos/inversiones?',//intereses
                '11 ... una beca de estudio?',//beca
                '12 ... cuotas de alimentos o ayuda en dinero de personas que no viven en el hogar?'//cuota_alimentos
                ]


            w.append(bloque);
            querys.forEach(function(el,i) {
                w.append(generateRowStep3(el,i+6))

                     }
                )

            ///

            //databinding

            $(".radio").change(function(){
                el = $(this);
                ref = el.attr('ref');
                selector = ("#cuanto_value_"+ref);
                control = $(selector)

                if(el.val() == 1)//si
                {
                    console.log(selector+"->"+el.val())
                    control.removeAttr('disabled');
                    control.removeAttr('required');
                }
                else{//no
                    console.log(selector+"->"+el.val())
                    control.attr('disabled','disabled');
                    control.attr('required','required');

                }
            })


            ///submit...
            w.append('<a class="btn btn-primary float-left" id="volver3">Volver</button>')
            w.append('<button type="submit" class="btn btn-primary float-right">Enviar</button>')

            $("#volver3").click(function(){
                $("#step2").show();
                $("#step3").hide();
            })


        }

        function generateRowStep3(query,index){
                row ='<div class="row">'
                row +='<div class="col-md-3">'+query+'</div>'
                row +='<div class="col-md-3">'
                row +='<div class="form-check form-check-inline">'
                row +='<label class="form-check-label">'
                row +='<input class="form-check-input radio" ref="'+index+'" type="radio" name="cuanto_option_'+index+'" id="" value=1> Si'
                row +='</label>'
                row +='</div>'
                row +='<div class="form-check form-check-inline">'
                row +='<label class="form-check-label">'
                row +='<input class="form-check-input radio" ref="'+index+'" type="radio" name="cuanto_option_'+index+'" id="" value=0> No'
                row +='</label>'
                row +='</div>'
                row +='</div></div>'//row
                row += '<div class="row">'
                row +='<div class="col-md-1">'
                row +='<label class="float-right">Cuanto?</label>'
                row +='</div>'
                row +=' <div class="col-md-2">'
                row +='<div class="form-group-sm">'
                row +='<input type="number" name="cuanto_value_'+index+'" id="cuanto_value_'+index+'"  class="form-control input-sm  " placeholder="" aria-describedby="helpId">'
                row +='</div>'
                row +='</div>'


                row +='</div>'

                return row;
        }




    })
</script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form class="form" action="reporte/post" method="POST" id="form">
                {{csrf_field()}}
            <div class="card">
                <div class="card-header">Encuesta de Pobreza
                    <a name="" id="" class="btn btn-primary float-right" href="/pobreza/reporte" role="button">Ver Cargas</a>
                </div>

                <div class="card-body" id="step1">



                        <div class="row">

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="participacion">Participación</label>
                                            <select name="participacion" id="" class="form-control step1">
                                                <option value="1">Primera Vez</option>
                                                <option value="2">Segunda Vez</option>
                                                <option value="3">Tercera Vez</option>
                                                <option value="4">Cuarta Vez</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Semana N°</label>
                                                <input type="number" min=0 name="semana" id="" class="form-control step1" placeholder="" aria-describedby="helpId" required>

                                            </div>
                                    </div>
                                    <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Trimestre</label>
                                                <input type="number" min=0 id=""  name="trimestre" class="form-control step1" placeholder="" aria-describedby="helpId" required>

                                            </div>
                                    </div>
                                    <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Año</label>
                                                <input type="number" min=0 id="" name="anio" class="form-control step1" placeholder=""  value="2019" aria-describedby="helpId" required>

                                            </div>
                                    </div>



                        </div>

                         <div class="row">

                             <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Código de Area</label>
                                                <input type="number" min=0 name="codigo_area" name="area"  id="" class="form-control step1" placeholder="" aria-describedby="helpId" required>

                                            </div>
                                    </div>
                            <div class="col-md-3">
                                    <div class="form-group">
                                    <label for="">Direccion</label>
                                    <input type="text" name="direccion" id="" class="form-control step1" placeholder="" aria-describedby="helpId" required>

                                    </div>
                            </div>
                            <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Vivienda</label>
                                                <input type="number" min=0 id="" name="vivienda_numero" class="form-control step1" placeholder="" aria-describedby="helpId" required>

                                            </div>
                            </div>
                            <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Hogar</label>
                                                <input type="number" min=0 id="" name="hogar" class="form-control step1" placeholder="" aria-describedby="helpId" required>

                                            </div>
                            </div>

                            <div class="col-md-3">
                                    <div class="form-group">
                                    <label for="">Telefono</label>
                                    <input type="text" name="telefono" id="" class="form-control step1" placeholder="" aria-describedby="helpId" required>

                                    </div>
                            </div>
                             <div class="col-md-3">
                                    <div class="form-group">
                                    <label for="">Jefe</label>
                                    <input type="text" name="jefe" id="" class="form-control step1" placeholder="" aria-describedby="helpId" required>

                                    </div>
                            </div>
                             <div class="col-md-3">
                                  <div class="form-group">
                                    <label for="">Cantidad de Miembros de la Familia</label>
                                    <input type="text" name="miembros" id="miembros" class="form-control step1" placeholder="" aria-describedby="helpId" required>

                                    </div>
                             </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                    <a href="#" class="btn btn-primary btn-block form-control" id="continuar">Continuar</a>
                                </div>
                             </div>

                         </div>
                         <div class="row">

                         </div>
                         <div class="row">

                         </div>






                </div>
                {{--  //end body  --}}
                    <div class="card-body" id="step2">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                     <th>Nombre</th>
                                    <th>Sexo</th>
                                    <th>Edad</th>
                                </tr>
                            </thead>
                            <tbody id="table_body">


                            </tbody>
                        </table>
                        <a name=""  class="btn btn-primary float-left" href="#" id="volver2" role="button">Volver</a>
                        <a name=""  class="btn btn-primary float-right" href="#" id="continuar2" role="button">Continuar</a>


                    </div>
                {{--  step 3 si/no/cuanto?  --}}

                <div class="card-body" id="step3">

                </div>

            </div>
            {{--  //end card  --}}

            </form>
        </div>
    </div>
</div>
@endsection
