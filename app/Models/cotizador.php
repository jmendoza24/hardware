<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\cotizador_detalle;
use DB;

class cotizador extends Model {
     public $table = 'cotizacions';
    

    //protected $dates = ['deleted_at'];
  
    function genera_cotizador($filtros){ 

    	$cotiza = new cotizador_detalle;
    	$cotiza->id_cotizacion =  $filtros->id_cotizacion;

    	$productos = $cotiza->detalle_cotizacion($cotiza);
    	$cotizacion = cotizador::where('id',$filtros->id_cotizacion)->first();
    	$num_cotizacion = $filtros->id_cotizacion;

    	$estatus = $cotizacion->estatus == '' ? 0 : $cotizacion->estatus;

    	$options  = view('cotizador.table',compact('productos','cotizacion','num_cotizacion','estatus'))->render();

    	return $options;
    }

    function detalle_head($filtros){
    	$cotiza = new cotizador();
    	$cotizacion = cotizador::where('id',$filtros->id_cotizacion)->first();
    	$estatus = $cotizacion->estatus == '' ? 0 : $cotizacion->estatus;
    	$informacion = db::table('items_productos as i')
    					->join('productos as p','p.id','i.id_producto')
    					->leftjoin('informacion_productos as ip','ip.id_item','p.id_item')
    					->where('id_detalle',$filtros->id_detalle)
    					->selectraw('ip.*, p.id as p_idproducto')
    					->first();
    	
      	$info_adic = db::select('call proceso_informacion_producto('.$informacion->p_idproducto.','.$filtros->id_detalle.')');
      	$info_adic = $info_adic[0];
      	$producto = productos::where('id',$informacion->p_idproducto)->first();
      	$fotos = $cotiza->get_fotos($producto->id_item);
      	$detalle = cotizador_detalle::where('id',$filtros->id_detalle)->first();
      	$suma_dependencias = $cotiza->suma_dependencias($filtros->id_detalle);
      	$dependencias = items_productos::where('id_detalle',$filtros->id_detalle)->orderby('id_catalogo')->first();

    	$options = view('cotizador.detalle_head',compact('estatus','informacion','info_adic','producto','fotos','detalle','suma_dependencias','cotizacion','dependencias'))->render();
    	return $options;

    }

    function tabla_dependencia($filtros){
    	$cotiza = new cotizador();

    	$producto = db::table('items_productos as i')
    					->join('productos as p','p.id','i.id_producto')
    					->where('id_detalle',$filtros->id_detalle)
    					->selectraw('p.*')
    					->first();
    	$dependencias = items_productos::where('id_detalle',$filtros->id_detalle)->orderby('id_catalogo')->get();
    	$suma_dependencias = $cotiza->suma_dependencias($filtros->id_detalle);
    	$detalle = cotizador_detalle::where('id',$filtros->id_detalle)->first();
    	$num_cotizacion =  $filtros->num_cotizacion;

    	$options = view('cotizador.tabla_dependencia',compact('producto','dependencias','suma_dependencias','num_cotizacion','detalle'))->render();
    	return $options;
    }

    function get_fotos($id_item){
    	$fotos = db::select('SELECT f.*
                                  FROM productos p
                                  INNER JOIN tbl_fotos_productos f ON f.id_producto = p.id
                                  WHERE p.id_item = '.$id_item);

    	if(sizeof($fotos)>0){
            $fotos = array('foto'=>$fotos[0]->foto);
            $fotos = (object)$fotos; 
		}else{
			$fotos = array('foto'=>'imagen-no-disponible.png');
		    $fotos = (object)$fotos;  
		}

		return $fotos;
	}  

	function suma_dependencias($id_detalle){
		return  items_productos::where([['id_detalle',$id_detalle],['accion',1]])
                          ->selectraw('id_detalle,sum(lp * ctd) as sum_lp, sum(phc * ctd) as sum_phc, sum(pvc * ctd) as sum_pvc')
                          ->groupby('id_detalle')
                          ->first();
	}
		    
}
