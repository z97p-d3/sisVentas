@extends ('layouts.admin')
@section ('contenido')
<div class="row">

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<h3>Listado de Articulos <a href="articulo/create"><button class="btn btn-warning">Nuevo</button></a></h3>
	@include ('almacen.articulo.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-condesed table-hover">
		<thead>
			<th>Id</th>
			<th>Nombre</th>
			<th>Codigo</th>
			<th>Categoria</th>
			<th>Stock</th>
			<th>Imagen</th>
			<th>Estado</th>
			<th>Opciones</th>
			</thead>
			@foreach ($articulo as $art)<!--revisar si esta bien las variables-->
			
			<tr>
				<td>{{ $art->idarticulo}}</td>
				<td>{{ $art->nombre}}</td>
				<td>{{ $art->codigo}}</td>
				<td>{{ $art->categoria}}</td>
				<td>{{ $art->stock}}</td>
				<td>
				<img src="{{URL::to('/imagenes/articulos/'.$art->imagen)}}" alt="{{$art->imagen}}" height="100px"	width="100px" class="img-thumbnail">			
				</td>
					<td>{{ $art->estado}}</td>
				<td>
				<a href="{{URL::action('articuloController@edit', $art->idarticulo)}}"><button class="btn btn-info">Editar</button></a>
				<a href="" data-target="#modal-delete-{{$art->idarticulo}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					
				</td>
			
			</tr>
			@include('almacen.articulo.modal')
			@endforeach
			
			
		
		</table>
		
		</div>
		{{$articulo->render()}}
	</div>

</div>
@endsection