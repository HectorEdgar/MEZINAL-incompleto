{!! Form::open(array('url'=>'institucion','method'=>'GET', 'autocomplete'=>'off','role'=>'search'))!!}
<div class="form-group">
    <div class="input-group">
        <input type="text" name="searchText" class="form-control" placeholder="Buscar..." value="{{$searchText}}">
        <span class="input-group-btn">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </span>
    </div>
</div>



<input id="provider-json" type="text">
<br>

<script>
$( "#provider-json" ).keypress(function() {
	search_data($( "#provider-json" ).val());
});

function search_data(search_value) {
    $.ajax({
        url: '/institucion?json=1&searchText=' + search_value,
        method: 'GET'
    }).done(function(response){

    	//alert(response);
    	var options = {
			data: response
			//getValue:"{"
			
		};
		

		
    	
    
	$("#provider-json").easyAutocomplete(options);
  
 	});
}
</script>
{{Form::close()}}