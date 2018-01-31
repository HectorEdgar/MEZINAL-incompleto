@extends('layouts.admin') 
@section('titulo')
    Crear Institución
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3>Nueva Institución</h3>
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif {!!Form::open(array('url'=>'/institucion','method'=>'POST','autocomplete'=>'off')) !!} {{Form::token()}}

        <div class="row">
         <!--   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="Id_institucion">Id Institución</label>
                        <input type="text" name="Id_institucion" class="form-control" placeholder="Id..">
                    </div>
                </div>
        -->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="nombre">Nombre de Institución</label>
            <input type="text" name="nombre" class="form-control" placeholder="Nombre de la Institución..">
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="siglas">Siglas</label>
            <input type="text" name="siglas" class="form-control" placeholder="Siglas..">
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="pais">Pais</label>
            <input type="text" name="pais" class="form-control" placeholder="Pais..">
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="localidad">Localidad</label>
            <input type="text" name="localidad" class="form-control" placeholder="localidad..">
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

            <div class="form-group">
            <label for="extra">Sector Social</label>
            <input type="number" name="extra" class="form-control" placeholder="Sector Social..">
        </div>
    </div>
</div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <button type="reset" class="btn btn-secondary">Cancelar</button>
        </div>
        {!!Form::close()!!}
    </div>
</div>
@endsection