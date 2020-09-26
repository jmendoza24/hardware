<?php

namespace App\Http\Controllers;
use App\Models\Clientes;
use App\Models\proyectos;
use App\Models\Fabricantes;
use App\Models\catalogos;
use App\Models\familia;
use App\Models\categoria;
use App\Models\subcategorias;
use App\Models\disenio;
use App\Models\Sub_baldwin;
use App\Models\sufijos; 
use App\Models\item;
use App\Models\productos_temporal;
use App\Models\cotizador_detalle;
use App\Models\cotizador;
use App\Models\productos;
use App\Models\items_productos;
use App\Models\informacion_productos;
use App\Models\Fabricantes_costos;
use App\Models\proyectos_clientes;
use App\Models\cliente_participantes;
use App\Http\Requests\CreatecatalogosRequest;
use App\Http\Requests\UpdatecatalogosRequest;
use App\Repositories\catalogosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use View;
use DB;
use PDF;
use Mail;


class cotizadorController extends AppBaseController
{
    /** @var  catalogosRepository */
    private $catalogosRepository;

    public function __construct(catalogosRepository $catalogosRepo)
    {
        $this->catalogosRepository = $catalogosRepo;
    }

    public function lista(){
      $cotizaciones = db::select('SELECT c.*, p.nombre, cl.contacto, cl.correo, cl.telefono
                                  FROM cotizacions c
                                  LEFT JOIN proyectos p ON p.id = c.proyecto
                                  LEFT JOIN cliente_participantes cl ON cl.id = c.cliente');

      return view('cotizador.lista',compact('cotizaciones'));
    }

    public function index(Request $request){
        $filtro = new cotizador_detalle;
        if ($request->session()->has('num_cotizacion')) {
             
         $num_cotizacion = $request->session()->get('num_cotizacion');

         }else{
            $fecha = date('Y-m-d');
            $id = cotizador::insertGetId(['enviado' => 0,
                                          'usuario_id'=>auth()->id()]);       
            $request->session()->put('num_cotizacion',$id);
            $num_cotizacion = $request->session()->get('num_cotizacion');

         }
        $filtro->id_cotizacion = $num_cotizacion;
        $productos = $filtro->detalle_cotizacion($filtro);
        $cotizacion = cotizador::where('id',$num_cotizacion)->get();
        $cotizacion = $cotizacion[0];

        if($cotizacion->proyecto > 0 ){
          $clientes = db::table('proyectos_clientes as pc')
                        ->join('cliente_participantes as c','pc.id_cliente','c.id_cliente')
                        ->where([['id_proyecto',$cotizacion->proyecto],['c.activo',1]])
                        ->selectraw('c.*')
                        ->get();
                        
          $proyectos = proyectos::where('estatus',1)->get();
          
        }else if($cotizacion->cliente > 0){
          
          $proyectos = db::table('proyectos_clientes as pc')
                      ->join('proyectos as p','p.id','pc.id_proyecto')
                      ->where('id_cliente',$cotizacion->cliente)
                      ->selectraw('p.*')
                      ->get();

          $n  = cliente_participantes::where('activo',1)->get();
        }else{
          
          $proyectos = proyectos::where('estatus',1)->get();
          $clientes = cliente_participantes::where('activo',1)->get();
        }
        
        
        $tipo=0;

        $fabricantes  = fabricantes::orderby('fabricante')->get();
        return view('cotizador.index',compact('fabricantes','num_cotizacion','productos','cotizacion','proyectos','clientes','tipo'));
    }

    function detalle_producto(Request $request){
        $producto = $request->producto;

        $items = db::table('productos as p')
                    ->join('items as i','i.id','p.id_item')
                    ->where('p.id_item',$producto)
                    ->selectraw('p.*,i.item as item_nom')
                    ->get();

        $options = view('cotizador.detalle',compact('producto','items'))->render();

        return json_encode($options);
    }

    function agrega_producto(Request $request){
        $filtro = new cotizador_detalle;
        $num_cotizacion = $request->session()->get('num_cotizacion');
        #$existe = cotizador_detalle::where([['id_cotizacion',$num_cotizacion],['item',$request->producto]])->count();
        
        $id = cotizador_detalle::insertGetId(['id_cotizacion'=>$num_cotizacion,
                                              'item'=>$request->producto]);
        $filtro->id_cotizacion = $num_cotizacion;
        $produc = productos::where('id',$request->producto)->get();
        $produc = $produc[0];

        $params =  array($produc->info,$num_cotizacion,$request->producto,$id);
        db::update('call procesos_inserta_elementos(?,?,?,?)',$params);

        $productos = $filtro->detalle_cotizacion($filtro);   
        $cotizacion = cotizador::where('id',$num_cotizacion)->get();
        $cotizacion = $cotizacion[0]; 
        $options = view('cotizador.table',compact('productos','cotizacion'))->render();

        return json_encode($options);
    }

    function elimina_producto(Request $request){
        $filtro = new cotizador_detalle;
        $num_cotizacion = $request->session()->get('num_cotizacion');
        cotizador_detalle::where('id',$request->producto)->delete();
        $filtro->id_cotizacion = $num_cotizacion;
        $productos = $filtro->detalle_cotizacion($filtro); 
        items_productos::where('id_detalle',$request->producto)->delete();
        $cotizacion = cotizador::where('id',$num_cotizacion)->get();
        $cotizacion = $cotizacion[0];  

        $options = view('cotizador.table',compact('productos','cotizacion'))->render();

        return json_encode($options); 
    }

    function agregar_dependencia(Request $request){
        $num_cotizacion = $request->session()->get('num_cotizacion');
        $item = $request->item;
        $producto = productos::where('id',$item)->get();
        $producto = $producto[0];
        $informacion = informacion_productos::where('id_item',$producto->id_item)->get();

        $informacion = $informacion[0];
        $dependencias = items_productos::where('id_detalle',$request->id)->orderby('id_catalogo')->get();

        $suma_dependencias = items_productos::where([['id_detalle',$request->id],['accion',1]])
                            ->selectraw('id_detalle,sum(lp) as sum_lp, sum(phc) as sum_phc, sum(pvc) as sum_pvc')
                            ->groupby('id_detalle')
                            ->get();
        if(sizeof($suma_dependencias)>0){
          $suma_dependencias = $suma_dependencias[0];
        }else{
          $suma_dependencias =  array('id_detalle' => $request->id,
                                      'sum_lp'=>0,
                                      'sum_phc'=>0,
                                      'sum_pvc'=>0);
          $suma_dependencias = (object)$suma_dependencias;
        }


        $info_adic = db::select('call proceso_informacion_producto('.$item.','.$request->id.')');
        
        $info_adic = $info_adic[0];

        $options = view('cotizador.info_producto',compact('item','informacion','info_adic','producto','dependencias','suma_dependencias'))->render();
        return json_encode($options);
    }

    function guarda_info_cotizacion(Request $request){
        $filtro = new cotizador_detalle;
        $num_cotizacion = $request->session()->get('num_cotizacion');

        cotizador_detalle::where('id',$request->id)
                    ->update(['posicion'=>$request->posicion,
                              'bks'=>$request->bks,
                              'door_t'=>$request->door_t,
                              'fabricante'=>$request->fabricante,
                              'cantidad'=> $request->cantidad ==''? 0 : str_replace(',', '', $request->cantidad),
                              'mod_precio_unit'=>$request->mod_precio_unit == '' ? 0 : str_replace('$', '',str_replace(',', '', $request->mod_precio_unit)),
                              'mod_cantidad'=> $request->mod_cantidad == '' ? 0 : str_replace(',', '', $request->mod_cantidad),
                              'inst_precio_unit'=>$request->inst_precio_unit == '' ? 0 : str_replace('$', '',str_replace(',', '', $request->inst_precio_unit)),
                              'inst_cantidad'=> $request->inst_cantidad == '' ? 0 : str_replace(',', '', $request->inst_cantidad)]);

        $filtro->id_cotizacion = $num_cotizacion;
        $productos = $filtro->detalle_cotizacion($filtro);
        $cotizacion = cotizador::where('id',$num_cotizacion)->get();
        $cotizacion = $cotizacion[0];

        $options = view('cotizador.table',compact('productos','cotizacion'))->render();

        return json_encode($options);
    }

    function guardar_descuentos(Request $request){
     $filtro = new cotizador_detalle;
        $num_cotizacion = $request->session()->get('num_cotizacion');

        cotizador::where('id',$num_cotizacion)
                    ->update(['descuento_mx'=> $request->descuento_mx ==''? 0 : str_replace('%', '', $request->descuento_mx),
                              'descuento_usa'=>$request->descuento_usa ==''? 0 : str_replace('%', '', $request->descuento_usa),
                              'iva_mx'=> $request->iva_mx == '' ? 0 : $request->iva_mx,
                              'iva_usa'=> $request->iva_usa == '' ? 0 : $request->iva_usa]);

        $filtro->id_cotizacion = $num_cotizacion;
        $productos = $filtro->detalle_cotizacion($filtro);
        $cotizacion = cotizador::where('id',$num_cotizacion)->get();
        $cotizacion = $cotizacion[0];

        $options = view('cotizador.table',compact('productos','cotizacion'))->render();

        return json_encode($options); 
    }
    
    function guarda_datos(Request $request){
        $num_cotizacion = $request->session()->get('num_cotizacion');
        $cotizacion = cotizador::where('id',$num_cotizacion)->get();
        $cotizacion = $cotizacion[0];
        $lista  = $cotizacion->lista_precio ==''?1:$cotizacion->lista_precio;

        $item = explode('.', $request->item);
        $sufijo = isset($item[2]) ? $item[2] :'';

        items_productos::where('id',$request->id)
                        ->update(['item'=>$item[0],
                                 'sufijo'=>$sufijo,
                                 'color'=>$request->color,
                                 'item_seleccionado'=>$request->item]);

        db::update('call actualiza_item('.$request->id.')');
        $datos = items_productos::where('id',$request->id)->get();
        $datos = $datos[0];
        $producto = productos::where('item',$item[0]);
        
        if(isset($item[2])){
            $producto = $producto->where('sufijo',$item[2]);
        }

        $producto = $producto->get();
        

        if(sizeof($producto)>0){

            $producto = $producto[0];
            $factor = db::select("SELECT factor_hc,lp".$lista." as lista FROM fabricantes_costos where id_fabricante=".$producto->fabricante);
            $factor = $factor[0];

            if($producto->fabricante==77){
                
                $costo = in_array($request->color,explode(',', $datos->colores_1)) ? $producto->costo_1 :0;
                if($costo==0){
                    $costo = in_array($request->color,explode(',', $datos->colores_2)) ? $producto->costo_2 :0;
                }else if($costo==0){
                    $costo = in_array($request->color,explode(',', $datos->colores_3)) ? $producto->costo_3 :0;
                }else if($costo==0){
                    $costo = in_array($request->color,explode(',', $datos->colores_4)) ? $producto->costo_4 :0;
                }
            }

            $arr = array(9,10,11,12);
            if($request->id_catalogo==1){
                $accion = $producto->exterior_tim_1_accion;
            }else if($request->id_catalogo==2){
                $accion = $producto->int_escutcheon_dep2_accion;
            }else if($request->id_catalogo==3){
                $accion = $producto->knob_lever_dep3_accion;
            }else if($request->id_catalogo==4){
                $accion = $producto->spindle_dep4_accion;
            }else if($request->id_catalogo==5){
                $accion = $producto->cylinder_dep5_accion;
            }else if($request->id_catalogo==6){
                $accion = $producto->mortise_lock_dep6_accion;
            }else if($request->id_catalogo==7){
                $accion = $producto->blocking_dep7_accion;
            }else if($request->id_catalogo==8){
                $accion = $producto->turn_knob8_accion;
            }else if(in_array($request->id_catalogo,$arr)){
              $accion = 1;
            }else{
              $accion = 0;
            }
            // }else if($request->id_catalogo==9){
            //     $accion = $producto->dep9_accion;
            // }else if($request->id_catalogo==10){
            //     $accion = $producto->dep10_libre_accion;
            // }

            items_productos::where('id',$request->id)
                            ->update(['idfab'=> str_replace('xxx', $request->color, $producto->codigo_sistema),
                                      'descripcion'=>$producto->descripcion,
                                      'ctd'=>$request->cantidad,
                                      'lp'=>$costo,
                                      'phc'=>$costo * $factor->factor_hc,
                                      'pvc'=>$costo * $factor->lista,
                                      'accion'=>$accion]);
                $alerta = 1;
            }else{
                items_productos::where('id',$request->id)
                                ->update(['idfab'=>'',
                                          'descripcion'=>'',
                                          'ctd'=>0,
                                          'lp'=>0,
                                          'sufijo'=>'',
                                          'color'=>'',
                                          'phc'=>0,
                                          'accion'=>0]);
                $alerta = 0;
            }

            $dependencias = items_productos::where('id_detalle',$datos->id_detalle)->orderby('id_catalogo')->get();
            
            $suma_dependencias = items_productos::where([['id_detalle',$datos->id_detalle],['accion',1]])
                            ->selectraw('id_detalle,sum(lp) as sum_lp, sum(phc) as sum_phc, sum(pvc) as sum_pvc')
                            ->groupby('id_detalle')
                            ->get();
            if(sizeof($suma_dependencias)>0){
              $suma_dependencias = $suma_dependencias[0];
            }else{
              $suma_dependencias =  array('id_detalle' => $request->id,
                                          'sum_lp'=>0,
                                          'sum_phc'=>0,
                                          'sum_pvc'=>0);
              $suma_dependencias = (object)$suma_dependencias;
            }


            $options = view('cotizador.tabla_dependencia',compact('producto','dependencias','suma_dependencias'))->render();
            $arr = array('options'=>$options,
                         'alerta'=>$alerta);

            return $arr;

        
        
    }

    function buscar_cliente_proyecto(Request $request){
        $tipo = $request->tipo;
        $num_cotizacion = $request->session()->get('num_cotizacion');
        if($tipo==1){

          $clientes = db::table('proyectos_clientes as pc')
                        ->join('cliente_participantes as c','pc.id_cliente','c.id_cliente')
                        ->where([['id_proyecto',$request->proyectos],['c.activo',1]])
                        ->selectraw('c.*')
                        ->get();

          $proyectos = proyectos::where('estatus',1)->get();

          cotizador::where('id',$num_cotizacion)
                  ->update(['proyecto'=>$request->proyectos]);

        }else if($tipo==2){
          $proyectos = db::table('proyectos_clientes as pc')
                      ->join('proyectos as p','p.id','pc.id_proyecto')
                      ->where('id_cliente',$request->clientes)
                      ->selectraw('p.*')
                      ->get();
          $clientes = cliente_participantes::where('activo',1)->get();

          $cli = cliente_participantes::where('id_cliente',$request->clientes)->get();
          if(sizeof($cli)>0){
            $lista = $cli[0]->lista_precio;
          }else{
            $lista = 1;
          }

          cotizador::where('id',$num_cotizacion)
                  ->update(['cliente'=>$request->clientes,
                            'lista_precio'=>$lista]);

                  /**

                  SELECT d.*, case ct.lista_precio when 1 then lp1 
                      when 2 then lp2
                      when 3 then lp3
                      when 4 then lp4 END AS factor 
FROM cotizacion_detalle d
INNER JOIN cotizacions ct ON ct.id = d.id_cotizacion
INNER JOIN productos p ON p.id = d.item
INNER JOIN fabricantes_costos c ON c.id_fabricante = p.fabricante
WHERE d.id = 264

*/

        }else{
          $proyectos = proyectos::where('estatus',1)->get();
          $clientes = cliente_participantes::where('activo',1)->get();

          cotizador::where('id',$num_cotizacion)
                  ->update(['proyecto'=>0,
                            'cliente'=>0]);
        }

        $cotizacion = cotizador::where('id',$num_cotizacion)->get();
        $cotizacion = $cotizacion[0];

        $options = view('cotizador.cliente_proyecto',compact('clientes','proyectos','tipo','cotizacion'))->render();
        return json_encode($options);
    }

    function actualiza_cliente_proyecto(Request $request){
        $tipo = $request->tipo;
        $num_cotizacion = $request->session()->get('num_cotizacion');
        
        cotizador::where('id',$num_cotizacion)
                  ->update(['proyecto'=>$request->proyectos,
                            'cliente'=>$request->clientes]);

        $cotizacion = cotizador::where('id',$num_cotizacion)->get();
        $cotizacion = $cotizacion[0];

        $clientes = db::table('proyectos_clientes as pc')
                        ->join('cliente_participantes as c','pc.id_cliente','c.id_cliente')
                        ->where([['id_proyecto',$request->proyectos],['c.activo',1]])
                        ->selectraw('c.*')
                        ->get();

        $proyectos = proyectos::where('estatus',1)->get();

        $options = view('cotizador.cliente_proyecto',compact('clientes','proyectos','tipo','cotizacion'))->render();
        return json_encode($options);
    }

    function guarda_detalle(Request $request){
        $num_cotizacion = $request->session()->get('num_cotizacion');
        $filtro = new cotizador_detalle;
        $filtro->id_cotizacion = $num_cotizacion;

        cotizador_detalle::where('id',$request->id_detalle)
                        ->update(['finish'=>$request->finish,
                                  'style'=>$request->style]); 
        /* Asignar precios */
        $cotizacion = cotizador::where('id',$num_cotizacion)->get();
        $cotizacion = $cotizacion[0];

        $lista  = $cotizacion->lista_precio ==''? 1 :$cotizacion->lista_precio;
        $det = cotizador_detalle::where('id',$request->id_detalle)->get();
        $producto = productos::where('id',$det[0]->item)->get();
        $producto = $producto[0];  


        $factor = db::select("SELECT factor_hc,lp".$lista." as lista FROM fabricantes_costos where id_fabricante=".$producto->fabricante);
        $factor = $factor[0];

        $info_adic = db::select('call proceso_informacion_producto('.$producto->id.','.$request->id_detalle.')');
        $info_adic = $info_adic[0];


        if($producto->fabricante==77){
                
                $costo = in_array($request->finish,explode(',', $info_adic->finish_1)) ? $producto->costo_1 :0;
                if($costo==0){
                    $costo = in_array($request->finish,explode(',', $info_adic->finish_2)) ? $producto->costo_2 :0;
                }else if($costo==0){
                    $costo = in_array($request->finish,explode(',', $info_adic->finish_3)) ? $producto->costo_3 :0;
                }else if($costo==0){
                    $costo = in_array($request->finish,explode(',', $info_adic->finish_4)) ? $producto->costo_4 :0;
                }
            }

        cotizador_detalle::where('id',$request->id_detalle)
              ->update(['lp'=>$costo,
                        'phc'=>$costo * $factor->factor_hc,
                        'pvc'=>$costo * $factor->lista]);

        /* Fin lista de precios */
        //$item = $request->item;
        $informacion = informacion_productos::where('id_item',$producto->id_item)->get();
        $informacion = $informacion[0];
        /**
        $info_adic = db::select('call proceso_informacion_producto('.$producto->id.','.$request->id_detalle.')');
        $info_adic = $info_adic[0]; */
        $options = view('cotizador.detalle_head',compact('informacion','info_adic','producto'))->render();
        
        $productos = $filtro->detalle_cotizacion($filtro);   
        $cotizacion = cotizador::where('id',$num_cotizacion)->get();
        $cotizacion = $cotizacion[0]; 
        $options2 = view('cotizador.table',compact('productos','cotizacion'))->render();

        $arr = array('options'=>$options,
                     'options2'=>$options2);
        
        return $arr;
    }

    public function baja_cotiza_pdf(Request $request){


        $filtro = new cotizador_detalle;
        $num_cotizacion=$request->id_cotizacion;
        
        $filtro->id_cotizacion = $num_cotizacion;
        $productos = $filtro->detalle_cotizacion($filtro);
        $cotizacion = cotizador::where('id',$num_cotizacion)->get();
        $cotizacion = $cotizacion[0];

        if($cotizacion->proyecto > 0 ){
          $clientes = db::table('proyectos_clientes as pc')
                        ->join('tbl_clientes as c','pc.id_cliente','c.id_cliente')
                        ->where([['id_proyecto',$cotizacion->proyecto],['c.activo',1]])
                        ->selectraw('c.*')
                        ->get();
          $proyectos = proyectos::where('estatus',1)->get();
          
        }elseif($cotizacion->cliente > 0){
          $proyectos = db::table('proyectos_clientes as pc')
                      ->join('proyectos as p','p.id','pc.id_proyecto')
                      ->where('id_cliente',$cotizacion->cliente)
                      ->selectraw('p.*')
                      ->get();

          $clientes = Clientes::where('activo',1)->get();
        }else{
          $proyectos = proyectos::where('estatus',1)->get();
          $clientes = Clientes::where('activo',1)->get();
        }
        

        $tipo=0;
   
        $fabricantes  = fabricantes::orderby('fabricante')->get();



        if($request->id_tipo==1){



              $pdf  =  \App::make('dompdf.wrapper');
                    $view = View::make('cotizador.pdf',compact('fabricantes','num_cotizacion','productos','cotizacion','proyectos','clientes','tipo'))->render();
                    $pdf->loadHTML($view);
                    $pdf->stream();
                    return $pdf->download('Cotizacion.pdf');


        }else{



        }
    


    }

}
