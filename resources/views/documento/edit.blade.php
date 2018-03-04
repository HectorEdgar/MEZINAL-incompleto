@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Documento: {{ $documento->titulo}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($documento,['method'=>'PATCH','route'=>['documento.update',$documento->Id_doc]])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="titulo">Titulo documento</label>
            	<input type="text" name="titulo" class="form-control" placeholder="Titulo" value="{{$documento->titulo}}"/>
            </div>

            <div class="form-group">
            	<label for="lugar_public_pais">País publicación</label>
            	<input type="text" name="lugar_public_pais" class="form-control" placeholder="País publicación" value="{{$documento->lugar_public_pais}}"/>
            </div>

            <div class="form-group">
            	<label for="lugar_public_edo">Estado publicación </label>
            	<input type="text" name="lugar_public_edo" class="form-control" placeholder="Estado publicación " value="{{$documento->lugar_public_edo}}"/ >
            </div>

            <div class="form-group">
            	<label for="derecho_autor">Derechos autor</label>

           <select  name="derecho_autor" class="form-control">

		   @if($documento->derecho_autor==1){

			   <option value="1" selected>Si</option>
  				<option value="0">No</option>


		   }@else{
			    <option value="1">Si</option>
  				<option value="0" selected>No</option>

		   }
		   @endif
            	
  			</select>
            </div>

			<div class="card w-90">
			<h6 class="card-header">Fecha Publicación</h6>
  			<div class="card-body">
            <div class="form-group">
				<div class="form-check">

				@if($documento->fecha_publi==1)
					<input class="form-check-input fechaNormal" type="radio" name="fecha_publi" value="1" checked="checked">
					@else

					<input class="form-check-input fechaNormal" type="radio" name="fecha_publi" value="1" >

					@endif

					  
					<label class="form-check-label" for="fecha_publi">
						Fecha de publicación Normal
					</label>
					<br/>
					<p id="inFechaNormal">
					<input type="date" placeholder="Fecha de publicación" name="fechaNormalValor" id="fechaNormalValor" value="{{$fecha}}"/>
					
					</p>


				


				
  					
				</div>
				<br/>
				
				<div class="form-check">

				@if($documento->fecha_publi==2)
				
				<input class="form-check-input fechaNormal" type="radio"  name="fecha_publi" value="2"  checked="checked">

				@else
				<input class="form-check-input fechaNormal" type="radio"  name="fecha_publi" value="2"  >

				@endif
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
								    @if(is_null($fechaExtra))
									<input type="number" class="form-control" id="fechaExtraAño" min="1600" name="fechaExtraAño"/>
									
									@else 
									<input type="number" class="form-control" id="fechaExtraAño" min="1600" name="fechaExtraAño" value="{{$fechaExtra}}"/>

								@endif
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

	$("#fechaExtraAlMes").val("val2");
	$("#fechaExtraMes").val("val2");

	


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