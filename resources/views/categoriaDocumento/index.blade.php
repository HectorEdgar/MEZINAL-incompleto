@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de 	Categorias <a href="categoriaDocumento/create"><button class="btn btn-success">Nuevo</button></a></h3>

		<!--ESTO ES COMO UNA MASTER PAGE-->
		@include('categoriaDocumento.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<td>Opciones</td>
				</thead>
               @foreach ($categoriasDocumento as $cat)
				<tr>
					<td>{{ $cat->id_cata_doc}}</td>
					<td>{{ $cat->tipo_doc}}</td>

					<td>
						<a href="{{URL::action('CategoriaDocumentoController@edit',$cat->id_cata_doc)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cat->id_cata_doc}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('categoriaDocumento.modal')
				@endforeach
			</table>
		</div>
		<!--RENDER ES EL PAGINADOR -->
		{{$categoriasDocumento->render()}}
	</div>
</div>
@endsection