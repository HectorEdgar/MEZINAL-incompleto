<?php

namespace practicasUnam;

use Illuminate\Database\Eloquent\Model;

class Editor extends Model
{
	protected $table='editor';
	
	protected $primaryKey="id_editor";
	public $timestamps=false;


	protected $fillable =[
		'editor'
	]; 

	protected $guarded =[

	];
    //
}
