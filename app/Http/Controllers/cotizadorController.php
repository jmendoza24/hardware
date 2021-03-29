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
use App\Models\Abatimientos;
use App\Models\productos_temporal;
use App\Mail\EnvioFlux; 
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
use Illuminate\Support\Facades\Storage;
use Flash;
use Response;
use View;
use DB;
use PDF;
use Mail;
set_time_limit(0);


use App\Models\tbl_fotos_productos;


class cotizadorController extends AppBaseController
{
    /** @var  catalogosRepository */
    private $catalogosRepository;

    public function __construct(catalogosRepository $catalogosRepo)
    {
        $this->catalogosRepository = $catalogosRepo;
    }

    function lista(){
      $cotizaciones = db::select("CALL listado_cotizacion(0)");

      return view('cotizador.lista',compact('cotizaciones'));
    }

    public function oc_cambia(Request $request){
      $max = is_null(cotizador::where('estatus',1)->max('id_occ')) ? 1 : cotizador::where('estatus',1)->max('id_occ') ;
      $max = $max + 1;
      cotizador::where('id',$request->id)->update(['estatus'=>1,'fecha'=>date('Y-m-d h:i:s'), 'id_occ'=>$max]);
      return 1;
    }





     function baja_cotiza_pdf(Request $request){

        $filtro = new cotizador_detalle;
        $filtro->num_cotizacion = $request->id_cotizacion;
        $filtro->tipo = $request->id_tipo;

        $pdf = $filtro->generar_pdf($filtro);
        $cotizacion = cotizador::where('id', $request->id_cotizacion)->first();
        if($cotizacion->id_occ > 0){
        return  $pdf->download('OCC_'.$cotizacion->id_occ.'.pdf');  
      }else{
        return  $pdf->download('COT_'.$request->id_cotizacion.'.pdf');
      }

    }

    
   public function enviar_cotizacion2(Request $request){
      $num_cotizacion = $request->session()->get('num_cotizacion');


      if($request->tipo == 1){
         cotizador::where('id',$request->id_cotizacion)
                  ->update(['enviado'=>1]);
          $request->session()->forget('num_cotizacion');
          return 1;
      }else if($request->tipo ==2){
          $filtro = new cotizador_detalle;
          $num_cotizacion = $request->session()->get('num_cotizacion');

          $cot = db::table('cotizacions as c')
                    ->leftjoin('proyectos as p','p.id','c.proyecto')
                    ->leftjoin('cliente_participantes as cp','cp.id','c.cliente')
                    ->leftjoin('tbl_clientes as tc','tc.id_cliente','cp.id_cliente')
                    ->where('c.id',$num_cotizacion)
                    ->selectraw('p.nombre AS proyecto,cp.*,tc.empresa,c.id AS id_cot,c.created_at, c.iva_usa , c.descuento_usa')
                    ->get();
          $cot=$cot[0];

          $productos2= db::table('cotizacion_detalle as cd')
                   ->join('productos as p','p.id','cd.item')
                   ->where('cd.id_cotizacion',$num_cotizacion)
                   ->selectraw('cd.item,cd.pvc,cd.cantidad,p.id AS id_hc,p.descripcion')
                   ->get();

          $data= DB::select("SELECT * FROM tbl_datos_generales");
          $data=$data[0];
          if(!isset($request->id_tipo)){
            $tipo = $request->id_tipo;
          }else{
            $tipo = 1;
          }



                 $data = array(
                   'ids'==1,                  
                 );
  
                    $email='cotizador.mailEnvio';
                    $vista_t="cotizador.mailEnvio";



        $subject = "Asunto del correo";
        $for = "diego05vidales@gmail.com";
        Mail::send('cotizador.mailEnvio',$request->all(), function($msj) use($subject,$for){
            $msj->from("diego05vidales@gmail.com","NombreQueAparecer¨¢ComoEmisor");
            $msj->subject($subject);
            $msj->to($for);
        });


            
                
            
            
            
      Storage::delete('Cotizacion_'.$num_cotizacion.'.pdf');

          cotizador::where('id',$request->id_cotizacion)
                  ->update(['enviado'=>2]);

                    DB::table('cotizacions')->where([['id',$num_cotizacion]])->update(['estatus'=>3]);

     //     $request->session()->forget('num_cotizacion');

     //   return redirect()->back();


      }


                           return 1;//redirect()->back()->with('success', 'CotizaciÃ³n enviada');

    }

    public function oc_cambia2(Request $request){


          cotizador::where('id',$request['id'])
                            ->update(['estatus'=>0]);

    }

    public function enviadas(Request $request){


            $cotizaciones = db::select("CALL listado_cotizacion_oc_enviados()");

            return view('cotizador.oc_enviadas',compact('cotizaciones'));
    }



    function revive_cotizacion($id_cotizacion, Request $request){
    
      $request->session()->put('num_cotizacion',$id_cotizacion);
      return redirect()->route('cotizador.index'); 
   }



    public function oc(Request $request){
     
     $cotizaciones = db::select("CALL listado_cotizacion(1)");
      return view('cotizador.oc',compact('cotizaciones'));

    }

     function index(Request $request){

        $filtro = new cotizador_detalle;

        $generales = db::select("SELECT * from tbl_datos_generales");

        if ($request->session()->has('num_cotizacion')) {
             
         $num_cotizacion = $request->session()->get('num_cotizacion');

         }else{
            $fecha = date('Y-m-d');

            $id = cotizador::insertGetId(['enviado' => 0,
                                          'proyecto'=>0,
                                          'cliente'=>0,
                                          'descuento_usa'=>0,
                                          'descuento_mx'=>0,
                                          'iva_usa'=>16,
                                          'iva_mx'=>16,
                                          'iva_mod'=>16,
                                          'usuario_id'=>auth()->id(),
                                          'notas'=>$generales[0]->notas,
                                          'created_at'=>$fecha]);       
            $request->session()->put('num_cotizacion',$id);
            cotizador::where('id',$id)->update(['id_hijo'=>$id,'ver'=>0]);
            $num_cotizacion = $request->session()->get('num_cotizacion');

         }

        $filtro->id_cotizacion = $num_cotizacion;
        $productos = $filtro->detalle_cotizacion($filtro);
        
        $cotizacion = db::table('cotizacions as c')
                      ->leftjoin('cliente_participantes as p', 'p.id','c.cliente')
                      ->where('c.id',$num_cotizacion)
                      ->selectraw('c.*, p.correo as c_correo')
                      ->first();
        //cotizador::where('id',$num_cotizacion)->get();
        //$cotizacion = $cotizacion[0];

       

        if($cotizacion->proyecto > 0 ){ 
          $clientes = db::table('proyectos_clientes as pc')
                        ->join('cliente_participantes as c','pc.id_cliente','c.id')
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

          $clientes = cliente_participantes::where('activo',1)->get();
        }else{
          
          $proyectos = proyectos::where('estatus',1)->get();
          $clientes = cliente_participantes::where('activo',1)->get();
        }

        $tipo=0;
        $info_adic = db::select('select * from tbl_datos_productos where id_cotizacion = '.$num_cotizacion);

//        $info_adic = db::select('select * from tbl_datos_productos where id_cotizacion = '.$num_cotizacion);

        $estatus = sizeof($productos)> 0 ? $productos[0]->estatus :0;
        $fabricantes  = fabricantes::orderby('fabricante')->get();

        //$filtros_select = $filtro->filtros();

        return view('cotizador.index',compact('fabricantes','num_cotizacion','productos','cotizacion','proyectos','clientes','tipo','estatus','info_adic'));

    }

