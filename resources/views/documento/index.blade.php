@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de 	Documentos <a href="documento/create"><button class="btn btn-success">Nuevo</button></a></h3>

		<!--ESTO ES COMO UNA MASTER PAGE-->
		@include('documento.search')
	</div>
</div>


		<div class="table-responsive table-responsive-xl table-responsive-md table-responsive-lg table-responsive-sm">
			<table class="table table-hover table-sm">
				<thead class="thead-dark">
					<tr>
						<th scope="col" class="text-center align-middle">Id</th>
						<th scope="col" class="text-center align-middle">Titulo</th>
						<th scope="col" class="text-center align-middle">Fecha Consulta</th>
						<th scope="col" class="text-center align-middle">Fecha Registro</th>
						<th scope="col" class="text-center align-middle">Opciones</th>
					</tr>

				</thead>
               @foreach ($documento as $doc)
				<tr>
					<th scope="row" class="text-center align-middle">{{ $doc->Id_doc}}</th>
					<td class="text-center align-middle">{{ $doc->titulo}}</td>
					<td class="text-center align-middle">{{ $doc->fecha_consulta}}</td>
					<td class="text-center align-middle">{{ $doc->fecha_registro}}</td>
					<td class="text-center align-middle">
							<a href="{{URL::action('DocumentoController@edit',$doc->Id_doc)}}">
							<img length="30px" width="30px" src="{{asset('imgs/editar.svg')}}" title="Editar"></img>
							</a>
							<a href="" data-target="#modal-delete-{{$doc->Id_doc}}" data-toggle="modal">
							<img length="30px" width="30px" src="{{asset('imgs/eliminar.svg')}}" title="Eliminar"></img>
							</a>
							<a href="{{URL::action('DocumentoController@show',$doc->Id_doc)}}">
							<img length="30px" width="30px" src="{{asset('imgs/ver.svg')}}" title="Ver Detalle"></img>
							</a>
					</td>
				</tr>
				@include('Documento.modal')
				@endforeach
			</table>
		
			<!--RENDER ES EL PAGINADOR -->
			{{$documento->render()}}
		</div>

@endsection