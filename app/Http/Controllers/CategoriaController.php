<?php

namespace sisGoTrade\Http\Controllers;

use Illuminate\Http\Request;

use sisGoTrade\Http\Requests;
use sisGoTrade\Categoria;
use Illuminate\Support\Facades\Redirect;
use sisGoTrade\Http\Requests\CategoriaFormRequest;
use DB;

class CategoriaController extends Controller {
	public
	function __construct() {
		$this->middleware('auth');


	}
	public
	function index(Request $request) {
		if($request){
			
			$query = trim($request->get('searchText')); //para realizar busquedas
			$categorias=DB::table('categoria')//especificar la tabla y realiza un select sql en categoria
				->where('nombre','LIKE','%'. $query.'%')
				->orwhere('idcategoria','LIKE','%'. $query.'%')
				->where ('condicion','=', '1')
				->orderBy ('idcategoria', 'desc')
				->paginate(7);
			return view('almacen.categoria.index',["categorias"=>$categorias, "searchText"=> $query]);
			
		}

	}
	public
	function create() {
		return view ("almacen.categoria.create");

	}
	public
	function store(CategoriaFormRequest $request) {
		$categoria = new Categoria; //el modelo
		$categoria->nombre=$request->get('nombre');
		$categoria->descripcion=$request->get('descripcion');
		$categoria->condicion='1';
		$categoria->save();
		return Redirect::to('almacen/categoria');
		
		
		
		
	}
	public
	function show($id) {
		return view ("almacen.categoria.show",["categoria"=>Categoria::findOrFail($id)]);
	}

	public
	function edit($id) {
		return view ("almacen.categoria.edit",["categoria"=>Categoria::findOrFail($id)]);
		
		
	}
	public
	function update(CategoriaFormRequest $request,$id) {
		$categoria =Categoria::findOrFail($id);
		$categoria->nombre=$request->get('nombre');
		$categoria->descripcion=$request->get('descripcion');
		$categoria->update();
		return Redirect::to('almacen/categoria');
		
			
		
		
	}
	public
	function destroy($id) {
		$categoria=Categoria::findOrFail($id);
		$categoria->condicion='0';
		$categoria->delete();
		return Redirect::to('almacen/categoria');
		
	}
}