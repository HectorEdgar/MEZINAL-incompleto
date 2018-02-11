@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Categoria Documento: {{ $categoriasDocumento->tipo_doc}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($categoriasDocumento,['method'=>'PATCH','route'=>['categoriaDocumento.update',$categoriasDocumento->id_cata_doc]])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="tipo_doc">ID categoria</label>
            	<input type="text" name="id_cata_doc" class="form-control" placeholder="Id" value="{{$categoriasDocumento->id_cata_doc}}" readonly>
            </div>
            <div class="form-group">
            	<label for="tipo_doc">Nombre de la categoria</label>
            	<input type="text" name="tipo_doc" class="form-control" placeholder="nombre" value="{{$categoriasDocumento->tipo_doc}}">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection