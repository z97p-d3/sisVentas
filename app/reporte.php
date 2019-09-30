<?php

namespace sisGoTrade;

use Illuminate\Database\Eloquent\Model;

class reporte extends Model
{
       protected $table ='articulo';
	protected $primaryKey='idarticulo';
	
	public $timestamps= false;
	protected $fillable=['idcategoria','codigo', 'nombre', 'stock','descripcion', 'imagen', 'estado'];
	
	protected $guarded=[];
}
