@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Nuevo Formulario de Encuesta
                </div>

                <div class="card-body">
                    <form>
                        <div class="form-group">
                          <label for="titulo">Título</label>
                          <input type="text" name="titulo" id="frm_titulo" class="form-control" placeholder="Título">

                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
