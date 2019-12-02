<?php

namespace sisGoTrade\Http\Controllers;

use Illuminate\Http\Request;
use sisGoTrade\Http\Requests;
use sisGoTrade\Persona;
use Illuminate\Support\Facades\Redirect;
use sisGoTrade\Http\Requests\ProveedorFormRequest;
use sisGoTrade\Http\Requests\PersonaFormRequest;
use DB;

class proveedorController extends Controller
{
     public
	function __construct() {
		$this->middleware('auth');


	}
	public
	function index(Request $request) {
		if($request){
			
			$query = trim($request->get('searchText3')); //para realizar busquedas
			$persona=DB::table('persona')//especificar la tabla y realiza un select sql en perosna
				->where('nombre','LIKE','%'. $query.'%')
				->where('tipo_persona','=','Proveedor')
				->orwhere ('num_documento','LIKE','%'. $query.'%')
				->where ('tipo_persona','=','Prooverdor')
				->orderBy ('idpersona', 'desc')
				->paginate(7);
			return view('compras.proveedor.index',["persona"=>$persona, "searchText3"=> $query]);
			
		}

	}
	public
	function create() {
		return view ("compras.proveedor.create");

	}
	public
	function store(PersonaFormRequest $request) {
		$persona = new Persona; //el modelo
		$persona->tipo_persona='Proveedor';
		$persona->nombre=$request->get('nombre');
		$persona->direccion=$request->get('direccion');
		$persona->telefono=$request->get('telefono');
		$persona->email=$request->get('email');
		$persona->tipo_documento=$request->get('tipo_documento');
		$persona->num_documento=$request->get('num_documento');
		
		$persona->save();
		return Redirect::to('compras/proveedor');
		
		
		
		
	}
	public
	function show($id) {
		return view ("compras.proveedor.show",["persona"=>Persona::findOrFail($id)]);
	}

	public
	function edit($id) {
		return view ("compras.proveedor.edit",["persona"=>Persona::findOrFail($id)]);
		
		
	}
	public
	function update(PersonaFormRequest $request,$id) {
		$persona =Persona::findOrFail($id);
		$persona->nombre=$request->get('nombre');
		$persona->direccion=$request->get('direccion');
		$persona->telefono=$request->get('telefono');
		$persona->email=$request->get('email');
		$persona->tipo_documento=$request->get('tipo_documento');
		$persona->num_documento=$request->get('num_documento');
		$persona->update();
		return Redirect::to('compras/proveedor');
		
			
		
		
	}
	public
	function destroy($id) {
		$persona =Persona::findOrFail($id);
		$persona->tipo_persona='Inactivo';
		$persona->update();
		return Redirect::to('compras/proveedor');
		
	}
}
