{!!Form::Open( array( 'url' => 'compras/proveedor', 'method' => 'GET', 'autocomplete' => 'off', 'role' => 'search'))!!}
<div class="Form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="searchText3" placeholder="Buscar.." value="{{$searchText3}}">
		<span class="input-group-btn">
		<button type="submit" class=" btn btn-primary">Buscar</button>
		</span>
	</div>
</div>
{!!Form::close()!!}