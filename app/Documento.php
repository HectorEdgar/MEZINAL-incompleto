<?php

namespace practicasUnam;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
  protected $table='documento';


   protected $primaryKey='Id_doc';
   public $timestamps=false;


	protected $fillable =[
		'titulo',
		'lugar_public_pais',
		'lugar_public_edo',
		'derecho_autor',
		'fecha_publi',
		'url',
		'investigador',
		'fecha_consulta',
		'poblacion',
		'tipo',
		'notas',
		'fecha_registro',
		'revisado',
		'linea',
		'catalogo_docu_id_cata_doc' /// *****


	]; 

	protected $guarded =[

	];

}
