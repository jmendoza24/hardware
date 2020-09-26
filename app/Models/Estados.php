<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Estados extends Model
{
    protected $table = 'tbl_estados';

    protected $primaryKey = 'id';

    protected $fillable = [
        
    ];

    protected $casts = [
        
    ];

    function municipios($filtro){
    	return db::table('tbl_estadosmun as m')
    			->join('tbl_municipios as mu','m.municipios_id','mu.id')
    			->where('m.estados_id',$filtro->id_municipio)
    			->get();
    }
}
