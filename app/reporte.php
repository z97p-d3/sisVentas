<?php

namespace sisGoTrade;

use Illuminate\Database\Eloquent\Model;

class reporte extends Model
{
       protected $table ='users';
	protected $primaryKey='id';
	
	public $timestamps= false;
	protected $fillable=['name','email', 'password', 'remember_token','create_at', 'update_at'];
	
	protected $guarded=[];
}
