<?php

namespace practicasUnam;

use Illuminate\Database\Eloquent\Model;

class FechaNormal extends Model
{
    protected $table='fecha';
	
	protected $primaryKey=null;
	public $timestamps=false;


	protected $fillable =[
		'fecha',
		'id_fx'
	]; 

	const UPDATED_AT = null;

    public function setUpdatedAt($value)
    {
        return $this;
	}
	public $incrementing = false;

	protected $guarded =[

	];
    //
}
