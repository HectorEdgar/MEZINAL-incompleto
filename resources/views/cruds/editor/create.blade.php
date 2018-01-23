@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Editor</h3>
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

			{!!Form::open(array('url'=>'cruds/editor','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="id_editor">ID del Editor</label>
            	<input type="text" name="id_editor" class="form-control" placeholder="Id...">
            </div>
            <div class="form-group">
            	<label for="editor">Nombre del Editor</label>
            	<input type="text" name="editor" class="form-control" placeholder="nombre...">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection