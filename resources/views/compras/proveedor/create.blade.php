@extends( 'layouts.admin' )
@section( 'contenido' )
	<div class="row">

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Proveedor</h3> @if (count ($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error}}</li>
					@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div> 
	{!!Form::open( array( 'url' => 'compras/proveedor', 'method' => 'POST', 'autocomplete' => 'off' ) ) !!}{{Form::token()}}
<div class="row">
	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" class="form-control" placeholder="Nombre..." required value="{{old('nombre')}}">

		</div>
	</div>
	
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">Direccion</label>
			<input type="text" name="direccion" class="form-control" placeholder="Direccion..." required value="{{old('direccion')}}">

		</div>
	</div>
	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<div class="form-group">
			<label>Documento</label>
			<select name="tipo_documento" class="form-control">
				<option value="DNI">DNI</option>
				<option value="RUC">RUC</option>
				<option value="PAS">PAS</option>
			
				
				
			</select>
		
		</div>


	</div>
	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

		<div class="form-group">
			<label for="codigo">Numero de documento</label>
			<input type="text" name="num_documento" class="form-control" placeholder="Numero de documento..." required value="{{old('num_documento')}}">


		</div>

	</div>

	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

		<div class="form-group">
			<label for="stock">Telefono</label>
			<input type="text" name="telefono" class="form-control" placeholder="telefono..." required value="{{old('telefono')}}">
		</div>

	</div>
	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<div class="form-group">
			<label for="email">email</label>
			<input type="email" name="email" class="form-control" placeholder="email..." value="{{old('email')}}">
		</div>
	</div>

</div>



<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
	<div class="form-group">

		<button class="btn btn-primary" type="submit">Guardar</button>
		<button  class="btn btn-danger" type="reset">Cancelar</button>

	</div>
</div>


{!!Form::close()!!}
@endsection