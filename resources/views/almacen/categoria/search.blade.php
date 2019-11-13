{!!Form::Open( array( 'url' => 'almacen/categoria', 'method' => 'GET', 'autocomplete' => 'off', 'role' => 'search'))!!}
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="Form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="searchText" placeholder="Buscar.." value="{{$searchText}}">
		<span class="input-group-btn ">
		<button type="submit" class=" btn btn-primary">Buscar</button>
		</span>
	</div>
</div>
</div>
{!!Form::close()!!}