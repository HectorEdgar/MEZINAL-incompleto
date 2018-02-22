@extends('layouts.admin')
@section('titulo')
    Index
@endsection
@section('contenido')
  @guest
    <h3>Inicie Sesión por favor</h3>
    @else
      <h3>Bienvenido {{ Auth::user()->name }} </h3>
      <br>
  @endguest

  </br>

<div class="row">

  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card text-white mb-3" style="background-color: #f37bad">
      <div class="card-header text-center">
        <img height="42" width="42" src="{{ asset('imgs/busquedas.svg') }}" class="img-fluid" alt="Responsive image">
      </div>
      
      <div class="card-body">
        <h5 class="card-title text-center">Area de Consultas</h5>
        <p class="card-text text-center">Consultas por Id, Tipo, Proyecto, Estado de Revisión</p>
        
      </div>
      <div class="card-footer">
        <small class="text-muted"><a href="/" class="btn btn-outline-white text-white container-fluid">Entrar</a></small>
      </div>
    </div>
  </div>
  
  <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
      <div class="card-header text-center"> 
        <img src="{{ asset('imgs/documento.svg') }}"> </img>
      </div>
      <div class="card-body">
        <h5 class="card-title text-center">Documento</h5>
        <p class="card-text text-center">Agrega, Busca, Edita o Elimina un Documento</p>
      </div>
      <div class="card-footer">
        <small class="text-muted"><a href="/documento" class="btn btn-outline-danger  text-white container-fluid">Entrar</a></small>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
      <div class="card-header text-center"><img src="{{ asset('imgs/autor.svg') }}"></div>
      <div class="card-body">
        <h5 class="card-title text-center">Autor</h5>
        <p class="card-text text-center">Agrega, Busca, Edita o Elimina un Autor</p>
      </div>
      <div class="card-footer">
        <small class="text-muted"><a href="/autor" class="btn btn-outline-success  text-white container-fluid">Entrar</a></small>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
      <div class="card-header text-center"><img src="{{ asset('imgs/editor.svg') }}"> </img>
      </div>
      <div class="card-body">
        <h5 class="card-title text-center">Editor</h5>
        <p class="card-text text-center">Entra al catálogo de la tabla Editor</p>
      </div>
      <div class="card-footer">
        <small class="text-muted"><a href="/editor" class="btn btn-outline-info  text-white container-fluid">Entrar</a></small>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
      <div class="card-header text-center"><img src="{{ asset('imgs/institucion.svg') }}"></div>
      <div class="card-body">
        <h5 class="card-title text-center">Institución</h5>
        <p class="card-text text-center">Entra al catálogo de la tabla Institución</p>
      </div>
      <div class="card-footer">
        <small class="text-muted"><a href="/institucion" class="btn btn-outline-primary  text-white container-fluid">Entrar</a></small>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
      <div class="card-header text-center"><img height="42" width="42" src="{{ asset('imgs/tema.png
      ') }}"></div>
      <div class="card-body">
        <h5 class="card-title text-center">Tema</h5>
        <p class="card-text text-center">Entra al catálogo de la tabla Tema</p>
      </div>
      <div class="card-footer">
        <small class="text-muted"><a href="/tema" class="btn btn-outline-secondary  text-white container-fluid">Entrar</a></small>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
      <div class="card-header text-center"><img height="42" width="42" src="{{ asset('imgs/eje.svg
      ') }}"></div>
      <div class="card-body">
        <h5 class="card-title text-center">Eje</h5>
        <p class="card-text text-center">Entra al catálogo de la tabla Eje</p>
      </div>
      <div class="card-footer">
        <small class="text-muted"><a href="/eje" class="btn btn-outline-secondary  text-white container-fluid">Entrar</a></small>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
      <div class="card-header text-center"><img height="42" width="42" src="{{ asset('imgs/paises2.png
      ') }}"></div>
      <div class="card-body">
        <h5 class="card-title text-center">Paises</h5>
        <p class="card-text text-center">Entra al catálogo de la tabla Paises</p>
      </div>
      <div class="card-footer">
        <small class="text-muted"><a href="/paises" class="btn btn-outline-secondary  text-white container-fluid">Entrar</a></small>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
      <div class="card-header text-center"> <img height="42" width="42" src="{{ asset('imgs/catalogoDocumento.svg
      ') }}"></div>
      <div class="card-body">
        <h5 class="card-title text-center">Categoria Documento</h5>
        <p class="card-text text-center">Entra al catálogo de la tabla documento</p>
      </div>
      <div class="card-footer">
        <small class="text-muted"><a href="/categoriaDocumento" class="btn btn-outline-secondary  text-white container-fluid">Entrar</a></small>
      </div>
    </div>
  </div>
  
</div>
  <br>
@endsection
