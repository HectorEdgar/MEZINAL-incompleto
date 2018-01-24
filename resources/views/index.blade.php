@extends('layouts.admin')
@section('titulo')
    Index
@endsection
@section('contenido')
    <h3>Index</h3>
<div class="row">
  <div class="col-sm-2">
    <div class="card">
      <div class="card-block">
      	<center>
        <h3 class="card-title">Autor</h3>
        <p class="card-text">Tabla Autor</p>
        <a href="/autor" class="btn btn-primary">Vamos</a>
        </center>
      </div>
    </div>
  </div>
  <div class="col-sm-2">
    <div class="card">
      <div class="card-block">
      	<center>
        <h3 class="card-title">Editor</h3>
        <p class="card-text">Tabla Editor</p>
        <a href="/editor" class="btn btn-primary">Vamos</a>
        </center>
      </div>
    </div>
  </div>
</div>
@endsection
