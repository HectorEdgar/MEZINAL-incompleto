<?php

namespace practicasUnam;

use Illuminate\Database\Eloquent\Model;

class Ponencia extends Model
{
   protected $table='ponencias';


   protected $primaryKey='fk_doc';
   public $timestamps=false;


	protected $fillable =[
		'evento',
		'lugar_presentacion',
		'fecha_pesentacion',
		'paginas'


	]; 

	protected $guarded =[

	];


}
