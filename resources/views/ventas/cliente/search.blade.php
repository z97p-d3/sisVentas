{!!Form::Open( array( 'url' => 'ventas/cliente', 'method' => 'GET', 'autocomplete' => 'off', 'role' => 'search'))!!}
<div class="Form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="searchText2" placeholder="Buscar.." value="{{$searchText2}}">
		<span class="input-group-btn">
		<button type="submit" class=" btn btn-primary">Buscar</button>
		</span>
	</div>
</div>
{!!Form::close()!!}