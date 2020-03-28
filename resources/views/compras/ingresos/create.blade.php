@extends( 'layouts.admin' )
@section( 'contenido' )
	<div class="row">

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Ingreso</h3> @if (count ($errors)>0)
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
	{!!Form::open( array( 'url' => 'compras/ingresos', 'method' => 'POST', 'autocomplete' => 'off' ) ) !!}{{Form::token()}}
<div class="row">
	<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
		<div class="form-group">
			<label for="proveedor">Proveedor</label>
			<select name="idproveedor" id="idproveedor" class="form-control">
			@foreach ($personas as $persona)
			<option value="{{$persona->idpersona}}">{{$persona->nombre}}</option>
			@endforeach
			</select>
		</div>
	</div>
		<div class="col-xl-4 col-sm-4 col-md-4 col-xs-12">
		<div class="form-group">
			<label >Tipo comprobante</label>
			<select name="tipocomprobante" id="" class="form-control">
		
		
				
				<option value="Boleta">Boleta</option>

				<option value="Factura">Factura</option>
				<option value="Ticket">Ticket</option>
			
			</select>
		</div>
	</div>
	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
		<div class="form-group">
			<label for="serie_comprobante">Serie Comprobante</label>
			<input type="text" value="{{old('serie_comprobante')}}" name="serie_comprobante" class="form-control" placeholder="Serie Comprobante..">
		</div>
	</div>
		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
			<div class="form-group">
				<label for="num_comprobante">Numero Comprobante</label>
				<input type="text" value="{{old('num_comprobante')}}" required name="num_comprobante" class="form-control" placeholder="Numero  Comprobante..">
			</div>
		</div>
</div>
<div class="card">
	<div class="card-body">
	<div class="row">
		<div class="col-xl-4 col-lg-4 col-sm-12 col-md-12 col-xs-12">
						<div class="form-group">
							<label for="">Ariculos</label>
							<select name="pidarticulo" id="pidarticulo" class="form-control">
								@foreach ($articulos as $articulo)
							<option value="$articulo->idarticulo">{{$articulo->articulo}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-lg-2  col-xs-12 col-md-2">
						<div class="form-group">
							<label for="Cantidad">Cantidad:</label>
							<input type="number" value="" class="form-control" id="pcantidad" name="pcantidad" placeholder="Cantidad">
						</div>
					</div>
					<div class="col-lg-2  col-xs-12 col-md-2">
						<div class="form-group">
							<label for="precio-compra">Precio Compra:</label>
							<input type="number" value="" class="form-control" id="pprecio_compra" name="pprecio_compra" placeholder="Precio de compra">
						</div>
					</div>
					<div class="col-lg-2 s col-xs-12 col-md-2">
						<div class="form-group">
							<label for="precio-venta">Precio Venta:</label>
							<input type="number" value="" class="form-control" id="pprecio_venta" name="pprecio_venta" placeholder="Precio de venta">
						</div>
					</div>
					<div class="col-lg-2 s col-xs-12 col-md-2">
						<div class="form-group">
						<button type="button" class="btn btn-primary" id="bt_add">Agregar</button>
						</div>
					</div>
					<div class="col-xl-12 col-lg-12 col-sm-12 col-md-12 col-xs-12">
						<table id="detalles" class="table table-hover table dark shadow">
							<thead>
							  <tr>
								<th scope="col">Opciones</th>
								<th scope="col">Articulo</th>
								<th scope="col">Cantidad</th>
								<th scope="col">Precio Compra</th>
								<th scope="col">Precio Venta</th>
								<th scope="col">SubTotal</th>
								
								
							  </tr>
							</thead>
							<tfoot>
								<th>Total</th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th><h4 id="total">S/. 0.0.0</h4></th>


							</tfoot>
							<tbody>
							
							</tbody>
						  </table>


					</div>
				</div>
			</div>
		</div>
	</div>		
</div>

<div class="row">
	<div class="col-lg-4 col-sm-6 col-md-6 col-xs-12 m-3" id="guardar">
		<div class="form-group">
		<input name="_token" value="{{csrf_token()}}" type="hidden">
			<button class="btn btn-primary" type="submit">Guardar</button>
			<button  class="btn btn-danger" type="reset">Cancelar</button>
		</div>
	</div>
</div>
		

		
		



	


{!!Form::close()!!}

@push('script')

<script>
	$(document).ready(function(){
		$("#bt_add").click(function(){
			agregar();
		})
	})

	var cont=0;

	total=0
	subtotal=[];
	$("#guardar").hide();

	function agregar(){
		idarticulo=$("#pidarticulo").val();
		articulo=$("#pidarticulo option:selected").text();
		cantidad=$("#pcantidad").val();
		precio_compra=$("#pprecio_compra").val();
		precio_venta=$("#pprecio_venta").val();

		if(idarticulo!= ""&& cantidad!="" && cantidad>0 && precio_compra!="" && precio_venta!=""){
			subtotal[cont]=(cantidad*precio_compra)
			total=total+subtotal[cont]
			var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" onclick="eliminar('+cont+');"  class="btn btn-warning" >X</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="precio_compra[]" value="'+precio_compra+'"></td><td><input type="number" name="precio_venta[]" value="'+precio_venta+'"></td><td>'+subtotal[cont]+'</td></tr>'
		 cont++;
		 limpiar();
		 $("#total").html("S/. " +total);
		 evaluar();
		 $("#detalles").append(fila);
		}else{
			alert("Error al ingresar el detalle del ingreso revise los detalles del articulo")

		}

	}
function limpiar(){
	$("#pcantidad").val("");
	$("#pprecio_compra").val("");
	$("#pprecio_venta").val("");
}

function evaluar(){
	if(total>0){
		$("#guardar").show();
	}else{
		$("#guardar").hide();
	}
}
function eliminar(index){
	total=total-subtotal[index];
	$("#total").html("S/. "+ total);
	$("#fila" + index).remove();
	evaluar();
}


</script>

@endpush
@endsection