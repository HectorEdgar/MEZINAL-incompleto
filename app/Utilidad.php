<?php

namespace practicasUnam;

use DB;

class Utilidad
{

    private static function getMaxId($nombreTabla,$nombreId)
    {
        $query = DB::table($nombreTabla)->max($nombreId);
        return $query;
    }
    //Devuelve el id que le corresponde una nueva inserción dependiendo si hay huecos en la serie de id´s 
    //si hay huecos devuelve el id correspondiente al hueco ordenado de menor a mayor y si no devuelve el id mayor + 1 :´v
    //Id 100% real No FAKE!!
    public static function getId($nombreTabla, $nombreId)
    {
        $maxId=Utilidad::getMaxId($nombreTabla, $nombreId);
        $numeroRegistros = DB::table($nombreTabla)->count();

        if($numeroRegistros==$maxId){
            return $maxId+1;
        }else{
            $ids=DB::table($nombreTabla)->orderBy($nombreId, 'asc')->pluck($nombreId);
            $cont=1;
            $auxId=0;
            foreach ($ids as $id) {
                if($id==$cont){
                    $auxId=$cont;
                }else{
                    return $auxId+1;
                }
                $cont=$cont+1;
            }
        }
        
    }
}