<?php

namespace sisGoTrade\Http\Controllers;

use Illuminate\Http\Request;
use sisGoTrade\articulo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisGoTrade\Http\Requests\ArticuloFormRequest;
use DB;

class articuloController extends Controller
{
    public
	function __construct() {


	}
	public
	function index(Request $request) {
		if($request){
			
			$query = trim($request->get('searchText')); //para realizar busquedas
			$articulo=DB::table('articulo as a')//especificar la tabla y realiza un select sql en categoria
				->join('categoria as c','a.idcategoria','=','c.idcategoria')
				->select('a.idarticulo','a.nombre','a.codigo','a.stock','c.nombre as categoria','a.descripcion','a.imagen','a.estado')
				->where('a.nombre','LIKE','%'. $query.'%')
				->orderBy ('a.idarticulo', 'desc')
				->paginate(7);
			return view('almacen.articulo.index',["articulos"=>$articulo, "searchText"=> $query]);
			
			
		}

	}
	public
	function create() {
		$categorias=DB::table('categoria')->where('condicion','=','1')->get();
		return view("almacen.articulo.create", ["categorias"=>$categorias]);

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
