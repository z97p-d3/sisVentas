<?php

namespace sisGoTrade;

use Illuminate\Database\Eloquent\Model;

class ingreso extends Model
{   
	protected $table ='ingreso';
	protected $primaryKey='idingreso';
	
	public $timestamps= false;
	protected $fillable=['idproveedor', 'tipocomprobante', 'serie_comprobante','num_comprobante','fecha_hora','impuesto', 'estado'];
	
	protected $guarded=[];
}
