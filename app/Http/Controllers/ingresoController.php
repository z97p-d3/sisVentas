<?php

namespace sisGoTrade\ Http\ Controllers;

use Illuminate\ Http\ Request;
use sisGoTrade\ Http\ Requests;
use sisGoTrade\ Support\ Facades\ Input;
use Illuminate\ Support\ Facades\ Redirect;
use sisGoTrade\ Http\ requests\ IngresoFormRequest;
use sisGoTrade\ Ingreso;
use sisGoTrade\ DetalleIngreso;
use DB;

use Carbon\ Carbon;
use response;
use Illuminate\ Support\ Collection;

class ingresoController extends Controller {
	public

	function __construct() {
		$this->middleware( 'auth' );


	}
	public

	function index( Request $request ) {
		if ( $request ) {

			$query = trim( $request->get( 'searchText' ) ); //para realizar busquedas
			$ingreso = DB::table( 'ingreso as i' ) //especificar la tabla y realiza un select sql en perosna
				->join( 'persona as p', 'i.idproveedor', '=', 'p.idpersona' )->join( 'detalle_ingreso as di', ' i.idingreso', '=', 'di.idingreso' )
				->select( 'i.idingreso', 'i.fecha_hora', 'p.nombre', 'i.tipo_comprobante', 'i.serie_comprobante', 'i.num_comprobante', 'i.impuesto', 'i.estado', DB::raw( 'sum(di.cantidad*precio_Compra) as  Total' ) )
				->where('i.num_comprobante','LIKE','%' .$query. '%')
				->orderBy('i.idingreso','desc')
				->groupBy('i.idingreso', 'i.fecha_hora', 'p.nombre', 'i.tipo_comprobante', 'i.serie_comprobante', 'i.num_comprobante', 'i.impuesto', 'i.estado')
				->pagiante(7);
			return view ("compras.ingreso.index",["ingreso"=>$ingreso, "searcchText"=>$query]);

		}
	}
	public function create(){
		$personas=DB::table('persona')->where('tipo_persona','=', 'Proveedor')->get();
		$articulos=BD::table('articulos as art')
			->select(DB::raw('CONCAT(art.codigo, " ", art.nombre)as articulo'),'art.idarticulo')
			->where('art.estado','=','Activo')
			->get();
		return view("compras.ingreso.create", ["personas"=>$personas,"articulos"=>$articulos]);
	}
	public function store (IngresoFormRequest $request){
		try{
			DB::beginTransaction();
			
			DB::commit();
			
		}catch(\Exception $e){
			DB:rollback();
		}
	}
}