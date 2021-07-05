<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use PDF;

class cotizador_detalle extends Model{
     public $table = 'cotizacion_detalle';
    

    protected $dates = ['deleted_at'];

    function detalle_cotizacion($cotizacion){
        
        return db::select("SELECT d.*, ifnull(inv.inv1,0) as cant_inv1,  ifnull(inv.inv2,0) as cant_inv1, c.estatus, p.id as idproducto, p.codigo_sistema, p.costo_1, i.item as item_nom, s.selector as list_backset, s1.selector as list_handing , dt.sum_lp, dt.sum_phc, dt.sum_pvc, p.info, d.sufijo, '' as foto,
                            dp.finish_1, dp.finish_2,  dp.finish_3, dp.finish_4, if(d.info != 7 ,dp.style_1, d.style) as style_1,dp.style_2,dp.style_3, p.id_item, cat.abrev, ifnull(d.cantidad,0) as cantidad
                            FROM cotizacion_detalle AS d
                            inner join cotizacions c on c.id = d.id_cotizacion
                            INNER JOIN productos as p on p.id = d.item
                            INNER JOIN items  AS i on i.id = p.id_item
                            LEFT JOIN sub_baldwins AS s on s.id = p.backset
                            LEFT JOIN sub_baldwins AS s1 on s1.id = p.handing
                            LEFT JOIN formulas AS f on f.id = p.calculo_codigo
                            left join catalogos as cat on cat.id  = p.catalogo
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

    function listado_dependientes($cotizacion){
        return db::select('SELECT i.id, p.codigo_sistema, i.lp, i.ctd, i.inv1 , i.inv2, i.asignado, iv.inv1 AS in_inv1, iv.inv2 AS in_inv2, f.abrev, i.ocf, i.id_detalle
                            FROM items_productos i 
                            INNER JOIN productos p ON p.id = i.producto
                            INNER JOIN tbl_fabricantes f ON f.id_fabricante =  p.fabricante
                            LEFT JOIN tbl_inventarios iv ON iv.id_producto = i.producto 
                            WHERE  i.id_cotizacion = '.$cotizacion->id_cotizacion.'
                            and accion = 1
                            AND ctd > 0 ');
    }

    function filtros($filtros){
        return db::select("SELECT i.id,i.item,p.descripcion, p.id as id_producto, p.sufijo
                            FROM items i 
                            inner JOIN productos p ON p.id_item =i.id and p.item != '' 
                            where p.item like '%".$filtros->buscar."%'");

    }

    function generar_pdf($filtros){
        $cotizacion = db::table('cotizacions as c')
                    ->leftjoin('proyectos as p','p.id','c.proyecto')
                    ->leftjoin('cliente_participantes as cp','cp.id','c.cliente')
                    ->leftjoin('tbl_clientes as tc','tc.id_cliente','cp.id_cliente')
                    ->where('c.id',$filtros->num_cotizacion)
                    ->selectraw('c.id as idcotizacion, c.fecha, ifnull(c.id_occ,0) as id_occ, c.id_hijo, c.ver, c.flete,p.nombre AS proyecto,cp.*,tc.empresa,c.id AS id_cot,c.created_at, c.iva_usa , c.descuento_usa, c.notas,descuento_mx,iva_mx, descuento_mod, iva_mod')
                    ->first();

        $productos = db::select("SELECT d.*, ifnull(inv.inv1,0) as inv1,c.id_hijo,  ifnull(inv.inv2,0) as inv2, c.estatus, p.id as idproducto, p.codigo_sistema, p.costo_1, i.item as item_nom, s.selector, dt.sum_lp, dt.sum_phc, dt.sum_pvc, p.info, p.sufijo, '' as foto,
                                dp.finish_1, dp.finish_2,  dp.finish_3, dp.finish_4, dp.style_1,dp.style_2,dp.style_3, p.descripcion_mtk
                                FROM cotizacion_detalle AS d
                                inner join cotizacions c on c.id = d.id_cotizacion
                                INNER JOIN productos as p on p.id = d.item
                                INNER JOIN items  AS i on i.id = p.id_item
                                LEFT JOIN sub_baldwins AS s on s.id = p.backset
                                LEFT JOIN formulas AS f on f.id = p.calculo_codigo
                                LEFT JOIN (
                                            SELECT id_detalle,sum(lp * ctd) as sum_lp, sum(phc * ctd) as sum_phc, sum(pvc * ctd) as sum_pvc
                                            FROM items_productos
                                            WHERE id_cotizacion = " .$filtros->num_cotizacion. "
                                            AND accion = 1
                                            GROUP BY id_detalle 
                                        ) dt ON dt.id_detalle = d.id
                                left join tbl_inventarios inv on inv.id_producto = d.item
                                left join tbl_datos_productos dp on dp.id_detalle = d.id  
                                WHERE d.id_cotizacion = " .$filtros->num_cotizacion. "
                                order by c.id"  
                                );

        $data= DB::select("SELECT * FROM tbl_datos_generales");
        $data = $data[0];

        if($filtros->tipo==1){
            
            $tipo_doc='PRODUCTO';
            $Insta="USD";
            $idhc="Producto";
            $descripcion_mtk=1;

        }else if($filtros->tipo==2){
            $tipo_doc= 'INSTALACION';
            $Insta="MX";
            $idhc="Inst";
            $descripcion_mtk=1;

        }elseif($filtros->tipo==4){
            $tipo_doc= 'MODIFICACION';
            $Insta="USD";
            $idhc="Mod";
            $descripcion_mtk=1;

        }elseif($filtros->tipo==3){
            $tipo_doc= 'PRODUCTO Y MODIFICACION';
            $Insta="USD";
            $idhc="Mod";
            $descripcion_mtk=0;
        }else{

            $tipo_doc='PRODUCTO';
            $Insta="USD"; 
            $idhc="Producto";
            $descripcion_mtk=1;
        }

        $estatus = 0;
        $tipo = $filtros->tipo;
        $pdf = PDF::loadView('cotizador.pdf',compact('cotizacion','productos','data','tipo','tipo_doc','Insta','idhc','descripcion_mtk','estatus'))->setPaper('A4','portrait');

        return $pdf;

    }
}
