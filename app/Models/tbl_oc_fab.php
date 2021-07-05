<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
/**
 * Class tbl_oc_fab
 * @package App\Models
 * @version November 6, 2020, 3:25 am UTC
 *
 * @property integer $id_cotizacion
 * @property integer $estatus
 * @property integer $cantidad
 */
class tbl_oc_fab extends Model
{

    public $table = 'pedidos_fabricantes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_cotizacion',
        'estatus',
        'cantidad'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_cotizacion' => 'integer',
        'estatus' => 'integer',
        'cantidad' => 'integer'
    ];

    function informacion_pedido($filtros){
        return  db::select("SELECT *
                                FROM (
                                    SELECT 1 as tipo, d.id, f.abrev, f.id_fabricante, f.fabricante, f.contacto, f.correo, telefono_dir,d.ocf - ifnull(cp.cant,0) as cantidad, d.id_fab,d.handing,d.finish,d.style,IFNULL(d.lp,0) AS lp,inv.inv1,inv.inv2, pr.nombre, pr.nombre_corto, ac.cantidad as cant_ac
                                    FROM cotizacions c
                                    INNER JOIN cotizacion_detalle d ON d.id_cotizacion = c.id
                                    INNER JOIN productos p ON p.id=d.item 
                                    LEFT JOIN tbl_inventarios inv ON inv.id_producto=p.id
                                    INNER JOIN tbl_fabricantes f ON f.id_fabricante=p.fabricante
                                    LEFT JOIN proyectos pr ON pr.id = c.proyecto
                                    LEFT JOIN (
                                                    SELECT tipo, id_detalle, SUM(cantidad) AS cant
                                                    FROM pedidos_detalles 
                                                    WHERE id_pedido != $filtros->id_pedido
                                                    and tipo = 1
                                                    GROUP BY id_detalle, tipo) cp ON cp.id_detalle = d.id
                                     LEFT JOIN(
                                                    SELECT tipo, id_detalle, cantidad
                                                    FROM pedidos_detalles 
                                                    WHERE id_pedido = $filtros->id_pedido
                                                    and tipo = 1) ac ON ac.id_detalle = d.id
                                    WHERE id_occ IS NOT NULL 
                                    AND c.estatus = 1
                                    AND ifnull(d.asigando,0) = 0 
                                    AND d.ocf > 0  
                                    UNION ALL
                                    SELECT 2 ,it.id, f.abrev,f.id_fabricante, f.fabricante, f.contacto, f.correo, telefono_dir, it.ocf - ifnull(cp.cant,0), it.idfab, '','', '', it.lp, inv.inv1,inv.inv2, pr.nombre, pr.nombre_corto, ac.cantidad 
                                    FROM cotizacions c
                                    INNER JOIN items_productos it ON it.id_cotizacion=c.id 
                                    INNER JOIN productos p ON p.item= it.item_seleccionado AND IFNULL(it.sufijo,0)=IFNULL(p.sufijo,0)
                                    LEFT JOIN tbl_inventarios inv ON inv.id_producto=p.id
                                    INNER JOIN tbl_fabricantes f ON f.id_fabricante=p.fabricante
                                    LEFT JOIN proyectos pr ON pr.id = c.proyecto
                                    LEFT JOIN (
                                                    SELECT tipo, id_detalle, SUM(cantidad) AS cant
                                                    FROM pedidos_detalles 
                                                    WHERE id_pedido != $filtros->id_pedido
                                                    and tipo = 2
                                                    GROUP BY id_detalle, tipo) cp ON cp.id_detalle = it.id
                                         LEFT JOIN(
                                                    SELECT tipo, id_detalle, cantidad
                                                    FROM pedidos_detalles 
                                                    WHERE id_pedido = $filtros->id_pedido
                                                    and tipo = 2) ac ON ac.id_detalle = it.id
                                    WHERE c.id_occ IS NOT NULL
                                    AND c.estatus = 1
                                    AND ifnull(it.asignado,0) = 0
                                    AND it.accion = 1
                                    AND it.ocf > 0 )a
                                WHERE id_fabricante = ".$filtros->id);
    }
    
}
