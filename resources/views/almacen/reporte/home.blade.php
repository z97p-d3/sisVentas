@extends( 'layouts.admin' )
@section( 'contenido' )

<div class="row">
	<div class="col-md-6">
		<label>Año</label>
		<select class="form-control" id="anio_sel" onchange="cambiar_fecha_grafica();">


			<option value="2015">2015</option>
			<option value="2016">2016</option>
			<option value="2017">2017</option>
			<option value="2018">2018</option>
			<option value="2019">2019</option>
		</select>

	</div>


	<div class="col-md-6">
		<label>Mes</label>
		<select class="form-control" id="mes_sel" onchange="cambiar_fecha_grafica();">

			<option value="1">ENERO</option>
			<option value="2">FEBRERO</option>
			<option value="3">MARZO</option>
			<option value="4">ABRIL</option>
			<option value="5">MAYO</option>
			<option value="6">JUNIO</option>
			<option value="7">JULIO</option>
			<option value="8">AGOSTO</option>
			<option value="9">SEPTIEMBRE</option>
			<option value="10">OCTUBRE</option>
			<option value="11">NOVIEMBRE</option>
			<option value="12">DICIEMBRE</option>

		</select>

	</div>
</div>


<div class="row">

	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reportes </h3>

	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

		<div id="container1"></div>
		
		


		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/variable-pie.js"></script>
		<script src="https://code.highcharts.com/modules/exporting.js"></script>
		<script src="https://code.highcharts.com/modules/export-data.js"></script>
		<script src="https://code.highcharts.com/modules/accessibility.js"></script>


		{!! $chart_uno->html() !!} {!! $chart_dos->html() !!} {!! $chart_tres->html() !!}




	</div>
	{!! Charts::scripts() !!} {!! $chart_uno->script() !!} {!! $chart_dos->script() !!} {!! $chart_tres->script() !!}

</div>
@endsection