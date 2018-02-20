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
            	<option value="1">Si</option>
  				<option value="0">No</option>
  			</select>
            </div>
			

			<div class="card w-90">
			<h6 class="card-header">Fecha Publicación</h6>
  			<div class="card-body">
            <div class="form-group">
				<div class="form-check">
  					<input class="form-check-input fechaNormal" type="radio" name="fecha_publi" value="1" checked="checked">
					  
					<label class="form-check-label" for="fecha_publi">
						Fecha de publicación Normal
					</label>
					<br/>
					<p id="inFechaNormal"><input type="date"  placeholder="Fecha de publicación" name="fechaNormalValor" id="fechaNormalValor" /></p>
				</div>
				<br/>
				<div class="form-check">
  					<input class="form-check-input fechaNormal" type="radio"  name="fecha_publi" value="2" >
					<label class="form-check-label" for="fecha_publi">
						Fecha de publicación por Período 
					</label>
					
						<div class="form-row"  id="inFechaExtra" >
    						<div class="form-group col-md-3">

      							<label for="fechaExtraMes">Del mes</label>
      							<select id="fechaExtraMes" class="form-control" name="fechaExtraMes">
								  @foreach ($mesesFecha as $value)

           	 					<option value="{{ $value }}" >{{$value}}</option>
									
									@endforeach
        				

      							</select>
    						</div>

							<div class="form-row"  >
    						<div class="form-group col-md-4">
      							<label for="fechaExtraAlMes">Al mes </label>
      							<select id="fechaExtraAlMes" class="form-control" name="fechaExtraAlMes">
								  @foreach ($mesesFecha as $value)

           	 					<option value="{{ $value }}" >{{$value}}</option>
									
									@endforeach
        						
      							</select>
    						</div>

    						<div class="form-group col-md-3" >
      							<label for="fechaExtraAño">Año</label>
								<input type="number" class="form-control" id="fechaExtraAño" min="1600" name="fechaExtraAño">
							</div>
						</div>
					
					
				

				</div>
            </div>
			</div>
			</div>
			</div>

            <div class="form-group">
            	<label for="url">Url</label>
            	<input type="text" name="url" class="form-control" placeholder="url">
            </div>

            

            

            <div class="form-group">
            	<label for="fecha_consulta">Fecha consulta</label>
            	<input type="date" name="fecha_consulta" class="form-control" placeholder="Fecha consulta">
            </div>

            <div class="form-group">
            	<label for="poblacion">Población</label>

				<select  name="poblacion" class="form-control">
           	 

           	 		<option value="0" >Ninguno</option>
					<option value="1" >Afrodescendiente</option>
					<option value="2" >Indígena</option>
					<option value="3" >Ambos</option>

            

  			</select>
            	
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
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>

	<script type="text/javascript">
	 

	$(document).ready(function(){
		$("#inFechaExtra").hide();
		  
        $(".fechaNormal").click(function(evento){
          
            var valor = $(this).val();
          
            if(valor == 1){
                $("#inFechaNormal").show();
                $("#inFechaExtra").hide();
				$("#fechaExtraAño").prop('required',false);

            }else{
                $("#inFechaNormal").hide();
                $("#inFechaExtra").show();
				$("#fechaExtraAño").prop('required',true);
            }
    });
});

      
	</script>

@endsection