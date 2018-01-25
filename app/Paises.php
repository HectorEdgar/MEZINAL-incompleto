<?php

namespace practicasUnam;

use Illuminate\Database\Eloquent\Model;

class Paises extends Model
{
    //protected $table='editor';
	protected $primaryKey="id_pais";
	public $timestamps=false;


	protected $fillable =[
		'nombre'
	]; 

	protected $guarded =[

	];
}
