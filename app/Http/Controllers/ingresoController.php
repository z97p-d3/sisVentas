<?php

namespace sisGoTrade\Http\Controllers;

use Illuminate\Http\Request;
use sisGoTrade\Http\Requests;
use sisGoTrade\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use sisGoTrade\Http\Requests\IngresoFormRequest;
use sisGoTrade\Ingreso;
use sisGoTrade\DetalleIngreso;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class ingresoController extends Controller {
	public

	function __construct() {
		$this->middleware( 'auth' );


	}
	public

	function index( Request $request ) {
		if ( $request ) {

			$query = trim( $request->get('searchText4') ); //para realizar busquedas
			$ingreso = DB::table( 'ingreso as i' )
			
			//especificar la tabla y realiza un select sql en peros
				->select( 'i.idingreso','i.fecha_hora', 'p.nombre', 'i.tipocomprobante', 'i.serie_comprobante', 'i.num_comprobante', 'i.impuesto', 'i.estado',
				DB::raw( 'sum(di.cantidad*di.precio_Compra) as  Total' ) )
				->join( 'persona as p', 'i.idproveedor', '=', 'p.idpersona' )
				->join( 'detalle_ingreso as di', 'i.idingreso', '=', 'di.idingreso' )
				->where('i.num_comprobante','LIKE','%' .$query. '%')
				->orwhere('estado','=','A')
				->groupBy('i.idingreso', 'i.fecha_hora', 'p.nombre', 'i.tipocomprobante', 'i.serie_comprobante', 'i.num_comprobante', 'i.impuesto', 'i.estado')
				->orderBy('i.idingreso','DESC')
				->paginate(7);
			return view ("compras.ingresos.index",["ingreso"=>$ingreso, "searchText4"=>$query]);

		}
	}
	public function create(){
		$personas=DB::table('persona')->where('tipo_persona','=', 'Proveedor')->get();
		$articulos=DB::table('articulo as art')
			->select(DB::raw('CONCAT(art.codigo, " ", art.nombre)as articulo'),'art.idarticulo')
			->where('art.estado','=','Activo')
			->get();
		return view("compras.ingresos.create", ["personas"=>$personas,"articulos"=>$articulos]);
	}
	public function store (IngresoFormRequest $request){
		try{
			DB::beginTransaction();
			$ingreso= new Ingreso;// ser refiere al modelo ingreso
			$ingreso->idproveedor=$request->get('idproveedor');
			$ingreso->tipocomprobante=$request->get('tipocomprobante');
			$ingreso->serie_comprobante=$request->get('serie_comprobante');
			$ingreso->num_comprobante=$request->get('num_comprobante');
			$mytime= Carbon::now('America/Lima');
			$ingreso->fecha_hora=$mytime->toDateTimeString();//da el modelo de la fecha
			$ingreso->impuesto='18';
			$ingreso->estado='A';
			$ingreso->save();


			$idarticulo=$request->get('idarticulo');
			$cantidad= $request->get('cantidad');
			$precio_compra=$request->get('precio_compra');
			$precio_venta=$request->get('precio_venta');

			$cont=0;
			while($cont< count($idarticulo)){
				$detalle=new DetalleIngreso();
				$detalle->idingreso=$ingreso->idingreso;
				$detalle->idarticulo=$idarticulo[$cont];
				$detalle->cantidad=$cantidad[$cont];
				$detalle->precio_compra=$precio_compra[$cont];
				$detalle->precio_venta=$precio_venta[$cont];
				$detalle->save();

				$cont=$cont+1;
			}



			
			DB::commit();
			
		}catch(Exception $e){
			DB::rollback();
		}
		return Redirect::to('compras/ingresos');
	}

	public function show($id){
		$ingreso=DB::table( 'ingreso as i' ) //especificar la tabla y realiza un select sql en perosna
				->join( 'persona as p', 'i.idproveedor', '=', 'p.idpersona' )
				->join( 'detalle_ingreso as di', ' i.idingreso', '=', 'di.idingreso' )
				->select( 'i.idingreso', 'i.fecha_hora', 'p.nombre', 'i.tipocomprobante', 'i.serie_comprobante', 'i.num_comprobante', 'i.impuesto', 'i.estado', DB::raw( 'sum(di.cantidad*precio_Compra) as  Total' ) )
				->where('i.idingreso','=', $id)
				->first();

				$detalles=DB::table('detalle_ingreso as d')
				->join('articulo as a ','d.idarticulo', '=','a.idarticulo')
				->select('a.nombre as articulo','d.cantidad','d.precio_compra','d.precio_venta')
				->where('d.idingreso','=', $id)
				->get();
				return view("compras.ingresos.show",["ingreso"=>$ingreso,"detalles"=>$detalles]);


	}
	public function destroy($id){
		$ingreso=Ingreso:: findOrFail($id);
		$ingreso->Estado='C';
		$ingreso->update();
		return Redirect::to('compras/ingresos');
	}
}