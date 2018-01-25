@extends ('layouts.admin')
@section('titulo') 
	Crear Eje
@endsection
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Eje</h3>
			<!--VALIDACIONES DE LARAVEL
			RULES HECHAS EN EL FORM REQUEST-->
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'eje','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" class="form-control" placeholder="Nombre...">
            </div>
            <div class="form-group">
            	<label for="descripcion">Descripción</label>
            	<input type="text" name="descripcion" class="form-control" placeholder="Descripción...">
			</div>
			<div class="form-group">
				<label for="area">Area</label>
				<input type="text" name="area" class="form-control" placeholder="Area...">
			</div>
			<div class="form-group">
				<label for="poblacion">Población</label>
				<input type="text" name="poblacion" class="form-control" placeholder="Población...">
			</div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-secondary" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection