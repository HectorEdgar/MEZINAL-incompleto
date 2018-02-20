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
            <div class="clearfix"><br></div><div class="clearfix"></div>
            
        </div>
    </div>

    <div class="container">
       <div class="row">
        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
            @include('autor.search')
        </div>
        <div class="col-auto">
                <a href="autor/create"><button type="button" class="btn btn-outline-success">
                    <img length="30px" width="30px" src="{{asset('imgs/agregar.svg')}}"></img></button></a> 
        </div>
        </div>
    </div>
        <div class="table-responsive table-responsive-xl table-responsive-md table-responsive-lg table-responsive-sm">        
        
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
                            <td class="text-center align-middle">{{$item ->pseudonimo}}</td>
                            <td class="text-center align-middle">{{$item ->nombre}}</td>
                            <td class="text-center align-middle">{{$item ->apellidos}}</td>
                            <td class="text-center align-middle ">
                                <a href="{{URL::action('AutorController@edit',$item ->Id_autor)}}">
                                     <img length="30px" width="30px" src="{{asset('imgs/editar.svg')}}" title="Editar"></img>
                                </a>
                                <a href="" data-target="#modal-delete-{{$item->Id_autor}}" data-toggle="modal">
                                    <img length="30px" width="30px" src="{{asset('imgs/eliminar.svg')}}" title="Eliminar"></img>
                                </a>
                            </td>
                        </tr>
                        @include('autor.modal') 
                    @endforeach
                </tbody>
            </table>
            {{$autores->render()}}
            {{$totalRegistros}}
            @include('autor.paginador')
    </div>

@endsection