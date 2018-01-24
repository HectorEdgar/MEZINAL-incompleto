@extends ('layouts.admin')
@section('titulo') 
Index de Eje
@endsection
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Ejes <a href="eje/create"><button class="btn btn-success">Nuevo</button></a></h3>
		<!--ESTO ES COMO UNA MASTER PAGE-->
	@include('eje.search')
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Descripción</th>
					<th>Area</th>
					<th>Población</th>
					<th>Opciones</th>
				</thead>
				@foreach ($ejes as $item)
				<tr>
					<td>{{ $item->Id_eje}}</td>
					<td>{{ $item->nombre}}</td>
					<td>{{ $item->descripcion}}</td>
					<td>{{ $item->area}}</td>
					<td>{{ $item->poblacion}}</td>
					<td>
						<a href="{{URL::action('EjeController@edit',$item->Id_eje)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$item->Id_eje}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('eje.modal') 
				@endforeach
			</table>
		</div>
		<!--RENDER ES EL PAGINADOR -->
		{{$ejes->render()}}
	</div>
</div>
@endsection