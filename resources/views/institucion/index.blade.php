@extends('layouts.admin')
@section('titulo')
    Index de Institución
@endsection
@section('contenido')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Listado de Instituciones
                <a href="institucion/create"><button class="btn btn-success">Nuevo</button></a>
            </h3>
            @include('institucion.search')
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Siglas</th>
                        <th>Pais</th>
                        <th>Localidad</th>
                        <th>Extra</th>
                        <th>Opciones</th>
                    </thead>
                    @foreach($instituciones as $item)
                    <tr>
                        <td>{{$item ->Id_institucion}}</td>
                        <td>{{$item ->nombre}}</td>
                        <td>{{$item ->siglas}}</td>
                        <td>{{$item ->pais}}</td>
                        <td>{{$item ->localidad}}</td>
                        <td>{{$item ->extra}}</td>
                        <td>
                            <a href="{{URL::action('InstitucionController@edit',$item ->Id_institucion)}}">
                                <button class="btn btn-info">
                                    Editar
                                </button>
                            </a>
                            <a href="" data-target="#modal-delete-{{$item->Id_institucion}}" data-toggle="modal">
                                <button class="btn btn-danger">
                                    Eliminar
                                </button>
                            </a>
                        </td>
                    </tr>
                    @include('institucion.modal') @endforeach
                </table>
            </div>
            {{$instituciones->render()}}
        </div>
    </div>
@endsection