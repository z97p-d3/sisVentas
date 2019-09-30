<?php

namespace sisGoTrade\Http\Controllers;

use Illuminate\Http\Request;
use sisGoTrade\articulo;
use sisGoTrade\reporte;
use Illuminate\Support\Facades\Redirect;
use sisGoTrade\Http\Requests\articuloFormRequest;
use DB;

class reporteController extends Controller
{
       /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
public
	function index(Request $request) 
    {
		
			if($request){
			
			$articulo=DB::table('articulo as a')//especificar la tabla y realiza un select sql en categoria
				->join('categoria as c','a.idcategoria','=','c.idcategoria')
				->select('a.nombre','a.stock');
		
				
			return view('almacen.reporte.home',['articulo'=>$articulo]);
			
			
		}
      
    }
}
