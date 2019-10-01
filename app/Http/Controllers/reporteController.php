<?php

namespace sisGoTrade\ Http\ Controllers;

use Illuminate\ Http\ Request;
use sisGoTrade\ reporte;
use sisGoTrade\ articulo;
use Illuminate\ Support\ Facades\ Redirect;

use Charts;
use DB;



class reporteController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public

	function __construct() {
		$this->middleware( 'auth' );
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public

	function index() {


		$chart_uno = Charts::database( reporte::all(), 'bar', 'highcharts' )->Title( 'Nuevos Usuarios registrados por Mes' )->elementLabel( "Total de Usuarios" )

		->dimensions( 1000, 500 )->responsive( true )->GroupByMonth( '2019', '08', true );


	

			$chart_dos = Charts::database( articulo::all(), 'area', 'highcharts' )->Title( 'Articulos' )->elementLabel( "Listado de Articulos")
				->groupBy( 'nombre' )

			->dimensions( 1000, 500 )->responsive( true );


			$users = reporte::where( DB::raw( "(DATE_FORMAT(created_at,'%Y'))" ), date( 'Y' ) )->get(); 
		
		$chart_tres = Charts::database( $users, 'donut', 'highcharts' )->title( "Registro de usuarios por mes" )->elementLabel( "Total de Usuarios" )->dimensions( 1000, 500 )->responsive( true )->groupByMonth( date( 'Y' ), true );




			return view( 'almacen.reporte.home', compact( 'chart_uno', 'chart_dos', 'chart_tres' ) );

		}







	}