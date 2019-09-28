<?php

namespace sisGoTrade;

use Illuminate\Database\Eloquent\Model;
use sisGoTrade\articulo;
use Illuminate\Support\Facades\Redirect;
use sisGoTrade\Http\Requests\CategoriaFormRequest;
use DB;


class articulo extends Model
{
   protected $table ='articulo';
	protected $primaryKey='idarticulo';
	
	public $timestamps= false;
	protected $fillable=['idcategoria','codigo', 'nombre', 'stock','descripcion', 'imagen', 'estado'];
	
	protected $guarded=[];
	
}
