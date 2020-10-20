<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class cotizador_detalle extends Model
{
     public $table = 'cotizacion_detalle';
    

    protected $dates = ['deleted_at'];

    function detalle_cotizacion($cotizacion){

        return db::select('SELECT d.*, p.id as idproducto, p.codigo_sistema, p.costo_1, i.item as item_nom, s.selector, sum_lp, sum_phc, sum_pvc, p.info
                            FROM cotizacion_detalle AS d
                            INNER JOIN productos as p on p.id = d.item
                            INNER JOIN items  AS i on i.id = p.id_item
                            LEFT JOIN sub_baldwins AS s on s.id = p.backset
                            LEFT JOIN formulas AS f on f.id = p.calculo_codigo
                            LEFT JOIN (
                                                SELECT id_detalle,sum(lp * ctd) as sum_lp, sum(phc * ctd) as sum_phc, sum(pvc * ctd) as sum_pvc
                                                FROM items_productos
                                                WHERE id_cotizacion = ' .$cotizacion->id_cotizacion. '
                                                AND accion = 1
                                                GROUP BY id_detalle 
                                            ) dt ON dt.id_detalle = d.id
                            WHERE id_cotizacion = ' .$cotizacion->id_cotizacion);
    	/*return db::table('cotizacion_detalle as d')
    				->join('productos as p','p.id','d.item')
                    ->join('items  as i','i.id','p.id_item')
    				->leftjoin('sub_baldwins as s','s.id','p.backset')
                    ->leftjoin('formulas as f','f.id','p.calculo_codigo')
			    	->where('id_cotizacion',$cotizacion->id_cotizacion)
			    	->selectraw('d.*, p.id as idproducto, p.codigo_sistema, p.costo_1, i.item as item_nom, s.selector')
			    	->get();*/
    }
}
