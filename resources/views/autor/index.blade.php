@extends('layouts.admin')
@section('titulo')
    Index de autor
@endsection
@section('contenido')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 class="text-center">
                Listado de Autores   
            </h3>
            <a href="autor/create"><button class="btn btn-success container-fluid">Nuevo</button></a> 
            <div class="clearfix"><br></div><div class="clearfix"></div>
            
        </div>
    </div>

        <div class="table-responsive table-responsive-xl table-responsive-md table-responsive-lg table-responsive-sm">
            @include('autor.search')
            <table class="table table-hover table-sm ">
                
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-center align-middle">Id</th>
                        <th scope="col" class="text-center align-middle">Pseudonimo</th>
                        <th scope="col" class="text-center align-middle">Nombre</th>
                        <th scope="col" class="text-center align-middle">Apellidos</th>
                        <th scope="col" class="text-center align-middle ">Opciones</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($autores as $item)
                        <tr>
                            <th scope="row"  class="text-center align-middle">{{$item ->Id_autor}}</td>
                            <td  class="text-center align-middle">{{$item ->pseudonimo}}</td>
                            <td class="text-center align-middle">{{$item ->nombre}}</td>
                            <td class="text-center align-middle">{{$item ->apellidos}}</td>
                            <td class="text-center align-middle ">
                                <a href="{{URL::action('AutorController@edit',$item ->Id_autor)}}">
                                    <button class="btn btn-info container-fluid btn-sm">
                                        Editar
                                    </button>
                                </a>
                                <a href="" data-target="#modal-delete-{{$item->Id_autor}}" data-toggle="modal">
                                    <button class="btn btn-danger container-fluid btn-sm">
                                        Eliminar
                                    </button>
                                </a>
                            </td>
                        </tr>
                        @include('autor.modal') 
                    @endforeach
                </tbody>
            </table>
            {{$autores->render()}}
            {{$numero}}
            @include('autor.paginador')
    </div>

@endsection