<?php

namespace practicasUnam;

use Illuminate\Database\Eloquent\Model;

class CatalogoDocumento extends Model
{
   protected $table='catalogo_docu';


   protected $primaryKey='id_cata_doc';
   public $timestamps=false;


	protected $fillable =[
		'tipo_doc'


	]; 

	protected $guarded =[

	];

}
