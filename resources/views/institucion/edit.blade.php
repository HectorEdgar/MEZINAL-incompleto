@extends('layouts.admin') 
@section('titulo') Editar Institución
@endsection
 
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3>Editar Institución {{$institucion->nombre}} ( {{$institucion->siglas}} )</h3>
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif 
        {!!Form::model($institucion,['method'=>'PATCH','route'=>['institucion.update',$institucion->Id_institucion]]) !!}
        {{Form::token()}}
        <div class="form-group">
            <label for="Id_institucion">Id Institución</label>
            <input type="text" name="Id_institucion" class="form-control" placeholder="Id.." value="{{$institucion->Id_institucion}}">
        </div>
        <div class="form-group">
            <label for="nombre">Nombre de Institución</label>
            <input type="text" name="nombre" class="form-control" placeholder="Nombre de la Institución.." value="{{$institucion->nombre}}">
        </div>
        <div class="form-group">
            <label for="siglas">Siglas</label>
            <input type="text" name="siglas" class="form-control" placeholder="Siglas.." value="{{$institucion->siglas}}">
        </div>
        <div class="form-group">
            <label for="pais">Pais</label>
            <input type="text" name="pais" class="form-control" placeholder="Pais.." value="{{$institucion->pais}}">
        </div>
        <div class="form-group">
            <label for="localidad">Localidad</label>
            <input type="text" name="localidad" class="form-control" placeholder="localidad.." value="{{$institucion->localidad}}">
        </div>
        <div class="form-group">
            <label for="extra">Sector Social</label>
            <input type="number" name="extra" class="form-control" placeholder="Sector Social.." value="{{$institucion->extra}}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <button type="reset" class="btn btn-secondary">Cancelar</button>
        </div>
        {!!Form::close()!!}
    </div>
</div>
@endsection