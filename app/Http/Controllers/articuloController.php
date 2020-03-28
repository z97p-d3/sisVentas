<?php

namespace sisGoTrade\Http\Controllers;

use Illuminate\Http\Request;
use sisGoTrade\articulo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Image;
use sisGoTrade\Http\Requests\articuloFormRequest;
use DB;

class articuloController extends Controller {
	public

	function __construct() {
		$this->middleware( 'auth' );


	}
	public

	function index( Request $request ) {
		if ( $request ) {

			$query = trim( $request->get( 'searchText1' ) ); //para realizar busquedas
			$articulo = DB::table( 'articulo as a' ) //especificar la tabla y realiza un select sql en categoria
				->join( 'categoria as c', 'a.idcategoria', '=', 'c.idcategoria' )->select( 'a.idarticulo', 'a.nombre', 'a.codigo', 'a.stock', 'c.nombre as categoria', 'a.descripcion', 'a.imagen', 'a.estado' )->where( 'a.nombre', 'LIKE', '%' . $query . '%' ) //filtrar contenido
				->orwhere( 'a.codigo', 'LIKE', '%' . $query . '%' ) //filtrar contenido
				->orderBy( 'a.idarticulo', 'desc' )->paginate( 7 ); // pagina los articulos
			return view( 'almacen.articulo.index', [ "articulo" => $articulo, "searchText1" => $query ] );


		}

	}
	public

	function create() {
		$categoria = DB::table( 'categoria' )->where( 'condicion', '=', '1' )->get();
		return view( "almacen.articulo.create", [ "categoria" => $categoria ] );

	}
	public

	function store( articuloFormRequest $request ) {
		$articulo = new articulo; //el modelo
		$articulo->idcategoria = $request->get( 'idcategoria' );
		$articulo->codigo = $request->get( 'codigo' );
		$articulo->nombre = $request->get( 'nombre' );
		$articulo->stock = $request->get( 'stock' );
		if ( $request->hasFile( 'imagen' ) ) {
			$avatar = $request->file( 'imagen' );
			$filename = time() . '.' . $avatar->getClientOriginalExtension();
			Image::make( $avatar )->resize( 300, 300 )->save( public_path( 'imagenes/articulos/' . $filename ) );

			$articulo->imagen = $filename;
			$articulo->save();
		}

		$articulo->descripcion = $request->get( 'descripcion' );
		$articulo->estado = 'activo';
		/*		if($request->hasFile('imagen')){
					$articulo->imagen= $request->file('imagen')->store('public');
					
			
				}*/
		$articulo->save();

		return Redirect::to( 'almacen/articulo' );




	}
	public

	function show( $id ) {

		return view( "almacen.articulo.show", [ "articulo" => articulo::findOrFail( $id ) ] );
	}

	public

	function edit( $id ) {
		$articulo = articulo::findOrFail( $id );
		$categorias = DB::table( 'categoria' )->where( 'condicion', '=', '1' )->get();
		return view( "almacen.articulo.edit", [ "articulo" => $articulo, "categoria" => $categorias ] );


	}
	public

	function update( articuloFormRequest $request, $id ) {

		$articulo = articulo::findOrFail( $id );
		$articulo->idcategoria = $request->get( 'idcategoria' );
		$articulo->codigo = $request->get( 'codigo' );
		$articulo->nombre = $request->get( 'nombre' );
		$articulo->stock = $request->get( 'stock' );

		//cargar imagen
		if ( $request->hasFile( 'imagen' ) ) {
			$avatar = $request->file( 'imagen' );
			$filename = time() . '.' . $avatar->getClientOriginalExtension();
			Image::make( $avatar )->resize( 300, 300 )->save( public_path( 'imagenes/articulos/' . $filename ) );
			$articulo->imagen = $filename;
			$articulo->save();
		}
		$articulo->descripcion = $request->get( 'descripcion' );
		$articulo->estado = 'activo';
		$articulo->update();
		return Redirect::to( 'almacen/articulo' );




	}
	public

	function destroy( $id ) {
		$articulo = articulo::findOrFail( $id );
		$articulo->estado = 'Inactivo';
		$articulo->update();
		return Redirect::to( 'almacen/articulo' );

	}
}