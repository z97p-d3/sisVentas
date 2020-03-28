{!!Form::Open( array( 'url' => 'compras/ingresos', 'method' => 'GET', 'autocomplete' => 'off', 'role' => 'search'))!!}
<div class="Form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="searchText4" placeholder="Buscar.." value="{{$searchText4}}">
		<span class="input-group-btn">
		<button type="submit" class=" btn btn-primary">Buscar</button>
		</span>
	</div>
</div>
{!!Form::close()!!}