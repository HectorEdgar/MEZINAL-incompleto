{!! Form::open(array('url'=>'institucion','method'=>'GET', 'autocomplete'=>'off','role'=>'search'))!!}
<div class="form-group">
    <div class="input-group">
        <input type="text" name="searchText" class="form-control" placeholder="Buscar..." value="{{$searchText}}">
        <span class="input-group-btn">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </span>
    </div>
</div>



<input type="text" id="text">
<div id="basics" class="form-control"></div>
<br>


<script>
$( "#text" ).keypress(function() {
	search_data($( "#text" ).val());
});

function search_data(search_value) {
    $.ajax({
        url: '/institucion?searchText=' + search_value,
        method: 'GET'
    }).done(function(response){
    	alert(response);
        $('#basics').html(response); // put the returning html in the 'results' div
    });
}


</script>


{{Form::close()}}