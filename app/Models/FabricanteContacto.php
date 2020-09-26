<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class FabricanteContacto extends Model
{
    protected $table = 'tbl_fabricacontactos';

    protected $primaryKey = 'id_fabricante';

    protected $fillable = [
        
    ];

    protected $casts = [
        
    ];

    function guarda_contacto($filtros){
        
        $exist = db::table('tbl_fabricacontactos')->where('id_contacto',$filtros->id_contacto)->count();
        
        if($exist >0){
        	db::table('tbl_fabricacontactos')
        	->where('id_contacto',$filtros->id_contacto)
        	->update(['contacto'=>$filtros->contacto,
        			  'telefono'=>$filtros->telefono,
        			  'telefono_2'=>$filtros->telefono_2,
        			  'correo'=>$filtros->correo,
        			  'comentarios'=>$filtros->comentarios]);

        }else{
        	db::table('tbl_fabricacontactos')
        		->insert(['id_fabricante'=>$filtros->id_fabricante,
	        			  'contacto'=>$filtros->contacto,
	        			  'telefono'=>$filtros->telefono,
	        			  'telefono_2'=>$filtros->telefono_2,
	        			  'correo'=>$filtros->correo,
	        			  'comentarios'=>$filtros->comentarios]);

        }

    }

}