    function detalle_producto(Request $request){
        
        $producto = $request->producto;
  
        $items = db::table('productos as p')
                    ->join('items as i','i.id','p.id_item')
                    ->where('p.id_item',$producto)
                    ->selectraw('p.*,i.item as item_nom')
                    ->get();

         if(sizeof($items) >0){
            $fotos = db::select('SELECT f.*
                                  FROM productos p
                                  INNER JOIN tbl_fotos_productos f ON f.id_producto = p.id
                                  WHERE p.id_item = '.$items[0]->id_item);

            if(sizeof($fotos)>0){
              $fotos = array('foto'=>$fotos[0]->foto);
              $fotos = (object)$fotos; 
              }else{
              $fotos = array('foto'=>'imagen-no-disponible.png');
              $fotos = (object)$fotos;
            }

           }else{
              $fotos = array('foto'=>'imagen-no-disponible.png');
              $fotos = (object)$fotos;
           }         
        
        $options = view('cotizador.detalle',compact('fotos','producto','items'))->render();


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
        
        if($produc->info==7 || $produc->info==4 || $produc->info==6 || $produc->info==8){
          $det = Sub_baldwin::where('id',$produc->selector_mtk)->get();
          $f = Sub_baldwin::where('id',$produc->mortise)->get();
          $style  = Sub_baldwin::where('id',$produc->style)->get();

          if(sizeof($det)>0){
            cotizador_detalle::where('id',$id)
              ->update(['det_grupo'=>$det[0]->selector]); 
          }

          if(sizeof($f)>0){
            cotizador_detalle::where('id',$id)
              ->update(['f_grupo'=>$f[0]->selector]); 
          } 

          if(sizeof($style)>0){
            cotizador_detalle::where('id',$id)
              ->update(['style'=>$style[0]->selector]); 
          }
        }

        cotizador_detalle::where('id',$id)
              ->update(['descripcion'=>$produc->descripcion_mtk,
                        'item_sel'=>$produc->item,
                        'sufijo'=>$produc->sufijo,
                        'info'=>$produc->info]);

        db::update('call proceso_informacion_producto('.$produc->id.','.$id.')');


        if($produc->info==3){
          db::update('call proceso_idfab('.$id.')');
        }
        
        $cotizacion = cotizador::where('id',$num_cotizacion)->get();
        $cotizacion = $cotizacion[0]; 

        $lista = $cotizacion->lista_precio ==null ? 1 : $cotizacion->lista_precio;

        if($produc->fabricante == 76 || $produc->fabricante == 77  ){
          $params =  array($produc->info,$num_cotizacion,$request->producto,$id);
          db::update('call procesos_inserta_elementos(?,?,?,?)',$params); 

          cotizador_detalle::where('id',$id)
                            ->update(['id_fab'=>$produc->codigo_sistema]);

          $elementos = items_productos::where([['id_cotizacion',$num_cotizacion],['id_detalle',$id]])->get();
          $catalog = array(19,20,21,22,23,24,25,26,27);

          foreach($elementos as $ele){
            if(substr_count($ele->elemento,',') == 0){

              $prod = explode('.', $ele->elemento);
              $sufijo = isset($prod[2]) ? $prod[2] :0;
              items_productos::where([['id_cotizacion',$num_cotizacion],['id',$ele->id]])
                              ->update(['item_seleccionado'=>$ele->elemento,
                                        'sufijo'=> $sufijo == '-' ? 0 : $sufijo ,
                                        'item'=>$prod[0]]);

                                    

              // -----------------------

              $datos = items_productos::where([['id_cotizacion',$num_cotizacion],['id',$ele->id]])->get();
              $datos = $datos[0];
              if(!in_array($request->id_catalogo, $catalog)){

                db::update('call actualiza_item('.$ele->id.')');
                $producto = db::select("select * from  productos where item = '".$datos->item."' and ifnull(if(sufijo='-',0,sufijo),0)  = '".$datos->sufijo."'");
          

                if(sizeof($producto)>0){

                    $producto = $producto[0];
                    items_productos::where('id',$ele->id)
                                  ->update(['producto'=>$producto->id]);

                    
                    if($producto->info==3){
                      db::update('call proceso_idfab('.$datos->id_detalle.')');
                    }

                    $factor = db::select("SELECT factor_hc,lp".$lista." as lista FROM fabricantes_costos where id_fabricante=".$producto->fabricante);
                    $factor = $factor[0];

                    if($producto->fabricante==77){
                        
                        $costo = in_array($ele->color,explode(',', $datos->colores_1)) ? $producto->costo_1 :0;
                        if($costo==0){
                            $costo = in_array($ele->color,explode(',', $datos->colores_2)) ? $producto->costo_2 :0;
                        }else if($costo==0){
                            $costo = in_array($ele->color,explode(',', $datos->colores_3)) ? $producto->costo_3 :0;
                        }else if($costo==0){
                            $costo = in_array($ele->color,explode(',', $datos->colores_4)) ? $producto->costo_4 :0;
                        }
                    }

                    $producto_padre = productos::where('id',$datos->id_producto)->get();
                    $producto_padre = $producto_padre[0];

                    $arr = array(9,10,11,12);
                    if($ele->id_catalogo==1){
                        $accion = $producto_padre->exterior_tim_1_accion;
                    }else if($ele->id_catalogo==2){
                        $accion = $producto_padre->int_escutcheon_dep2_accion;
                    }else if($ele->id_catalogo==3){
                        $accion = $producto_padre->knob_lever_dep3_accion;
                    }else if($ele->id_catalogo==4){
                        $accion = $producto_padre->spindle_dep4_accion;
                    }else if($ele->id_catalogo==5){
                        $accion = $producto_padre->cylinder_dep5_accion;
                    }else if($ele->id_catalogo==6){
                        $accion = $producto_padre->mortise_lock_dep6_accion;
                    }else if($ele->id_catalogo==7){
                        $accion = $producto_padre->blocking_dep7_accion;
                    }else if($ele->id_catalogo==8){
                        $accion = $producto_padre->turn_knob8_accion;
                    }else if($ele->id_catalogo==13){
                        $accion = $producto_padre->dep_rossetes_accion;
                    }else if($ele->id_catalogo==14){
                        $accion = $producto_padre->dep_latches_accion;
                    }else if($ele->id_catalogo==15){
                        $accion = $producto_padre->dep_adaptor_accion;
                    }else if($ele->id_catalogo==16){
                        $accion = $producto_padre->dep_spindle_accion;
                    }else if($ele->id_catalogo==17){
                        $accion = $producto_padre->dep_extension_accion;
                    }else if(in_array($ele->id_catalogo,$arr)){
                      $accion = 1;
                    }else{
                      $accion = 0;
                    }
                   
                    
                    items_productos::where('id',$ele->id)
                                    ->update(['idfab'=> str_replace('xxx', $ele->color, $producto->codigo_sistema),
                                              'descripcion'=>$producto->descripcion,
                                              'ctd'=>0,
                                              'lp'=>$costo,
                                              'phc'=>$costo * $factor->factor_hc,
                                              'pvc'=>($costo * $factor->factor_hc )/$factor->lista,
                                              'accion'=>$accion]);
                  }
              }

            }

          }

          // se valida si no existe dependientes 
          if($produc->fabricante == 77 || $produc->fabricante == 76){

            $dep = items_productos::where('id_detalle',$id)->count();
            if($dep == 0){
             
              $factor = db::select("SELECT factor_hc,lp".$lista." as lista FROM fabricantes_costos where id_fabricante=".$produc->fabricante);
              $factor = $factor[0];

              //dd($produc->costo_1 * (1- $factor->factor_hc));
              
              cotizador_detalle::where('id',$id)
                                ->update(['pvc'=>($produc->costo_1 * $factor->factor_hc) / $factor->lista,
                                          'lp'=>$produc->costo_1,
                                          'phc' =>$produc->costo_1 * $factor->factor_hc,
                                          'id_fab'=>$produc->codigo_sistema]);
            }
          }

        }else{
          
            $params =  array($produc->info,$num_cotizacion,$request->producto,$id);
            db::update('call procesos_inserta_elementos(?,?,?,?)',$params); 
          
          
          $factor = db::select("SELECT factor_hc,lp".$lista." as lista FROM fabricantes_costos where id_fabricante=".$produc->fabricante);
          $factor = $factor[0];

          //dd($produc->costo_1 * (1- $factor->factor_hc));
          
          cotizador_detalle::where('id',$id)
                            ->update(['pvc'=>($produc->costo_1 * $factor->factor_hc) * $factor->lista,
                                      'lp'=>$produc->costo_1,
                                      'phc' =>$produc->costo_1 * $factor->factor_hc,
                                      'id_fab'=>$produc->codigo_sistema]);
        }

        $productos = $filtro->detalle_cotizacion($filtro);   
        $estatus = $cotizacion->estatus == '' ? 0 : $cotizacion->estatus;


        $options = view('cotizador.table',compact('productos','cotizacion','num_cotizacion','estatus'))->render();


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

        $estatus = $cotizacion->estatus == '' ? 0 : $cotizacion->estatus;
        
        $options = view('cotizador.table',compact('productos','cotizacion','num_cotizacion','estatus'))->render();

        return json_encode($options); 
    }

    function agregar_dependencia(Request $request){
        $num_cotizacion = $request->session()->get('num_cotizacion');
        
        $cotizacion = cotizador::where('id',$num_cotizacion)->get();
        $cotizacion = $cotizacion[0];
        $item = $request->item;
        $producto = productos::where('id',$item)->get();
        $producto = $producto[0];
        
        $fotos = db::select('SELECT f.*
                                  FROM productos p
                                  INNER JOIN tbl_fotos_productos f ON f.id_producto = p.id
                                  WHERE p.id_item = '.$producto->id_item);
        
        if(sizeof($fotos) ==0){
          $fotos = array('foto'=>'imagen-no-disponible.png');
          $fotos = (object)$fotos;
        }else{
          $fotos = $fotos[0];
        }

        $informacion = informacion_productos::where('id_item',$producto->id_item)->get();

        if(sizeof($informacion)>0){
          $informacion = $informacion[0];  
        }else{
          $$informacion = array();
        }
        
        $dependencias = items_productos::where('id_detalle',$request->id)->orderby('id_catalogo')->get();

        $suma_dependencias = items_productos::where([['id_detalle',$request->id],['accion',1]])
                            ->selectraw('id_detalle,sum(lp * ctd ) as sum_lp, sum(phc * ctd ) as sum_phc, sum(pvc * ctd) as sum_pvc')
                            ->groupby('id_detalle')
                            ->get();

        $detalle = cotizador_detalle::where('id',$request->id)->get();
        $detalle = $detalle[0];

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
        if(sizeof($info_adic)>0){
          $info_adic = $info_adic[0];  
        }else{
          $info_adic = array();
        }

        

        $options = view('cotizador.info_producto',compact('fotos','item','informacion','info_adic','producto','dependencias','suma_dependencias','detalle','cotizacion'))->render();

        return json_encode($options);
    }

    function guarda_info_cotizacion(Request $request){
        $filtro = new cotizador_detalle;
        $num_cotizacion = $request->session()->get('num_cotizacion');

        cotizador_detalle::where('id',$request->id)
                    ->update(['posicion'=>$request->posicion,
                              'descripcion'=>$request->descripcion,
                              'bks'=>$request->bks,
                              'style_sel'=>$request->style,
                              'door_t'=>$request->door_t,
                              'fabricante'=>$request->fabricante,
                              'cantidad'=> $request->cantidad ==''? 0 : str_replace(',', '', $request->cantidad),
                              'mod_precio_unit'=>$request->mod_precio_unit == '' ? 0 : str_replace('$', '',str_replace(',', '', $request->mod_precio_unit)),
                              'mod_cantidad'=> $request->mod_cantidad == '' ? 0 : str_replace(',', '', $request->mod_cantidad),
                              'inst_precio_unit'=>$request->inst_precio_unit == '' ? 0 : str_replace('$', '',str_replace(',', '', $request->inst_precio_unit)),
                              'inv1'=>$request->cantinv1,
                              'inv2'=>$request->cantinv2,
                              'inst_cantidad'=> $request->inst_cantidad == '' ? 0 : str_replace(',', '', $request->inst_cantidad),
                              'handing'=>$request->handing]);

        db::update('CALL proceso_genera_formula('.$request->id.')');

        $filtro->id_cotizacion = $num_cotizacion;
        $productos = $filtro->detalle_cotizacion($filtro);
        $cotizacion = cotizador::where('id',$num_cotizacion)->get();
        $cotizacion = $cotizacion[0];
        $estatus = $cotizacion->estatus == '' ? 0 : $cotizacion->estatus;
        

        $options = view('cotizador.table',compact('productos','cotizacion','num_cotizacion','estatus'))->render();

        return json_encode($options);
    }

    function guardar_descuentos(Request $request){
       $filtro = new cotizador_detalle;
        $num_cotizacion = $request->session()->get('num_cotizacion');
        
        cotizador::where('id',$num_cotizacion)
                    ->update(['descuento_mx'=> $request->descuento_mx ==''? 0 : str_replace('%', '', $request->descuento_mx),
                              'descuento_usa'=>$request->descuento_usa ==''? 0 : str_replace('%', '', $request->descuento_usa),
                              'descuento_mod'=>$request->descuento_mod ==''? 0 : str_replace('%', '', $request->descuento_mod),
                              'iva_mx'=> $request->iva_mx == '' ? 0 : $request->iva_mx,
                              'iva_usa'=> $request->iva_usa == '' ? 0 : $request->iva_usa,
                              'iva_mod'=> $request->iva_mod == '' ? 0 : $request->iva_mod,
                              'flete'=>$request->flete  == '' ? 0 : str_replace('$','', str_replace(',', '', $request->flete))]);

        $filtro->id_cotizacion = $num_cotizacion;
        $productos = $filtro->detalle_cotizacion($filtro);
        $cotizacion = cotizador::where('id',$num_cotizacion)->get();
        $cotizacion = $cotizacion[0];
        $estatus = $cotizacion->estatus == '' ? 0 : $cotizacion->estatus;

        $options = view('cotizador.table',compact('productos','cotizacion','num_cotizacion','estatus'))->render();

        return json_encode($options); 
    }
    
    function guarda_datos(Request $request){
        $filtro = new cotizador_detalle;
        $cotiza = new cotizador;

        $num_cotizacion = $request->session()->get('num_cotizacion');
    
        $cotizacion = cotizador::where('id',$num_cotizacion)->first();
        

        $lista  = $cotizacion->lista_precio ==''? 1 : $cotizacion->lista_precio;

        $item = explode('.', $request->item);
        $sufijo = isset($item[2]) ? $item[2] :0;

        if($request->color !=''){
          $color = $request->color;
        }else if(isset($item[1])){
          $color = $item[1];
        }else{
          $color = '';
        }
        
        $catalog = array(19,20,21,22,23,24,25,26,27,36,37,49,50,51,52,53);

        items_productos::where('id',$request->id)
                        ->update(['item'=>$item[0],
                                 'sufijo'=>$sufijo == '-'? 0 : $sufijo,
                                 'color'=>$color,
                                 'item_seleccionado'=>$request->item]);

        $datos = items_productos::where('id',$request->id)->first();

        if(!in_array($request->id_catalogo, $catalog)){
              db::update('call actualiza_item('.$request->id.')');
              $producto = db::select("select * from  productos where item = '".$datos->item."' and ifnull(if(sufijo='-',0,If(sufijo = '',0,sufijo)),0)  = '".$datos->sufijo."'");
            
              if(sizeof($producto)>0){
                  $producto = $producto[0];
                  items_productos::where('id',$request->id)
                                  ->update(['producto'=>$producto->id]);

                
                  if($producto->info==3){
                      db::update('call proceso_idfab('.$datos->id_detalle.')');
                    }

                    $factor = db::select("SELECT factor_hc,lp".$lista." as lista FROM fabricantes_costos where id_fabricante=".$producto->fabricante);
                    $factor = $factor[0];

                    if($producto->fabricante==77){
                        
                        $costo = in_array($color,explode(',', $datos->colores_1)) ? $producto->costo_1 :0;
                        if($costo==0){
                            $costo = in_array($color,explode(',', $datos->colores_2)) ? $producto->costo_2 :0;
                        }else if($costo==0){
                            $costo = in_array($color,explode(',', $datos->colores_3)) ? $producto->costo_3 :0;
                        }else if($costo==0){
                            $costo = in_array($color,explode(',', $datos->colores_4)) ? $producto->costo_4 :0;
                        }
                      }else if($producto->fabricante == 76 || $producto->info == 8){
                        $costo = $producto->costo_1;
                      }else{
                        $costo = $producto->costo_1;
                      }

                    $producto_padre = productos::where('id',$datos->id_producto)->get();
                    $producto_padre = $producto_padre[0];

                    $arr = array(9,10,11,12,18,28,29,30,31);

                    if($request->id_catalogo==1){
                        $accion = $producto_padre->exterior_tim_1_accion;
                    }else if($request->id_catalogo==2){
                        $accion = $producto_padre->int_escutcheon_dep2_accion;
                    }else if($request->id_catalogo==3){
                        $accion = $producto_padre->knob_lever_dep3_accion;
                    }else if($request->id_catalogo==4){
                        $accion = $producto_padre->spindle_dep4_accion;
                    }else if($request->id_catalogo==5){
                        $accion = $producto_padre->cylinder_dep5_accion;
                    }else if($request->id_catalogo==6){
                        $accion = $producto_padre->mortise_lock_dep6_accion;
                    }else if($request->id_catalogo==7){
                        $accion = $producto_padre->blocking_dep7_accion;
                    }else if($request->id_catalogo==8){
                        $accion = $producto_padre->turn_knob8_accion;
                    }else if($request->id_catalogo==13){
                        $accion = $producto_padre->dep_rossetes_accion;
                    }else if($request->id_catalogo==14){
                        $accion = $producto_padre->dep_latches_accion;
                    }else if($request->id_catalogo==15){
                        $accion = $producto_padre->dep_adaptor_accion;
                    }else if($request->id_catalogo==16){
                        $accion = $producto_padre->dep_spindle_accion;
                    }else if($request->id_catalogo==17){
                        $accion = $producto_padre->dep_extension_accion;
                    }else if(in_array($request->id_catalogo,$arr)){
                      $accion = 1;
                    }else{
                      $accion = 0;
                    }

                  
                    items_productos::where('id',$request->id)
                                ->update(['idfab'=> str_replace('xxx', $color, $producto->codigo_sistema),
                                          'descripcion'=>$producto->descripcion,
                                          'ctd'=>$request->cantidad,
                                          'lp'=>$costo,
                                          'phc'=>$costo * $factor->factor_hc,
                                          'pvc'=>$costo * $factor->lista,
                                          'accion'=>$accion]);
                    if($costo == 0 && ($request->id_catalogo == 12 || $request->id_catalogo == 18)){
                      $alerta = 2;
                    }else{
                      $alerta = 1;  
                    }
                    
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

                $producto_padre = array('info'=>$request->id_info);
                $producto_padre = (object)$producto_padre;

            }

                $producto = $producto_padre;

            }else{

              // valido solo para i5
              if($request->id_catalogo ==19){

                $producto = db::select("select p.*, d.finish as finish_detalle
                                        from cotizacion_detalle d
                                        inner join productos p on p.id = d.item
                                        where d.id = ".$request->id_detalle);
                $producto = $producto[0];


                $factor = db::select("SELECT factor_hc,lp".$lista." as lista FROM fabricantes_costos where id_fabricante=".$producto->fabricante);
                $factor = $factor[0];

                //dd($produc->costo_1 * (1- $factor->factor_hc));
                $sufijo = $request->cantidad > 0  ? 'NRP' : '';
                $costo = str_replace(',','',str_replace('$','',$request->lp)) ;

                $lp = $producto->costo_1;
                $phc = $request->cantidad > 0 ? (($lp * $factor->factor_hc ) + $costo ) * $request->cantidad : $producto->costo_1 * $factor->factor_hc;

                cotizador_detalle::where('id',$request->id_detalle)
                                  ->update(['pvc'=>$phc / $factor->lista,
                                            'lp'=>$lp * $request->cantidad,
                                            'phc' =>$phc,
                                            'id_fab'=>$producto->codigo_sistema,
                                            'sufijo'=>$sufijo]);



                
                items_productos::where('id',$request->id)
                        ->update(['ctd'=>$request->cantidad,
                                  'lp'=>$costo,
                                  'phc'=>$costo ,
                                  'pvc'=>$costo ,
                                  'accion'=>0]);
              }

              // fin i5

              db::update('call proceso_idfab('.$request->id_detalle.')');
              $det = items_productos::where('id',$request->id)->get();
              $det = $det[0];
              
              $producto = productos::where('id',$det->id_producto)->get();
              $producto = $producto[0];
              $alerta = 1;
            }


          db::update('CALL proceso_genera_formula('.$request->id_detalle.')');
          //$dependencias = items_productos::where('id_detalle',$datos->id_detalle)->orderby('id_catalogo')->get();
          //$detalle = cotizador_detalle::where('id',$datos->id_detalle)->get();
          //$detalle = $detalle[0];            


          //$info_adic = db::select('call proceso_informacion_producto('.$producto->id.','.$detalle->id.')');
          //$info_adic = $info_adic[0];

          //$suma_dependencias = $cotiza->suma_dependencias($request->id_detalle);
          /** 
          dd($suma_dependencias);

          $suma_dependencias = items_productos::where([['id_detalle',$datos->id_detalle],['accion',1]])
                          ->selectraw('id_detalle,sum(lp * ctd) as sum_lp, sum(phc * ctd) as sum_phc, sum(pvc * ctd) as sum_pvc')
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
          */
          //$estatus = $cotizacion->estatus == '' ? 0 : $cotizacion->estatus;
          // $informacion = informacion_productos::where('id_item',$producto->id_item)->get();
          //$informacion = $informacion[0];
          
          //$filtro->id_cotizacion = $num_cotizacion;

          $cotiza->id_cotizacion = $num_cotizacion;
          $cotiza->id_detalle = $request->id_detalle;
          
          //$productos = $filtro->detalle_cotizacion($filtro);

          $cotizador_table =  $cotiza->genera_cotizador($cotiza);
          $detalle_head =  $cotiza->detalle_head($cotiza);
          $tabla_dependencia = $cotiza->tabla_dependencia($cotiza);

          //$options3 = view('cotizador.table',compact('productos','cotizacion','num_cotizacion','estatus'))->render();
          //$options2 = view('cotizador.detalle_head',compact('estatus','informacion','info_adic','producto','fotos','detalle','suma_dependencias','cotizacion','dependencias'))->render();
          //$options = view('cotizador.tabla_dependencia',compact('producto','dependencias','suma_dependencias','num_cotizacion','detalle'))->render();

          $arr = array('options'=>$tabla_dependencia,
                       'alerta'=>$alerta,
                       'options2'=>$detalle_head,
                       'options3'=>$cotizador_table,
                       'id_detalle'=>$datos->id_detalle);

          /**
          $options = view('cotizador.tabla_dependencia',compact('producto','dependencias','suma_dependencias','num_cotizacion','detalle'))->render();
          $arr = array('options'=>$options,
                       'alerta'=>$alerta,
                       'id_detalle'=>$datos->id_detalle);*/

          return $arr;

        
        
    }


    function buscar_cliente_proyecto(Request $request){
        $tipo = $request->tipo;
        $num_cotizacion = $request->session()->get('num_cotizacion');
        if($tipo==1){

          $clientes = db::table('proyectos_clientes  as pc')
                        ->join('cliente_participantes as c','pc.id_cliente','c.id')
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

        }else{
          $proyectos = proyectos::where('estatus',1)->get();
          $clientes = cliente_participantes::where('activo',1)->get();

          cotizador::where('id',$num_cotizacion)
                  ->update(['proyecto'=>0,
                            'cliente'=>0]);
        }

        $cotizacion = db::table('cotizacions as c')
                      ->leftjoin('cliente_participantes as p', 'p.id','c.cliente')
                      ->where('c.id',$num_cotizacion)
                      ->selectraw('c.*, p.correo as c_correo')
                      ->first();

        $options = view('cotizador.cliente_proyecto',compact('clientes','proyectos','tipo','cotizacion'))->render();
        return json_encode($options);
    }

    function actualiza_cliente_proyecto(Request $request){
        $tipo = $request->tipo;
        $num_cotizacion = $request->session()->get('num_cotizacion');
        
        cotizador::where('id',$num_cotizacion)
                  ->update(['proyecto'=>$request->proyectos,
                            'cliente'=>$request->clientes]);

        $cotizacion = db::table('cotizacions as c')
                      ->leftjoin('cliente_participantes as p', 'p.id','c.cliente')
                      ->where('c.id',$num_cotizacion)
                      ->selectraw('c.*, p.correo as c_correo')
                      ->first();

        $clientes = db::table('proyectos_clientes as pc')
                        ->join('cliente_participantes as c','pc.id_cliente','c.id')
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
                        ->update(['latch'=>$request->latch_ext,
                                  'det'=> $request->dt_g == '-' ? '' : $request->dt_g,
                                  'f'=>$request->f_g,
                                  'finish'=>$request->finish,
                                  'nrp'=>$request->nrp,
                                  'sufijo'=> $request->nrp == 1 ? 'NRP':'']); 
                        //'handing'=>$request->handing,
        /* Asignar precios */

        $cotizacion = cotizador::where('id',$num_cotizacion)->get();
        $cotizacion = $cotizacion[0];

        $lista  = $cotizacion->lista_precio ==''? 1 :$cotizacion->lista_precio;
        $det = cotizador_detalle::where('id',$request->id_detalle)->get();
        $producto = productos::where('id',$det[0]->item)->get();
        $producto = $producto[0];  

        if($producto->info==3){
          db::update('call proceso_idfab('.$request->id_detalle.')');
        }

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
          }else if($producto->fabricante == 76 and $producto->info == 7 or $producto->info == 5 or $producto->info == 4 or $producto->info == 6){
            $dterminantes  = array('EMP', 'C', 'BTB','BB','DD');

            if(in_array($request->dt_g, $dterminantes)){
              $costo = $producto->costo_2;
            }else{
              $costo = $producto->costo_1;
            }

            if($request->latch_ext==1){
              $costo = $costo + 5;
            }
          }
          

        //if($producto->info != 4){
          $factor_hc = $costo * $factor->factor_hc;
          $factor_hc =  $request->nrp == 1 ? $factor_hc + 5 : $factor_hc ;
          cotizador_detalle::where('id',$request->id_detalle)
                          ->update(['lp'=> $costo ,
                                    'phc'=> $factor_hc,
                                    'pvc'=> $factor_hc/$factor->lista]);
          //}
        /* Fin lista de precios */
        //$item = $request->item;

        
        $detalle = cotizador_detalle::where('id',$request->id_detalle)->get();

        $informacion = informacion_productos::where('id_item',$producto->id_item)->get();
        $informacion = $informacion[0];

        if($producto->id >0){
            $fotos = db::select('SELECT f.*
                                  FROM productos p
                                  INNER JOIN tbl_fotos_productos f ON f.id_producto = p.id
                                  WHERE p.id_item = '.$producto->id_item);

            if(sizeof($fotos)>0){
              $fotos = array('foto'=>$fotos[0]->foto);
              $fotos = (object)$fotos; 
              }else if(sizeof($fotos) ==0 ){

                $fotos = db::table('tbl_fotos_productos as p')
                            ->join('productos as t','t.id','p.id')
                            ->where('t.id_item',$producto)
                            ->selectraw('p.*')
                            ->get();

                //$fotos = tbl_fotos_productos::where('id_producto',$items[0]->id)->get();   
                if(sizeof($fotos) ==0 ){

                  $fotos = array('foto'=>'imagen-no-disponible.png');
                  $fotos = (object)$fotos;  
                }
              }
           }else{
              $fotos = array('foto'=>'imagen-no-disponible.png');
              $fotos = (object)$fotos;
           }    



        /**
        $info_adic = db::select('call proceso_informacion_producto('.$producto->id.','.$request->id_detalle.')');
        $info_adic = $info_adic[0]; */
        db::update('call proceso_idfab('.$request->id_detalle.')');
        db::update('CALL proceso_genera_formula('.$request->id_detalle.')');

        $detalle = cotizador_detalle::where('id',$request->id_detalle)->get();
        $detalle = $detalle[0];
        
        $suma_dependencias = items_productos::where([['id_detalle',$request->id_detalle],['accion',1]])
                            ->selectraw('id_detalle,sum(lp * ctd ) as sum_lp, sum(phc * ctd ) as sum_phc, sum(pvc * ctd) as sum_pvc')
                            ->groupby('id_detalle')
                            ->get();
        
        if(sizeof($suma_dependencias)==0){
          $suma_dependencias =  array('id_detalle' => $request->id,
                                      'sum_lp'=>0,
                                      'sum_phc'=>0,
                                      'sum_pvc'=>0);
          $suma_dependencias = (object)$suma_dependencias;
        }else{
          $suma_dependencias  = $suma_dependencias[0];  
        }
        

        $estatus = $cotizacion->estatus == '' ? 0 : $cotizacion->estatus;
        $options = view('cotizador.detalle_head',compact('estatus','informacion','info_adic','producto','fotos','detalle','suma_dependencias','cotizacion'))->render();
        
        $productos = $filtro->detalle_cotizacion($filtro);   
        /** $cotizacion = cotizador::where('id',$num_cotizacion)->get();
        $cotizacion = $cotizacion[0]; 
        $estatus = 0; */
        $options2 = view('cotizador.table',compact('estatus','productos','cotizacion','num_cotizacion'))->render();

        $arr = array('options'=>$options,
                     'options2'=>$options2);
        
        return $arr;
    }


    function enviar_cotizacion(Request $request){
      $num_cotizacion = $request->session()->get('num_cotizacion');

      if($request->tipo == 1){
         cotizador::where('id',$request->id_cotizacion)
                  ->update(['enviado'=>1]);
          $request->session()->forget('num_cotizacion');
          return 1;
      }else if($request->tipo ==2){
          $filtro = new cotizador_detalle;
          $filtro->num_cotizacion = $num_cotizacion;

          $cotizacion = cotizador_detalle::where('id_cotizacion',$num_cotizacion)
                        ->selectraw('id_cotizacion,  ifnull(max(mod_cantidad),0) AS modificacion, ifnull(max(inst_cantidad),0) AS instalacion')
                        ->groupby('id_cotizacion')
                        ->first();          
          //$attachment = [];
                 
          if($cotizacion->modificacion > 1 ){
            $filtro->tipo = 3;

            Storage::delete('PDF/Cotizacion_Modificacion_'.$num_cotizacion.'.pdf');          
            $pdf = $filtro->generar_pdf($filtro);  
            Storage::put('PDF/Cotizacion_Modificacion_'.$num_cotizacion.'.pdf', $pdf->output());
            $attachment = ['storage/PDF/Cotizacion_Modificacion_'.$num_cotizacion.'.pdf',];
            //array_push($attachment,Storage::url('PDF/Cotizacion_Modificacion_'.$num_cotizacion.'.pdf'));
          }else{
            $filtro->tipo = 1;

            Storage::delete('PDF/Cotizacion_'.$num_cotizacion.'.pdf');          
            $pdf = $filtro->generar_pdf($filtro);
            Storage::put('PDF/Cotizacion_'.$num_cotizacion.'.pdf', $pdf->output());
            $attachment = ['storage/PDF/Cotizacion_'.$num_cotizacion.'.pdf',];
            //array_push($attachment,Storage::url('PDF/Cotizacion_'.$num_cotizacion.'.pdf'));
          }

          //dd(Storage::url('PDF/Cotizacion_Modificacion_'.$num_cotizacion.'.pdf'));

          if($cotizacion->instalacion > 0){
            $filtro->tipo = 2;

            $pdf = $filtro->generar_pdf($filtro);     
            //Storage::delete('Cotizacion_Instalacion_'.$num_cotizacion.'.pdf');                             
            Storage::put('storage/PDF/Cotizacion_Instalacion_'.$num_cotizacion.'.pdf', $pdf->output());
            array_push($attachment,'storage/PDF/Cotizacion_Instalacion_'.$num_cotizacion.'.pdf');
          }

          $to = 'salvador@altermedia.mx';
          $subjects = "Cotización HardwareCollection";
          $content = '';
          $var = '';
          $var2 = '';
          $vista = 'cotizador.mailCotizacion';
          
          $attachment = $attachment;
          //dd($attachment);

          $copia = 'cesilia@hardwarecollection.mx';
          Mail::to($to)->cc($copia)->send(new EnvioFlux($subjects, $content,$attachment, $var,$var2, $vista));   

          //$pdf = $filtro->generar_pdf($filtro);
          
          //$pdf->download('PDF/Cotizacion_'.$request->id_cotizacion.'.pdf');
          //Storage::put('PDF/Cotizacion_'.$request->id_cotizacion.'.pdf', $pdf->output());
          #Storage::delete('Cotizacion_'.$num_cotizacion.'.pdf');

          #cotizador::where('id',$request->id_cotizacion)->update(['enviado'=>2]);
  
      }

     return 1;
    }

   

     function elimina_cotizacion(Request $request){
       DB::table('cotizacions')->delete($request['id']);
        $cotizaciones = db::select("CALL listado_cotizacion(0)");
        $options = view('cotizador.lista',compact('cotizaciones'))->render();

        return json_encode($options);
    }

     function  actualiza_cots(Request $request){

      $cotizaciones = db::select("CALL listado_cotizacion(0)");
        $options = view('cotizador.lista',compact('cotizaciones'))->render();

        return json_encode($options);

    }

     function guarda_cot_not(Request $request){

        cotizador::where('id',$request->id_cot)
                  ->update(['notas'=>$request->nota]);


    }

    function duplica_cotizacion(Request $request){
      
      
      db::update('CALL proceso_duplica_cotizacion('.$request->id_cotizacion.')');
      
      $cotizaciones = db::select("CALL listado_cotizacion(0)");
      $options =   view('cotizador.cotizaciones',compact('cotizaciones'))->render();

      return json_encode($options);
    }

  function ver_imagen(Request $request){
     $fotos = db::select('SELECT f.*
                                  FROM productos p
                                  INNER JOIN tbl_fotos_productos f ON f.id_producto = p.id
                                  WHERE p.id_item = '.$request->id_item);

    if(sizeof($fotos)>0){
      $fotos = array('foto'=>$fotos[0]->foto);
      $fotos = (object)$fotos; 
      }else{
      $fotos = array('foto'=>'imagen-no-disponible.png');
      $fotos = (object)$fotos;
    }

    $options = "<div class='col-md-12'><img src='storage/".$fotos->foto."' /></div>";

    return json_encode($options);
  }

  function actualiza_finish(Request $request){
        $filtro = new cotizador_detalle;
        $elementos = items_productos::where([['id_cotizacion',$request->id_cotizacion],['id_detalle',$request->id_detalle],['item','!=',''],['colores_gral','!=','']])
                                  ->whereIn('id_catalogo', array(1, 2, 3, 4, 13, 14))
                                  ->get();

        $cotizacion = cotizador::where('id',$request->id_cotizacion)->get();
        $cotizacion = $cotizacion[0];

        $lista  = $cotizacion->lista_precio =='' ? 1 : $cotizacion->lista_precio;

      foreach($elementos as $e){
          $producto = productos::where('id',$e->producto)->get();
          $producto = $producto[0];

          $costo = in_array($request->finish,explode(',', $e->colores_1)) ? $producto->costo_1 :0;
          if($costo==0){
              $costo = in_array($request->finish,explode(',', $e->colores_2)) ? $producto->costo_2 :0;
          }else if($costo==0){
              $costo = in_array($request->finish,explode(',', $e->colores_3)) ? $producto->costo_3 :0;
          }else if($costo==0){
              $costo = in_array($request->finish,explode(',', $e->colores_4)) ? $producto->costo_4 :0;
          }
        

          $factor = db::select("SELECT factor_hc,lp".$lista." as lista FROM fabricantes_costos where id_fabricante=".$producto->fabricante);
          $factor = $factor[0];

        items_productos::where('id',$e->id)
              ->update(['lp'=>$costo,
                        'color'=>$request->finish,
                        'phc'=>$costo * $factor->factor_hc,
                        'pvc'=>($costo * $factor->factor_hc) / $factor->lista]);
      }
        $producto = productos::where('id',$elementos[0]->id_producto)->get();
        $producto = $producto[0];
        $informacion = informacion_productos::where('id_item',$producto->id_item)->get();
        $info_adic = db::select('call proceso_informacion_producto('.$producto->id.','.$request->id_detalle.')');
        $info_adic = $info_adic[0];

        //dd($info_adic);

        if(sizeof($informacion)>0){
          $informacion = $informacion[0];  
        }else{
          $$informacion = array();
        }
         
        $fotos = db::select('SELECT f.*
                              FROM productos p
                              INNER JOIN tbl_fotos_productos f ON f.id_producto = p.id
                              WHERE p.id_item = '.$producto->id_item);

        if(sizeof($fotos)>0){
            $fotos = array('foto'=>$fotos[0]->foto);
            $fotos = (object)$fotos; 
          }else{
            $fotos = array('foto'=>'imagen-no-disponible.png');
            $fotos = (object)$fotos;
          }

        $detalle = cotizador_detalle::where('id',$request->id_detalle)->get();
        $detalle = $detalle[0];
//        dd($detalle);

        $suma_dependencias = items_productos::where([['id_detalle',$request->id_detalle],['accion',1]])
                            ->selectraw('id_detalle,sum(lp * ctd ) as sum_lp, sum(phc * ctd ) as sum_phc, sum(pvc * ctd) as sum_pvc')
                            ->groupby('id_detalle')
                            ->get();
        if(sizeof($suma_dependencias)==0){
          $suma_dependencias =  array('id_detalle' => $request->id_detalle,
                                      'sum_lp'=>0,
                                      'sum_phc'=>0,
                                      'sum_pvc'=>0);
          $suma_dependencias = (object)$suma_dependencias;
        }else{
          $suma_dependencias  = $suma_dependencias[0];  
        }
        
        
        $estatus = $cotizacion->estatus == '' ? 0 : $cotizacion->estatus;
        $options = view('cotizador.detalle_head',compact('estatus','informacion','info_adic','producto','fotos','detalle','suma_dependencias','cotizacion'))->render();
        
        $dependencias = items_productos::where('id_detalle',$request->id_detalle)->orderby('id_catalogo')->get();
        $num_cotizacion = $request->id_cotizacion;
        $options2 = view('cotizador.tabla_dependencia',compact('producto','dependencias','suma_dependencias','num_cotizacion','detalle'))->render();

        $arr = array('options'=>$options,
                     'options2'=>$options2);
        
        return $arr;

  }

      

  function enviar_abatimiento(Request $request){

      $content = "Ingrese a la siguiente link  y valide los Abatimientos de las puertas donde se instalarán las chapas.
                  Una vez validado procederemos con su compra.
                  - Gracias. ";

      $subjects = "Configuracion abatimientos";
      $abtimiento = Abatimientos::where('id_cotizacion',$request->id_cotizacion)->get();
      //$to = "jacob.mendozaha@gmail.com";
      $ciphering = "AES-128-CTR"; 

      cotizador::where('id',$request->id_cotizacion)->update(['abatimiento'=>0,'email_enviado'=>$request->email]);
  
      // Use OpenSSl Encryption method 
      $iv_length = openssl_cipher_iv_length($ciphering); 
      $options = 0; 
        
      // Non-NULL Initialization Vector for encryption 
      $encryption_iv = '1234567891011121'; 
        
      // Store the encryption key 
      $encryption_key = "Snap2021"; 
        
      // Use openssl_encrypt() function to encrypt the data 
      $var = openssl_encrypt($request->id_cotizacion, $ciphering, 
                  $encryption_key, $options, $encryption_iv); 

      #$to = $cotizacion->correo_compra;
      $to = $request->email;
      $vista = 'cotizador.mailEnvio';
      
      $attachment = [ 
      // Storage::url('Cotizacion_'.$num_cotizacion.'.pdf'),
       ];

      Mail::to($to)->send(new EnvioFlux($subjects, $content,$attachment, $var,$abtimiento,$vista));   
    

    return 1;
  }

  function busqueda_productos(Request $request){
    $filtro = new cotizador_detalle;
    $filtro->buscar = $request->consulta;

    $filtros_select = $filtro->filtros($filtro);
    $options =  "";
    if($request->consulta != ''){
      if(sizeof($filtros_select) > 0 ){
        foreach ($filtros_select as $s) {
          $sufijo = $s->sufijo != '' ? ' - ' .$s->sufijo :'';
          $desc = $s->descripcion != '' ? ' - '.$s->descripcion : '';
          $options .= "<span style='cursor: pointer;' class='hover' onclick=cacha(".$s->id_producto.") >".$s->item . $sufijo ." ".$desc ."</span><br/>";
        }
      }else{
        $options = "No se encontraron resultados";
      }  
    }
    
    return $options;
  }

  function elimina_libre(Request $request){
        $cotiza = new cotizador;
        $num_cotizacion = $request->session()->get('num_cotizacion');

        items_productos::where('id',$request->id)
                  ->update(['item_seleccionado'=>'',
                            'item'=>'',
                            'producto'=>0,
                            'idfab'=>'',
                            'descripcion'=>'',
                            'ctd'=>0,
                            'lp'=>0,
                            'phc'=>0,
                            'pvc'=>0]);
          
          $cotiza->id_cotizacion = $num_cotizacion;
          $cotiza->id_detalle = $request->id_detalle;

          $cotizador_table =  $cotiza->genera_cotizador($cotiza);
          $detalle_head =  $cotiza->detalle_head($cotiza);
          $tabla_dependencia = $cotiza->tabla_dependencia($cotiza);
          $alerta = 0;
          $arr = array('options'=>$tabla_dependencia,
                       'alerta'=>$alerta,
                       'options2'=>$detalle_head,
                       'options3'=>$cotizador_table,
                       'id_detalle'=>$request->id_detalle);

          return $arr;
  }

  function configura_inventario(Request $request){

    $options = view('cotizador.inventario')->render();

    return json_encode($options);
  }

  function regresar_cotizacion(Request $request){
    cotizador::where('id',$request->id_cotizacion)->update(['estatus'=>0,'id_occ'=>null,'fecha'=>null]);
    return redirect()->route('cotizador.lista');     
  }

}



