@extends('layouts.admin')
@section('titulo')
    Index de autor
@endsection
@section('contenido')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Listado de Autores
                <a href="autor/create"><button class="btn btn-success">Nuevo</button></a>
            </h3>
            @include('autor.search')
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Pseudonimo</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Opciones</th>
                    </thead>
                    @foreach($autores as $item)
                    <tr>
                        <td>{{$item ->Id_autor}}</td>
                        <td>{{$item ->pseudonimo}}</td>
                        <td>{{$item ->nombre}}</td>
                        <td>{{$item ->apellidos}}</td>
                        <td>
                            <a href="{{URL::action('AutorController@edit',$item ->Id_autor)}}">
                                <button class="btn btn-info">
                                    Editar
                                </button>
                            </a>
                            <a href="" data-target="#modal-delete-{{$item->Id_autor}}" data-toggle="modal">
                                <button class="btn btn-danger">
                                    Eliminar
                                </button>
                            </a>
                        </td>
                    </tr>
                    @include('autor.modal') @endforeach
                </table>
            </div>
            {{$autores->render()}}
        </div>
    </div>
@endsection