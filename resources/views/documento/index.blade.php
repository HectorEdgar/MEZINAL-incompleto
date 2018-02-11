@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de 	Documentos <a href="documento/create"><button class="btn btn-success">Nuevo</button></a></h3>

		<!--ESTO ES COMO UNA MASTER PAGE-->
		@include('documento.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Titulo</th>
					<td>Pais</td>
					<td>Estado</td>
					<td>Fecha Publicación</td>
					<td>Url</td>
					<td>Investigador</td>
					<td>Fecha Consulta</td>
					<td>Fecha Registro</td>
					<td>Opciones</td>

				</thead>
               @foreach ($documento as $doc)
				<tr>
					<td>{{ $doc->Id_doc}}</td>
					<td>{{ $doc->titulo}}</td>
					<td>{{ $doc->lugar_public_pais}}</td>
					<td>{{ $doc->lugar_public_edo}}</td>
					<td>{{ $doc->fecha_publi}}</td>
					<td>{{ $doc->url}}</td>
					<td>{{ $doc->investigador}}</td>
					<td>{{ $doc->fecha_consulta}}</td>
					<td>{{ $doc->fecha_registro}}</td>


					<td>
						<a href="{{URL::action('DocumentoController@edit',$doc->Id_doc)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$doc->Id_doc}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('Documento.modal')
				@endforeach
			</table>
		</div>
		<!--RENDER ES EL PAGINADOR -->
		{{$documento->render()}}
	</div>
</div>
@endsection