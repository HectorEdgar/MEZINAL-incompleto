@extends('layouts.admin')
@section('titulo')
    Index de tema
@endsection
@section('contenido')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Listado de Temas
                <a href="tema/create"><button class="btn btn-success">Nuevo</button></a>
            </h3>
            @include('tema.search')
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Descripción</th>
                        <th>Opciones</th>
                    </thead>
                    @foreach($temas as $item)
                    <tr>
                        <td>{{$item ->id_tema}}</td>
                        <td>{{$item ->descripcion}}</td>
                        <td>
                            <a href="{{URL::action('TemaController@edit',$item ->id_tema)}}">
                                <button class="btn btn-info">
                                    Editar
                                </button>
                            </a>
                            <a href="" data-target="#modal-delete-{{$item->id_tema}}" data-toggle="modal">
                                <button class="btn btn-danger">
                                    Eliminar
                                </button>
                            </a>
                        </td>
                    </tr>
                    @include('tema.modal') @endforeach
                </table>
            </div>
            {{$temas->render()}}
        </div>
    </div>
@endsection