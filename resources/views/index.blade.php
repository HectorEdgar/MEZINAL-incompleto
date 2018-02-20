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
  
<div class="row">

    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
          <div class="card-header text-center"> <img src="{{ asset('imgs/documento.svg') }}"> </img></div>
          <div class="card-body">
            <h5 class="card-title text-center">Documento</h5>
            <p class="card-text text-center">Agrega Busca, Editar o Elimina un Documento</p>
          </div>
          <div class="card-footer">
            <small class="text-muted"><a href="/documento" class="btn btn-outline-danger  text-white container-fluid">Entrar</a></small>
          </div>
        </div>
      </div>
    



  <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
      <div class="card-header text-center">Catalogo</div>
      <div class="card-body">
        <h5 class="card-title">Autor</h5>
        <p class="card-text">Entra al catálogo de la tabla Autor</p>
      </div>
      <div class="card-footer">
        <small class="text-muted"><a href="/autor" class="btn btn-outline-secondary  text-white container-fluid">Entrar</a></small>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
      <div class="card-header text-center">Catalogo</div>
      <div class="card-body">
        <h5 class="card-title">Tema</h5>
        <p class="card-text">Entra al catálogo de la tabla Tema</p>
      </div>
      <div class="card-footer">
        <small class="text-muted"><a href="/tema" class="btn btn-outline-secondary  text-white container-fluid">Entrar</a></small>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
      <div class="card-header text-center">Catalogo</div>
      <div class="card-body">
        <h5 class="card-title">Eje</h5>
        <p class="card-text">Entra al catálogo de la tabla Eje</p>
      </div>
      <div class="card-footer">
        <small class="text-muted"><a href="/eje" class="btn btn-outline-secondary  text-white container-fluid">Entrar</a></small>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
      <div class="card-header text-center">Catalogo</div>
      <div class="card-body">
        <h5 class="card-title">Editor</h5>
        <p class="card-text">Entra al catálogo de la tabla Editor</p>
      </div>
      <div class="card-footer">
        <small class="text-muted"><a href="/editor" class="btn btn-outline-secondary  text-white container-fluid">Entrar</a></small>
      </div>
    </div>
  </div>


  <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
      <div class="card-header text-center">Catalogo</div>
      <div class="card-body">
        <h5 class="card-title">Paises</h5>
        <p class="card-text">Entra al catálogo de la tabla Paises</p>
      </div>
      <div class="card-footer">
        <small class="text-muted"><a href="/paises" class="btn btn-outline-secondary  text-white container-fluid">Entrar</a></small>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xs-12">
      <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
        <div class="card-header text-center">Catalogo</div>
        <div class="card-body">
          <h5 class="card-title">Institución</h5>
          <p class="card-text">Entra al catálogo de la tabla Institución</p>
        </div>
        <div class="card-footer">
          <small class="text-muted"><a href="/institucion" class="btn btn-outline-secondary  text-white container-fluid">Entrar</a></small>
        </div>
      </div>
    </div>




<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xs-12">
      <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
        <div class="card-header text-center">Catalogo</div>
        <div class="card-body">
          <h5 class="card-title">Categoria Documento</h5>
          <p class="card-text">Entra al catálogo de la tabla documento</p>
        </div>
        <div class="card-footer">
          <small class="text-muted"><a href="/categoriaDocumento" class="btn btn-outline-secondary  text-white container-fluid">Entrar</a></small>
        </div>
      </div>
    </div>
</div>



</div>

@endsection
