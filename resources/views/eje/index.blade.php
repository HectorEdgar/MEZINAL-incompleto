@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Editores <a href="editor/create"><button class="btn btn-success">Nuevo</button></a></h3>

		<!--ESTO ES COMO UNA MASTER PAGE-->
		@include('editor.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Editor</th>
				</thead>
               @foreach ($editores as $cat)
				<tr>
					<td>{{ $cat->id_editor}}</td>
					<td>{{ $cat->editor}}</td>
					<td>
						<a href="{{URL::action('EditorController@edit',$cat->id_editor)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cat->id_editor}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('editor.modal')
				@endforeach
			</table>
		</div>
		<!--RENDER ES EL PAGINADOR -->
		{{$editores->render()}}
	</div>
</div>
@endsection