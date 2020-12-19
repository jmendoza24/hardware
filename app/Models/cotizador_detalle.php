<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class cotizador_detalle extends Model
{
     public $table = 'cotizacion_detalle';
    

    protected $dates = ['deleted_at'];

    function detalle_cotizacion($cotizacion){



        return db::select("SELECT d.*, ifnull(inv.inv1,0) as inv1,  ifnull(inv.inv2,0) as inv2, c.estatus, p.id as idproducto, p.codigo_sistema, p.costo_1, i.item as item_nom, s.selector, dt.sum_lp, dt.sum_phc, dt.sum_pvc, p.info, p.sufijo, '' as foto,
                            dp.finish_1, dp.finish_2,  dp.finish_3, dp.finish_4, dp.style_1,dp.style_2,dp.style_3, p.id_item

                            FROM cotizacion_detalle AS d
                            inner join cotizacions c on c.id = d.id_cotizacion
                            INNER JOIN productos as p on p.id = d.item
                            INNER JOIN items  AS i on i.id = p.id_item
                            LEFT JOIN sub_baldwins AS s on s.id = p.backset
                            LEFT JOIN formulas AS f on f.id = p.calculo_codigo
                            LEFT JOIN (
                                        SELECT id_detalle,sum(lp * ctd) as sum_lp, sum(phc * ctd) as sum_phc, sum(pvc * ctd) as sum_pvc
                                        FROM items_productos
                                        WHERE id_cotizacion = " .$cotizacion->id_cotizacion. "
                                        AND accion = 1
                                        GROUP BY id_detalle 
                                    ) dt ON dt.id_detalle = d.id
                            left join tbl_inventarios inv on inv.id_producto = d.item
                            left join tbl_datos_productos dp on dp.id_detalle = d.id  
                            WHERE d.id_cotizacion = " .$cotizacion->id_cotizacion ."
                            order by d.id");


    }
}
