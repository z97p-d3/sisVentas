@extends( 'layouts.admin' )
@section( 'contenido' )
	<div class="row">

		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Reportes </h3>

		</div>
	</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		
		<script src="{{'https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js'}}" charset="utf-8"></script>
		
		
		{!! $chart_uno->html() !!} 
		
		
		{!! $chart_dos->html() !!} 
		{!! $chart_tres->html() !!} 
		
	


	</div>
{!! Charts::scripts() !!} 
	{!! $chart_uno->script() !!} 
	{!! $chart_dos->script() !!} 
	{!! $chart_tres->script() !!} 

</div>
@endsection