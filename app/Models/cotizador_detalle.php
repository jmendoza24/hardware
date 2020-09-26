<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class cotizador_detalle extends Model
{
     public $table = 'cotizacion_detalle';
    

    protected $dates = ['deleted_at'];

    function detalle_cotizacion($cotizacion){
    	return db::table('cotizacion_detalle as d')
    				->join('productos as p','p.id','d.item')
                    ->join('items  as i','i.id','p.id_item')
    				->leftjoin('sub_baldwins as s','s.id','p.backset')
                    ->leftjoin('formulas as f','f.id','p.calculo_codigo')
			    	->where('id_cotizacion',$cotizacion->id_cotizacion)
			    	->selectraw('d.*, p.id as idproducto, p.codigo_sistema, p.costo_1, i.item as item_nom, s.selector')
			    	->get();
    }
}
