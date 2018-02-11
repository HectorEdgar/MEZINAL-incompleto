@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Documento</h3>
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


			@if (session('status'))
    			<div class="alert alert-danger">
        		{{ session('status') }}
   				 </div>
			@endif

			{!!Form::open(array('url'=>'documento','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}    

            <div class="form-group">
            	<label for="titulo">Titulo documento</label>
            	<input type="text" name="titulo" class="form-control" placeholder="Titulo">
            </div>

            <div class="form-group">
            	<label for="lugar_public_pais">País publicación</label>
            	<input type="text" name="lugar_public_pais" class="form-control" placeholder="País publicación">
            </div>





            <div class="form-group">
            	<label for="lugar_public_edo">Estado publicación </label>
            	<input type="text" name="lugar_public_edo" class="form-control" placeholder="Estado publicación ">
            </div>

            <div class="form-group">
            	<label for="derecho_autor">Derechos autor</label>

           <select  name="derecho_autor" class="form-control">
            	<option value="1">1</option>
  				<option value="0">0</option>
  			</select>
            </div>

            <div class="form-group">
            	<label for="fecha_publi">Fecha publicación</label>

           <select  name="fecha_publi" class="form-control">
            	<option value="1">1</option>
  				<option value="0">0</option>
  			</select>
            </div>

            <div class="form-group">
            	<label for="url">Url</label>
            	<input type="text" name="url" class="form-control" placeholder="url">
            </div>

            

            <div class="form-group">
            	<label for="investigador">Investigador</label>
            	<input type="text" name="investigador" class="form-control" placeholder="Investigador">
            </div>

            <div class="form-group">
            	<label for="fecha_consulta">Fecha consulta</label>
            	<input type="date" name="fecha_consulta" class="form-control" placeholder="Fecha consulta">
            </div>

            <div class="form-group">
            	<label for="poblacion">Población</label>
            	<input type="number" name="poblacion" class="form-control" placeholder="Población" min="0">
            </div>


            <div class="form-group">
            	<label for="tipo">Tipo</label>

           <select  name="tipo" class="form-control">
           	 @foreach ($categorias as $cat)

           	 <option value="{{ $cat->id_cata_doc }}" >{{$cat->tipo_doc }}</option>
            

			@endforeach
  			</select>
            </div>


            <div class="form-group">
            	<label for="notas">Notas</label>

            	<div class="form-group">
            	<textarea rows="4" cols="50" name="notas" class="form-group"></textarea>
				</div>
            </div>

             <div class="form-group">
            	<label for="fecha_registro">Fecha registro</label>
            	<input type="datetime-local" name="fecha_registro" class="form-control" placeholder="Fecha consulta">
            </div>

            <div class="form-group">
            	<label for="revisado">Revisado</label>

           <select  name="revisado" class="form-control">
            	<option value="1">1</option>
  				<option value="0">0</option>
  			</select>
            </div>


            <div class="form-group">
            	<label for="linea">Linea</label>

           <select  name="linea" class="form-control">
            	<option value="1">1</option>
  				<option value="0">0</option>
  			</select>
            </div>




            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection