@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Pais: {{ $paises->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($paises,['method'=>'PATCH','route'=>['paises.update',$paises->id_pais]])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="id_pais">ID del Pais</label>
            	<input type="text" name="id_pais" class="form-control" placeholder="Id..." value="{{$paises->id_pais}}">
            </div>
            <div class="form-group">
            	<label for="nombre">Nombre del País</label>
            	<input type="text" name="nombre" class="form-control" placeholder="nombre..." value="{{$paises->nombre}}">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection