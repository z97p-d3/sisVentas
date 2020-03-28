@extends ('layouts.admin')
@section ('contenido')
<div class="row">

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<h3>Listado de Ingresos<a href="ingresos/create"><button class="btn btn-warning">Nuevo</button></a></h3>
	@include ('compras.ingresos.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-condesed table-hover">
		<thead>
		
			<th>Fecha</th>
			<th>Provedor</th>
			<th>Comprobante</th>
			<th>Impuesto</th>
			<th>Total</th>
			<th>Estado</th>
			<th>Opciones</th>
			
			</thead>
			@foreach ($ingreso as $ing)<!--revisar si esta bien las variables-->
			
			<tr>
			
				<td>{{ $ing->fecha_hora}}</td>
				<td>{{ $ing->nombre}}</td>
				<td>{{ $ing->tipocomprobante. ':'.$ing->serie_comprobante.':'.$ing->num_comprobante}}</td>
			
				<td>{{ $ing->impuesto}}</td>
				<td>{{ $ing->Total}}</td>
				<td>{{ $ing->estado}}</td>
				
				
				

				<td>
				<a href="{{URL::action('ingresoController@show', $ing->idingreso)}}"><button class="btn btn-primary">Detalles</button></a>
				<a href="" data-target="#modal-delete-{{$ing->idingreso}}" data-toggle="modal"><button class="btn btn-danger">Anular Ingreso</button></a>
					
				</td>
			
			</tr>
			@include('compras.ingresos.modal')
			@endforeach
			
			
		
		</table>
		
		</div>
		{{$ingreso->render()}}
	</div>

</div>
@endsection