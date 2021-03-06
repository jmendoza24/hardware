<?php

namespace App\Http\Controllers;
use App\Models\Fabricantes;
use App\Models\catalogos;
use App\Models\familia;
use App\Models\categoria;
use App\Models\subcategorias;
use App\Models\disenio;
use App\Models\Sub_baldwin;
use App\Models\sufijos;
use App\Models\item;
use App\Models\listado_vistas;
use App\Models\listado_vistas_elementos;
use App\Models\productos_temporal;
use App\Models\tipo_cliente;
use App\Models\tipo_proyecto;
use App\Models\cotizador;
use App\Models\cliente_participantes;
use App\Models\cotizador_detalle;
use App\Models\Clientes;
use App\Models\tbl_fotos_productos;
use App\Http\Requests\CreatecatalogosRequest;
use App\Http\Requests\UpdatecatalogosRequest;
use App\Repositories\catalogosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use View;
use DB;

set_time_limit(0);

class catalogosController extends AppBaseController
{
    /** @var  catalogosRepository */
    private $catalogosRepository;

    public function __construct(catalogosRepository $catalogosRepo)
    {
        $this->catalogosRepository = $catalogosRepo;
    }

    /**
     * Display a listing of the catalogos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request){
        $catalogos = new catalogos;

        $fabricantes = Fabricantes::orderby('fabricante')->get();
        $catalogos = $catalogos->lista_catalogo();

        return view('catalogos.index',compact('catalogos', 'fabricantes'));
    }

    function get_municipios(Request $request){
        $catalogos = new catalogos; 
        $catalogos->id_estado = $request->id_estado;

        $municipios = $catalogos->get_municipios($catalogos);
        return $municipios; 
    }

    function dependencia(Request $request){
      $listado_vistas = listado_vistas::get();
      
      return view('productos.dependencias',compact('listado_vistas'));
    }


    function catalogos_generales(Request $request){


      $data= DB::select("SELECT * FROM tbl_datos_generales");
      $data=$data[0];
     
      return view('productos.generales',compact('data'));
    }


    function guarda_generales(Request $request){

      
            DB::table('tbl_datos_generales') 
                ->update(
                            array('condiciones' => $request['condiciones'],
                                  'notas' => $request['notas'],
                                  'cuentas' => $request['cuentas']
                              )
                );
    }


    
    
    
    function opciones_catalogo(Request $request){
        $fabricantes = Fabricantes::orderby('fabricante')->get();
        if($request->catalogo ==1){
            if($request->tipo==1){
                $catalogos = array('id'=>0,
                                   'fabricante'=>$request->fabricante,
                                   'catalogo'=>'',
                                   'abrev'=>'');
                $catalogos = (object)$catalogos;
            }else if($request->tipo==2){
                $catalogos = catalogos::where('id',$request->id)->get();
                $catalogos = $catalogos[0];
            }
            $options =  view('catalogos.create',compact('fabricantes','catalogos'))->render();
        }else if($request->catalogo ==2){
            if($request->tipo==1){
                $familias = array('id'=>0,
                                   'fabricante'=>$request->fabricante,
                                   'catalogo'=>$request->catalogos,
                                   'familia'=>'');
                $familias = (object)$familias;

            }else if($request->tipo==2){
                $familias = familia::where('id',$request->id)->get();
                $familias = $familias[0];
            }
            

            $options =  view('familias.create',compact('fabricantes','familias'))->render();
        }else if($request->catalogo ==3){
            if($request->tipo==1){
                $categorias = array('id'=>0,
                                   'fabricante'=>$request->fabricante,
                                   'catalogo'=>$request->catalogos,
                                   'familia'=>$request->familia,
                                   'categoria'=>'');
                $categorias = (object)$categorias;

            }else if($request->tipo==2){
                $categorias = categoria::where('id',$request->id)->get();
                $categorias = $categorias[0];
                
            }
            

            $options =  view('categorias.create',compact('fabricantes','categorias'))->render();
        }else if($request->catalogo ==4){
            if($request->tipo==1){
                $subcategorias = array('id'=>0,
                                    'fabricante'=>$request->fabricante,
                                    'catalogo'=>$request->catalogos,
                                    'familia'=>$request->familia,
                                    'categoria'=>$request->categoria,
                                    'subcategoria'=>'');
                $subcategorias = (object)$subcategorias;

            }else if($request->tipo==2){
                $subcategorias = subcategorias::where('id',$request->id)->get();
                $subcategorias = $subcategorias[0];
            }
            

            $options =  view('subcategorias.create',compact('fabricantes','subcategorias'))->render();
        }else if($request->catalogo ==5){
            if($request->tipo==1){
                $disenios = array('id'=>0,
                                   'fabricante'=>'',
                                   'disenio'=>'');
                $disenios = (object)$disenios;

            }else if($request->tipo==2){
                $disenios = disenio::where('id',$request->id)->get();
                $disenios = $disenios[0];
            }

            $options =  view('disenios.create',compact('fabricantes','disenios'))->render();
        }else if($request->catalogo ==6){
          $variable  =  array(1=>'Sufijo',2=>'Grupo sufijo', 3=>'Style 1', 4=>'Style 2', 5=>'Style 3', 6=>'Latch', 7=>'Strike', 8=>'Cylinder', 9=>'Keying', 10=>'DC1 BWN1',
                            11=>'DC2 BWN2',12=>'DC3 BWN3', 13=>'DC4 BWN4', 14=>'DP', 15=>'EXTERIOR TRIM  DEP 1', 16=>'EXTERIOR TRIM  DEP 1 ACCION', 17=>'INTERIOR ESCUTCHEON  DEP 2', 
                            18=>'INTERIOR ESCUTCHEON  DEP 2 ACCION', 19=>'KNOB / LEVER  DEP 3', 20=>'KNOB / LEVER  DEP 3 ACCION', 21=>'SPINDLE  DEP 4', 22=>'SPINDLE  DEP 4 ACCION',
                            23=>'CYLINDER   DEP 5', 24=>'CYLINDER   DEP 5 ACCION', 25=>'MORTISE LOCK  DEP 6', 26=>'MORTISE LOCK  DEP 6 ACCION', 27=>'BLOCKING RING  DEP 7',
                            28=>'BLOCKING RING  DEP 7 ACCION', 29=>'TURN KNOB / ADAPTOR DEP 8', 30=>'TURN KNOB / ADAPTOR DEP 8 ACCION', 31=>'DEP 9 ',32=>'DEP 9 ACCION',
                            33=>'DEP 10 HC LIBRES ', 34=>'DEP 10 HC LIBRES ACCION', 35=>'DEP 11 HC LIBRES', 36=>'DEP 11 HC LIBRES ACCION', 37=>'DEP 12 HC LIBRES', 38=>'DEP 12 HC LIBRES ACCION',
                            39=>'DEP ROSETTES', 40=>'DEP ROSETTES ACCION', 41=>'DEP LATCHES', 42=>'DEP LATCHES ACCION', 43=>'DEP ADAPTOR ', 44=>'DEP ADAPTOR ACCION', 45=>'DEP SPINDLE', 46 =>'DEP SPINDLE ACCION',
                            47=>'DEP EXT BUTTON',48=>'DEP EXT BUTTON ACCION',49=>'Finish INT');
          $variable = (object)$variable;

            if($request->tipo==1){
                $selectores = array('id'=>0,
                                   'variable'=>'',
                                   'fabricante'=>77,
                                   'subcatalogo'=>'',
                                   'selector'=>'');
                $selectores = (object)$selectores;

            }else if($request->tipo==2){
                $selectores = sub_baldwin::where('id',$request->id)->get();
                $selectores = $selectores[0];

                if($selectores->fabricante==77){
                  $variable  =  array(1=>'Sufijo',2=>'Grupo sufijo', 3=>'Style 1', 4=>'Style 2', 5=>'Style 3', 6=>'Latch', 7=>'Strike', 8=>'Cylinder', 9=>'Keying', 10=>'DC1 BWN1',
                            11=>'DC2 BWN2',12=>'DC3 BWN3', 13=>'DC4 BWN4', 14=>'DP', 15=>'EXTERIOR TRIM  DEP 1', 16=>'EXTERIOR TRIM  DEP 1 ACCION', 17=>'INTERIOR ESCUTCHEON  DEP 2', 
                            18=>'INTERIOR ESCUTCHEON  DEP 2 ACCION', 19=>'KNOB / LEVER  DEP 3', 20=>'KNOB / LEVER  DEP 3 ACCION', 21=>'SPINDLE  DEP 4', 22=>'SPINDLE  DEP 4 ACCION',
                            23=>'CYLINDER   DEP 5', 24=>'CYLINDER   DEP 5 ACCION', 25=>'MORTISE LOCK  DEP 6', 26=>'MORTISE LOCK  DEP 6 ACCION', 27=>'BLOCKING RING  DEP 7',
                            28=>'BLOCKING RING  DEP 7 ACCION', 29=>'TURN KNOB / ADAPTOR DEP 8', 30=>'TURN KNOB / ADAPTOR DEP 8 ACCION', 31=>'DEP 9 ',32=>'DEP 9 ACCION',
                            33=>'DEP 10 HC LIBRES ', 34=>'DEP 10 HC LIBRES ACCION', 35=>'DEP 11 HC LIBRES', 36=>'DEP 11 HC LIBRES ACCION', 37=>'DEP 12 HC LIBRES', 38=>'DEP 12 HC LIBRES ACCION',
                            39=>'DEP ROSETTES', 40=>'DEP ROSETTES ACCION', 41=>'DEP LATCHES', 42=>'DEP LATCHES ACCION', 43=>'DEP ADAPTOR ', 44=>'DEP ADAPTOR ACCION', 45=>'DEP SPINDLE', 46 =>'DEP SPINDLE ACCION',
                            47=>'DEP EXT BUTTON',48=>'DEP EXT BUTTON ACCION',49=>'Finish INT');

                }else if($selectores->fabricante==76){
                  $variable=array(1=>'DC', 2=>'MORTISE', 3=>'FMM1', 4=>'STEM', 5=>'FMM2', 6=>'HANDLE', 7=>'FMM3', 8=>'WHEEL', 9=>'FASTENER', 10=>'STYLE', 11=>'FINISH-EMK');
                }else if($selectores->id_fabricante==0){
                    $variable=array(1=>'BACKSET',2=>'HANDING');
                }

                $variable  = (object)$variable;
            }

            $options =  view('sub_baldwins.create',compact('selectores','variable'))->render();
        }else if($request->catalogo ==7){
          $variable=array(1=>'DC', 2=>'MORTISE', 3=>'FMM1', 4=>'STEM', 5=>'FMM2', 6=>'HANDLE', 7=>'FMM3', 8=>'WHEEL', 9=>'FASTENER', 10=>'STYLE', 11=>'FINISH-EMK');
          $variable  = (object)$variable;

            if($request->tipo==1){
                $selectores = array('id'=>0,
                                   'variable'=>'',
                                   'fabricante'=>76,
                                   'subcatalogo'=>'',
                                   'selector'=>'');
                $selectores = (object)$selectores;

            }else if($request->tipo==2){
                $selectores = sub_baldwin::where('id',$request->id)->get();
                $selectores = $selectores[0];
                if($selectores->fabricante==77){
                  $variable  =  array(1=>'Sufijo',2=>'Grupo sufijo', 3=>'Style 1', 4=>'Style 2', 5=>'Style 3', 6=>'Latch', 7=>'Strike', 8=>'Cylinder', 9=>'Keying', 10=>'DC1 BWN1',
                            11=>'DC2 BWN2',12=>'DC3 BWN3', 13=>'DC4 BWN4', 14=>'DP', 15=>'EXTERIOR TRIM  DEP 1', 16=>'EXTERIOR TRIM  DEP 1 ACCION', 17=>'INTERIOR ESCUTCHEON  DEP 2', 
                            18=>'INTERIOR ESCUTCHEON  DEP 2 ACCION', 19=>'KNOB / LEVER  DEP 3', 20=>'KNOB / LEVER  DEP 3 ACCION', 21=>'SPINDLE  DEP 4', 22=>'SPINDLE  DEP 4 ACCION',
                            23=>'CYLINDER   DEP 5', 24=>'CYLINDER   DEP 5 ACCION', 25=>'MORTISE LOCK  DEP 6', 26=>'MORTISE LOCK  DEP 6 ACCION', 27=>'BLOCKING RING  DEP 7',
                            28=>'BLOCKING RING  DEP 7 ACCION', 29=>'TURN KNOB / ADAPTOR DEP 8', 30=>'TURN KNOB / ADAPTOR DEP 8 ACCION', 31=>'DEP 9 ',32=>'DEP 9 ACCION',
                            33=>'DEP 10 HC LIBRES ', 34=>'DEP 10 HC LIBRES ACCION', 35=>'DEP 11 HC LIBRES', 36=>'DEP 11 HC LIBRES ACCION', 37=>'DEP 12 HC LIBRES', 38=>'DEP 12 HC LIBRES ACCION',
                            39=>'DEP ROSETTES', 40=>'DEP ROSETTES ACCION', 41=>'DEP LATCHES', 42=>'DEP LATCHES ACCION', 43=>'DEP ADAPTOR ',44=>'DEP ADAPTOR ACCION', 45=>'DEP SPINDLE', 46 =>'DEP SPINDLE ACCION',
                            47=>'DEP EXT BUTTON',48=>'DEP EXT BUTTON ACCION',49=>'Finish INT');

                }else if($selectores->fabricante==76){
                  $variable=array(1=>'DC', 2=>'MORTISE', 3=>'FMM1', 4=>'STEM', 5=>'FMM2', 6=>'HANDLE', 7=>'FMM3', 8=>'WHEEL', 9=>'FASTENER', 10=>'STYLE', 11=>'FINISH-EMK');
                }else if($selectores->id_fabricante==0){
                    $variable=array(1=>'BACKSET',2=>'HANDING');
                }
                
            }

            $options =  view('sub_baldwins.create',compact('selectores','variable'))->render();
        }else if($request->catalogo ==8){
            $categorias = categoria::orderby('categoria')->get();
            
            if($request->tipo==1){
                $sufijos = array('id'=>0,
                                 'categoria'=>0,
                                 'subcategoria'=>0,
                                 'sufijo'=>'');
                $sufijos = (object)$sufijos;
                $subcategorias = array();    
            }else if($request->tipo==2){
                $sufijos = sufijos::where('id',$request->id)->get();
                $sufijos = $sufijos[0];
                $subcategorias = subcategorias::where('categoria',$sufijos->categoria)->orderby('subcategoria')->get();
            }

            $options =  view('sufijos.create',compact('sufijos','categorias','subcategorias'))->render();
        }else if($request->catalogo ==9){

            if($request->tipo==1){
                $disenios = array('id'=>0,
                                 'subcategoria'=>$request->subcategoria,
                                 'disenio'=>'');
                $disenios = (object)$disenios;    
            }else if($request->tipo==2){
                $disenios = disenio::where('id',$request->id)->get();
                $disenios = $disenios[0];
            }

            $options =  view('disenios.create',compact('disenios'))->render();
        }else if($request->catalogo ==10){

            if($request->tipo==1){
                $items = array('id'=>0,
                                 'disenio'=>$request->disenio,
                                 'item'=>'');
                $items = (object)$items;    
            }else if($request->tipo==2){
                $items = item::where('id',$request->id)->get();
                $items = $items[0];
            }

            $options =  view('items.create',compact('items'))->render();
        }else if($request->catalogo ==11){
            $options =  view('productos.show')->render();
        }else if($request->catalogo ==12){
          $variable=array(1=>'BACKSET',2=>'HANDING');
          $variable  = (object)$variable;

            if($request->tipo==1){
                $selectores = array('id'=>0,
                                   'variable'=>'',
                                   'fabricante'=>0,
                                   'subcatalogo'=>'',
                                   'selector'=>'');
                $selectores = (object)$selectores;

            }else if($request->tipo==2){
                $selectores = sub_baldwin::where('id',$request->id)->get();
                $selectores = $selectores[0];
                
                if($selectores->fabricante==77){
                  $variable  =  array(1=>'Sufijo',2=>'Grupo sufijo', 3=>'Style 1', 4=>'Style 2', 5=>'Style 3', 6=>'Latch', 7=>'Strike', 8=>'Cylinder', 9=>'Keying', 10=>'DC1 BWN1',
                            11=>'DC2 BWN2',12=>'DC3 BWN3', 13=>'DC4 BWN4', 14=>'DP', 15=>'EXTERIOR TRIM  DEP 1', 16=>'EXTERIOR TRIM  DEP 1 ACCION', 17=>'INTERIOR ESCUTCHEON  DEP 2', 
                            18=>'INTERIOR ESCUTCHEON  DEP 2 ACCION', 19=>'KNOB / LEVER  DEP 3', 20=>'KNOB / LEVER  DEP 3 ACCION', 21=>'SPINDLE  DEP 4', 22=>'SPINDLE  DEP 4 ACCION',
                            23=>'CYLINDER   DEP 5', 24=>'CYLINDER   DEP 5 ACCION', 25=>'MORTISE LOCK  DEP 6', 26=>'MORTISE LOCK  DEP 6 ACCION', 27=>'BLOCKING RING  DEP 7',
                            28=>'BLOCKING RING  DEP 7 ACCION', 29=>'TURN KNOB / ADAPTOR DEP 8', 30=>'TURN KNOB / ADAPTOR DEP 8 ACCION', 31=>'DEP 9 ',32=>'DEP 9 ACCION',
                            33=>'DEP 10 HC LIBRES ', 34=>'DEP 10 HC LIBRES ACCION', 35=>'DEP 11 HC LIBRES', 36=>'DEP 11 HC LIBRES ACCION', 37=>'DEP 12 HC LIBRES', 38=>'DEP 12 HC LIBRES ACCION',
                            39=>'DEP ROSETTES', 40=>'DEP ROSETTES ACCION', 41=>'DEP LATCHES', 42=>'DEP LATCHES ACCION', 43=>'DEP ADAPTOR ',44=>'DEP ADAPTOR ACCION', 45=>'DEP SPINDLE', 46 =>'DEP SPINDLE ACCION',
                            47=>'DEP EXT BUTTON',48=>'DEP EXT BUTTON ACCION',49=>'Finish INT');

                }else if($selectores->fabricante==76){
                  $variable=array(1=>'DC', 2=>'MORTISE', 3=>'FMM1', 4=>'STEM', 5=>'FMM2', 6=>'HANDLE', 7=>'FMM3', 8=>'WHEEL', 9=>'FASTENER', 10=>'STYLE', 11=>'FINISH-EMK');
                }else if($selectores->id_fabricante==0){
                    $variable=array(1=>'BACKSET',2=>'HANDING');
                }

            }

            $options =  view('sub_baldwins.create',compact('selectores','variable'))->render();
        }else if($request->catalogo ==13){

            if($request->tipo==1){
                $tipo_cliente = array('id'=>0,
                                'tipo_cliente'=>'');
                $tipo_cliente = (object)$tipo_cliente;    
            }else if($request->tipo==2){
                $tipo_cliente = tipo_cliente::where('id',$request->id)->get();
                $tipo_cliente = $tipo_cliente[0];
            }

            $options =  view('tipo_clientes.fields',compact('tipo_cliente'))->render();
        }else if($request->catalogo ==14){

            if($request->tipo==1){
                $tipo_proyecto = array('id'=>0,
                                'tipo_proyecto'=>'');
                $tipo_proyecto = (object)$tipo_proyecto;    
            }else if($request->tipo==2){
                $tipo_proyecto = tipo_proyecto::where('id',$request->id)->get();
                $tipo_proyecto = $tipo_proyecto[0];
            }

            $options =  view('tipo_proyectos.fields',compact('tipo_proyecto'))->render();
        }else if($request->catalogo ==15){

            if($request->tipo==1){
                $participantes = array('id'=>0,
                                      'id_cliente'=>$request->fabricante,
                                       'contacto'=>'',
                                       'correo'=>'',
                                       'correo'=>'',
                                       'telefono'=>'',
                                       'puesto'=>'',
                                       'activo'=>1);

                $participantes = (object)$participantes;    
            }else if($request->tipo==2){
                $participantes = cliente_participantes::where('id',$request->id)->get();
                $participantes = $participantes[0];
            }

            $options =  view('clientes.participantes_fields',compact('participantes'))->render();
        }else if($request->catalogo ==16){
          $filtro = new cotizador_detalle;
          
          $filtro->id_cotizacion = $request->id; 
          $cotizacion = db::table('cotizacions as c')
                        ->leftjoin('cliente_participantes as cl','cl.id','c.cliente')
                        ->leftjoin('proyectos as p','p.id','c.proyecto')
                        ->selectraw('c.*, cl.contacto as nombre_cliente, p.nombre_corto')
                        ->where('c.id',$request->id)->get();
          $cotizacion = $cotizacion[0];
          $productos = $filtro->detalle_cotizacion($filtro);
          $options =  view('cotizador.cotizacion_detalle',compact('productos','cotizacion'))->render();
        }else if($request->catalogo ==17){
          
          if($request->tipo==1){
            $imagenes = array('id'=>0,
                              'id_producto' => $request->fabricante,
                              'foto'=>'');
            $imagenes = (object)$imagenes;

          }else if($request->tipo==2){
            $imagenes = tbl_fotos_productos::where('id',$request->id)->get();
            $imagenes = $imagenes[0];
          }

          $options =  view('productos.alta_imagen',compact('imagenes'))->render();
        }


        return json_encode($options);
    }

    function guarda_catalogo(Request $request){
        if($request->id_catalogo==1){
            $existe = catalogos::where('id',$request->id)->count();
            if($existe>0){
                catalogos::where('id',$request->id)
                        ->update(['fabricante'=>$request->fabricante,
                                  'catalogo'=>$request->catalogo,
                                  'abrev'=>$request->abrev]);
            }else{
                catalogos::insert(['fabricante'=>$request->fabricante,
                                  'catalogo'=>$request->catalogo,
                                  'abrev'=>$request->abrev]);
            }
            
            $catalogos = new catalogos;
            $catalogos = $catalogos->lista_catalogo($request);
            $options = view('catalogos.table',compact('catalogos'))->render();

        }else if($request->id_catalogo==2){
            $existe = familia::where('id',$request->id)->count();
            if($existe>0){
                familia::where('id',$request->id)
                        ->update(['familia'=>$request->familia]);
            }else{
                familia::insert(['familia'=>$request->familia,
                                 'catalogo'=>$request->catalogo]);
            }
            
            $familias = new familia;
            $familias->catalogo = $request->catalogo;
            $familias = $familias->lista_familias($familias);
            $options = view('familias.table',compact('familias'))->render();

        }else if($request->id_catalogo==3){
            $existe = categoria::where('id',$request->id)->count();
            if($existe>0){
                categoria::where('id',$request->id)
                        ->update(['familia'=>$request->familia,
                                  'categoria'=>$request->categoria
                                ]);
            }else{
                categoria::insert(['familia'=>$request->familia,
                                  'categoria'=>$request->categoria]);
            }
            
            $categorias = new categoria;
            $categorias->familia = $request->familia;
            $categorias = $categorias->lista_categorias($categorias);
            $options = view('categorias.table',compact('categorias'))->render();

        }else if($request->id_catalogo==4){
            $existe = subcategorias::where('id',$request->id)->count();
            if($existe>0){
                subcategorias::where('id',$request->id)
                        ->update(['subcategoria'=>$request->subcategoria]);
            }else{
                subcategorias::insert(['categoria'=>$request->categoria,
                                  'subcategoria'=>$request->subcategoria]);
            }
            
            $subcategorias = new subcategorias;
            $subcategorias->categoria =  $request->categoria;
            $subcategorias = $subcategorias->lista_subcategorias($subcategorias);
            $options = view('subcategorias.table',compact('subcategorias'))->render();
        }else if($request->id_catalogo==5){
            $existe = disenio::where('id',$request->id)->count();
            if($existe>0){
                disenio::where('id',$request->id)
                        ->update(['fabricante'=>$request->fabricante,
                                  'disenio'=>$request->disenio]);
            }else{
                disenio::insert(['fabricante'=>$request->fabricante,
                                  'disenio'=>$request->disenio]);
            }
            
            $disenios = new disenio;
            $disenios = $disenios->lista_disenios();
            $options = view('disenios.table',compact('disenios'))->render();
        }else if($request->id_catalogo==6){
            $existe = sub_baldwin::where([['variable',$request->variable],['id',$request->id],['fabricante',$request->fabricante]])->count();

            if($existe>0){
                sub_baldwin::where('id',$request->id)
                        ->update(['fabricante'=>$request->fabricante,
                                  'variable'=>$request->variable,
                                  'subcatalogo'=>$request->subcatalogo,
                                  'selector'=>$request->selector]);
            }else{
                sub_baldwin::insert(['fabricante'=>$request->fabricante,
                                     'subcatalogo'=>$request->subcatalogo,
                                     'variable'=>$request->variable,
                                     'selector'=>$request->selector]);
            }
            if($request->fabricante==77){
              $variable  =  array(1=>'Sufijo',2=>'Grupo sufijo', 3=>'Style 1', 4=>'Style 2', 5=>'Style 3', 6=>'Latch', 7=>'Strike', 8=>'Cylinder', 9=>'Keying', 10=>'DC1 BWN1',
                            11=>'DC2 BWN2',12=>'DC3 BWN3', 13=>'DC4 BWN4', 14=>'DP', 15=>'EXTERIOR TRIM  DEP 1', 16=>'EXTERIOR TRIM  DEP 1 ACCION', 17=>'INTERIOR ESCUTCHEON  DEP 2', 
                            18=>'INTERIOR ESCUTCHEON  DEP 2 ACCION', 19=>'KNOB / LEVER  DEP 3', 20=>'KNOB / LEVER  DEP 3 ACCION', 21=>'SPINDLE  DEP 4', 22=>'SPINDLE  DEP 4 ACCION',
                            23=>'CYLINDER   DEP 5', 24=>'CYLINDER   DEP 5 ACCION', 25=>'MORTISE LOCK  DEP 6', 26=>'MORTISE LOCK  DEP 6 ACCION', 27=>'BLOCKING RING  DEP 7',
                            28=>'BLOCKING RING  DEP 7 ACCION', 29=>'TURN KNOB / ADAPTOR DEP 8', 30=>'TURN KNOB / ADAPTOR DEP 8 ACCION', 31=>'DEP 9 ',32=>'DEP 9 ACCION',
                            33=>'DEP 10 HC LIBRES ', 34=>'DEP 10 HC LIBRES ACCION', 35=>'DEP 11 HC LIBRES', 36=>'DEP 11 HC LIBRES ACCION', 37=>'DEP 12 HC LIBRES', 38=>'DEP 12 HC LIBRES ACCION',
                            39=>'DEP ROSETTES', 40=>'DEP ROSETTES ACCION', 41=>'DEP LATCHES', 42=>'DEP LATCHES ACCION', 43=>'DEP ADAPTOR ', 44=>'DEP ADAPTOR ACCION', 45=>'DEP SPINDLE', 46 =>'DEP SPINDLE ACCION',
                            47=>'DEP EXT BUTTON',48=>'DEP EXT BUTTON ACCION',49=>'Finish INT');

            }else if($request->fabricante==76){
              $variable=array(1=>'DC', 2=>'MORTISE', 3=>'FMM1', 4=>'STEM', 5=>'FMM2', 6=>'HANDLE', 7=>'FMM3', 8=>'WHEEL', 9=>'FASTENER', 10=>'STYLE', 11=>'FINISH-EMK');
            }else if($request->id_fabricante==0){
                    $variable=array(1=>'BACKSET',2=>'HANDING');
            }

            $variable  = (object)$variable;  
            $subBaldwins = new Sub_baldwin;
            $subBaldwins = $subBaldwins->lista_subbaldwin($request->fabricante);
            $options = view('sub_baldwins.table',compact('subBaldwins','variable'))->render();
        }else if($request->id_catalogo==8){
            $existe = sufijos::where('id',$request->id)->count();
            if($existe>0){
                sufijos::where('id',$request->id)
                        ->update(['categoria'=>$request->categoria,
                                  'subcategoria'=>$request->subcategoria,
                                  'sufijo'=>$request->sufijo]);
            }else{
                sufijos::insert(['categoria'=>$request->categoria,
                                  'subcategoria'=>$request->subcategoria,
                                  'sufijo'=>$request->sufijo]);
            }
            
            $sufijos = new sufijos;
            $sufijos = $sufijos->lista_sufijos();
            $options = view('sufijos.table',compact('sufijos'))->render();
        }else if($request->id_catalogo==9){
            $existe = disenio::where('id',$request->id)->count();
            if($existe>0){
                disenio::where('id',$request->id)
                        ->update(['disenio'=>$request->disenio]);
            }else{
                disenio::insert(['subcategoria'=>$request->subcategoria,
                                  'disenio'=>$request->disenio]);
            }
            
            $disenios = new disenio;
            $disenios->subcategoria =  $request->subcategoria;
            $disenios = $disenios->lista_disenios($disenios);
            $options = view('disenios.table',compact('disenios'))->render();
        }else if($request->id_catalogo==10){
            $existe = item::where('id',$request->id)->count();
            if($existe>0){
                item::where('id',$request->id)
                        ->update(['item'=>$request->item]);
            }else{
                item::insert(['disenio'=>$request->disenio,
                              'item'=>$request->item]);
            }
            
            $items = new item;
            $items->disenio =  $request->disenio;
            $items = $items->lista_items($items);
            $options = view('items.table',compact('items'))->render();
        }else if($request->id_catalogo==11){

            $csvFile = fopen($_FILES['file_upload']['tmp_name'], 'r');
            fgetcsv($csvFile);
            while(($line = fgetcsv($csvFile)) !== FALSE){  
              productos_temporal::insert(['fabricante'=>$line[0],
                                          'catalogo'=>$line[1],
                                          'pagina'=>$line[2],
                                          'familia'=>$line[3]==''?null:$line[3],
                                          'categoria'=>$line[4],
                                          'subcategoria'=>$line[5],
                                          'disenio'=>$line[6],
                                          'item'=>$line[7],
                                          'sufijo'=>$line[8] == ''?null:$line[8],
                                          'grupo_sufijo'=>$line[9],
                                          'descripcion'=>$line[10],
                                          'descripcion_mtk'=>$line[11],
                                          'especificacion'=>$line[12],
                                          'selector_mtk'=>$line[13],
                                          'mortise'=>$line[14],
                                          'fmm1'=>$line[15],
                                          'stem'=>$line[16],
                                          'fmm2'=>$line[17],
                                          'handle'=>$line[18],
                                          'fmm3'=>$line[19],
                                          'wheel'=>$line[20],
                                          'fastener'=>$line[21],
                                          'style'=>$line[22],
                                          'finish'=>$line[23],
                                          'style_1'=>$line[24],
                                          'style_2'=>$line[25],
                                          'style_3'=>$line[26],
                                          'latch'=>$line[27],
                                          'strike'=>$line[28],
                                          'cylinder'=>$line[29],
                                          'keyling'=>$line[30],
                                          'finish_det_1'=>$line[31],
                                          'finish_det_2'=>$line[32],
                                          'finish_det_3'=>$line[33],
                                          'finish_det_4'=>$line[34],
                                          'dependencias'=>$line[35]==''?null:$line[35],
                                          'handing'=>$line[36]==''?null:$line[36],
                                          'door_thickness'=>$line[37],
                                          'backset'=>$line[38],
                                          'costo_1'=>$line[39],
                                          'costo_2'=>$line[40],
                                          'costo_3'=>$line[41],
                                          'costo_4'=>$line[42],
                                          'calculo_codigo'=>$line[43]==''?null:$line[43],
                                          'codigo_sistema'=>$line[44],
                                          'notas'=>$line[45],
                                          'exterior_tim_dep_1'=>$line[46],
                                          'exterior_tim_1_accion'=>$line[47]==''?null:$line[47],
                                          'int_escutcheon_dep_2'=>$line[48],
                                          'int_escutcheon_dep2_accion'=>$line[49]==''?null:$line[49],
                                          'knob_lever_dep3'=>$line[50],
                                          'knob_lever_dep3_accion'=>$line[51]==''?null:$line[51],
                                          'spindle_dep4'=>$line[52],
                                          'spindle_dep4_accion'=>$line[53]==''?null:$line[53],
                                          'cylinder_dep5'=>$line[54],
                                          'cylinder_dep5_accion'=>$line[55]==''?null:$line[55],
                                          'mortise_lock_dep6'=>$line[56],
                                          'mortise_lock_dep6_accion'=>$line[57]==''?null:$line[57],
                                          'blocking_dep7'=>$line[58],
                                          'blocking_dep7_accion'=>$line[59]==''?null:$line[59],
                                          'turn_knob8'=>$line[60],
                                          'turn_knob8_accion'=>$line[61]==''?null:$line[61],
                                          'dep9'=>$line[62],
                                          'dep9_accion'=>$line[63]==''?null:$line[63],
                                          'dep10_libre'=>$line[64], 
                                          'dep10_libre_accion'=>$line[65]==''?null:$line[65],
                                          'dep11_libre'=>$line[66],
                                          'dep11_libre_accion'=>$line[67]==''?null:$line[67],
                                          'dep12_libre'=>$line[68],
                                          'dep12_libre_accion'=>$line[69]==''?null:$line[69],
                                          'dep_rossetes'=>$line[70],
                                          'dep_rossetes_accion'=>$line[71]==''?null:$line[71],
                                          'dep_latches'=>$line[72],
                                          'dep_latches_accion'=>$line[73]==''?null:$line[73],
                                          'dep_adaptor'=>$line[74],
                                          'dep_adaptor_accion'=>$line[75]==''?null:$line[75],
                                          'dep_spindle'=>$line[76],
                                          'dep_spindle_accion'=>$line[77]==''?null:$line[77],
                                          'dep_extension'=>$line[78],
                                          'dep_extension_accion'=>$line[79]==''?null:$line[79],
                                          'info'=>$line[80]==''?null:$line[80],
                                          'latch'=>$line[81]==''?null:$line[81]
                                        ]);  
            }

            $productos = db::select('call procesos_masivo()');
            $options =  view('productos.table_masivo',compact('productos'))->render();
        }else if($request->id_catalogo==13){
            $existe = tipo_cliente::where('id',$request->id)->count();
            if($existe>0){
                tipo_cliente::where('id',$request->id)
                        ->update(['tipo_cliente'=>$request->tipo_cliente]);
            }else{
                tipo_cliente::insert(['tipo_cliente'=>$request->tipo_cliente]);
            }
            
            $tipoClientes  = tipo_cliente::get();
            $options = view('tipo_clientes.table',compact('tipoClientes'))->render();
        }else if($request->id_catalogo==14){
            $existe = tipo_proyecto::where('id',$request->id)->count();
            if($existe>0){
                tipo_proyecto::where('id',$request->id)
                        ->update(['tipo_proyecto'=>$request->tipo_proyecto]);
            }else{
                tipo_proyecto::insert(['tipo_proyecto'=>$request->tipo_proyecto]);
            }
            
            $tipoProyectos  = tipo_proyecto::get();
            $options = view('tipo_proyectos.table',compact('tipoProyectos'))->render();
        }else if($request->id_catalogo==15){
          $cliente = Clientes::where('id_cliente',$request->id_cliente)->get();
          $cliente = $cliente[0];

            $existe = cliente_participantes::where('id',$request->id)->count();
            if($existe>0){
                cliente_participantes::where('id',$request->id)
                        ->update(['contacto'=>$request->contacto,
                                  'correo'=>$request->correo,
                                  'telefono'=>$request->telefono,
                                  'puesto'=>$request->puesto,
                                  'lista_precio'=>$cliente->id_precio,
                                  'activo'=>$request->activo]);
            }else{
                cliente_participantes::insert(['id_cliente'=>$request->id_cliente,
                                              'contacto'=>$request->contacto,
                                              'correo'=>$request->correo,
                                              'telefono'=>$request->telefono,
                                              'puesto'=>$request->puesto,
                                              'lista_precio'=>$cliente->id_precio,
                                              'activo'=>$request->activo]);
            }
            
            $clientes = Clientes::where('id_cliente',$request->id_cliente)->get();
            $clientes = $clientes[0];
            $participantes  = cliente_participantes::where('id_cliente',$request->id_cliente)->get();
            $options = view('clientes.asignacion',compact('participantes','clientes'))->render();
        }else if($request->id_catalogo==17){
           $file = $request->file('foto');

           $nombre = $file->getClientOriginalName();
           \Storage::disk('local')->put($nombre,\File::get($file));
           
           tbl_fotos_productos::insert(['id_producto'=>$request->id_producto,
                                        'foto'=>$nombre]);

           $imagenes = tbl_fotos_productos::where('id_producto',$request->id_producto)->get();
           $options = view('productos.imagenes',compact('imagenes'))->render();
        }

        return $options;
    }

    function elimina_catalogo(Request $request){ 
        if($request->catalogo==1){
            catalogos::where('id',$request->id)->delete();
            $catalogos = new catalogos;
            $catalogos = $catalogos->lista_catalogo($request);
            $options = view('catalogos.table',compact('catalogos'))->render();
        }else if($request->catalogo==2){
            familia::where('id',$request->id)->delete();
            $familias = new familia;
            $familias->catalogo = $request->catalogos;
            #dd($familias);
            $familias = $familias->lista_familias($familias);

            $options = view('familias.table',compact('familias'))->render();
        }else if($request->catalogo==3){
            categoria::where('id',$request->id)->delete();
            $categorias = new categoria;
            $categorias->familia = $request->familia;
            $categorias = $categorias->lista_categorias($categorias);
            $options = view('categorias.table',compact('categorias'))->render();
        }else if($request->catalogo==4){
            subcategorias::where('id',$request->id)->delete();
            $subcategorias = new subcategorias;
            $subcategorias->categoria =  $request->categoria;
            $subcategorias = $subcategorias->lista_subcategorias($subcategorias);

            $options = view('subcategorias.table',compact('subcategorias'))->render();
        }else if($request->catalogo==5){
            disenio::where('id',$request->id)->delete();
            $disenios = new disenio;
            $disenios = $disenios->lista_disenios();
            $options = view('disenios.table',compact('disenios'))->render();
        }else if($request->catalogo==6){
            $id =  sub_baldwin::where('id',$request->id)->get();
            $id = $id[0];

            sub_baldwin::where('id',$request->id)->delete();
            if($id->fabricante==77){
              $variable  =  array(1=>'Sufijo',2=>'Grupo sufijo', 3=>'Style 1', 4=>'Style 2', 5=>'Style 3', 6=>'Latch', 7=>'Strike', 8=>'Cylinder', 9=>'Keying', 10=>'DC1 BWN1',
                            11=>'DC2 BWN2',12=>'DC3 BWN3', 13=>'DC4 BWN4', 14=>'DP', 15=>'EXTERIOR TRIM  DEP 1', 16=>'EXTERIOR TRIM  DEP 1 ACCION', 17=>'INTERIOR ESCUTCHEON  DEP 2', 
                            18=>'INTERIOR ESCUTCHEON  DEP 2 ACCION', 19=>'KNOB / LEVER  DEP 3', 20=>'KNOB / LEVER  DEP 3 ACCION', 21=>'SPINDLE  DEP 4', 22=>'SPINDLE  DEP 4 ACCION',
                            23=>'CYLINDER   DEP 5', 24=>'CYLINDER   DEP 5 ACCION', 25=>'MORTISE LOCK  DEP 6', 26=>'MORTISE LOCK  DEP 6 ACCION', 27=>'BLOCKING RING  DEP 7',
                            28=>'BLOCKING RING  DEP 7 ACCION', 29=>'TURN KNOB / ADAPTOR DEP 8', 30=>'TURN KNOB / ADAPTOR DEP 8 ACCION', 31=>'DEP 9 ',32=>'DEP 9 ACCION',
                            33=>'DEP 10 HC LIBRES ', 34=>'DEP 10 HC LIBRES ACCION', 35=>'DEP 11 HC LIBRES', 36=>'DEP 11 HC LIBRES ACCION', 37=>'DEP 12 HC LIBRES', 38=>'DEP 12 HC LIBRES ACCION',
                            39=>'DEP ROSETTES', 40=>'DEP ROSETTES ACCION', 41=>'DEP LATCHES', 42=>'DEP LATCHES ACCION', 43=>'DEP ADAPTOR ', 44=>'DEP ADAPTOR ACCION', 45=>'DEP SPINDLE', 46 =>'DEP SPINDLE ACCION',
                            47=>'DEP EXT BUTTON',48=>'DEP EXT BUTTON ACCION',49=>'Finish INT');
              
            }else if($id->fabricante==76){
              $variable=array(1=>'DC', 2=>'MORTISE', 3=>'FMM1', 4=>'STEM', 5=>'FMM2', 6=>'HANDLE', 7=>'FMM3', 8=>'WHEEL', 9=>'FASTENER', 10=>'STYLE', 11=>'FINISH-EMK');
            }else if($id->id_fabricante==0){
                $variable=array(1=>'BACKSET',2=>'HANDING');
            }

            $variable = (object)$variable;
            $subBaldwins = new Sub_baldwin;
            $subBaldwins = $subBaldwins->lista_subbaldwin($id->fabricante);
            $options = view('sub_baldwins.table',compact('subBaldwins','variable'))->render();
        }else if($request->catalogo==8){
            sufijos::where('id',$request->id)->delete();
            $sufijos = new sufijos;
            $sufijos = $sufijos->lista_sufijos();
            $options = view('sufijos.table',compact('sufijos'))->render();
        }else if($request->catalogo==9){
            disenio::where('id',$request->id)->delete();
            $disenios = new disenio;
            $disenios->subcategoria =  $request->subcategoria;
            $disenios = $disenios->lista_disenios($disenios);
            $options = view('disenios.table',compact('disenios'))->render();
        }else if($request->catalogo==10){
            item::where('id',$request->id)->delete();
    
            $items = new item;
            $items->disenio =  $request->disenio;
            $items = $items->lista_items($items);
            $options = view('items.table',compact('items'))->render();
        }else if($request->catalogo==13){
            tipo_cliente::where('id',$request->id)->delete();
    
            $tipoClientes  = tipo_cliente::get();
            $options = view('tipo_clientes.table',compact('tipoClientes'))->render();
        }else if($request->catalogo==14){
            tipo_proyecto::where('id',$request->id)->delete();
    
            $tipoProyectos  = tipo_proyecto::get();
            $options = view('tipo_proyectos.table',compact('tipoProyectos'))->render();
        }else if($request->catalogo ==15){
            cliente_participantes::where('id',$request->id)->delete();
            
            $clientes = Clientes::where('id_cliente',$request->fabricante)->get();
            $clientes = $clientes[0];
            $participantes  = cliente_participantes::where('id_cliente',$request->fabricante)->get();
            $options = view('clientes.asignacion',compact('participantes','clientes'))->render();
        }else if($request->catalogo==17){
           
           tbl_fotos_productos::where('id',$request->id)->delete();
           
           $imagenes = tbl_fotos_productos::where('id_producto',$request->fabricante)->get();
           $options = view('productos.imagenes',compact('imagenes'))->render();
        }


        return json_encode($options);
    }

    function lista_familias(Request $request){
        $familias = new familia;
        $familias->catalogo = $request->id_catalogo;
        $catalogo = db::table('catalogos as c')
                    ->join('tbl_fabricantes as f','c.fabricante','id_fabricante')
                    ->where('c.id',$request->id_catalogo)
                    ->selectraw('c.*, f.fabricante as nom_fabricante')
                    ->get();
        $catalogo = $catalogo[0];

        $familias = $familias->lista_familias($familias);
        return view('familias.index',compact('familias','catalogo'));
    }  

    function lista_categorias(Request $request){
        $categorias = new categoria;
        $categorias->familia = $request->id_familia;

        $catalogo = db::table('familias as f')
                    ->join('catalogos as c','c.id','f.catalogo')
                    ->join('tbl_fabricantes as fa','c.fabricante','id_fabricante')
                    ->where('f.id',$request->id_familia)
                    ->selectraw('f.*, fa.fabricante as nom_fabricante, c.catalogo as nom_catalogo, id_fabricante')
                    ->get();
        $catalogo = $catalogo[0];
        $categorias = $categorias->lista_categorias($categorias);
        return view('categorias.index',compact('categorias','catalogo'));
    } 
    function lista_subcategorias(Request $request){
        $subcategorias = new subcategorias;
        $subcategorias->categoria = $request->id_categoria;

        $catalogo = db::table('categorias as ca')
                    ->join('familias as f','ca.familia','f.id')
                    ->join('catalogos as c','c.id','f.catalogo')
                    ->join('tbl_fabricantes as fa','c.fabricante','id_fabricante')
                    ->where('ca.id',$request->id_categoria)
                    ->selectraw('ca.*,c.id as catalogo, f.familia as nom_familia, fa.fabricante as nom_fabricante, c.catalogo as nom_catalogo, id_fabricante,ca.id as categoria')
                    ->get();
                    
        $catalogo = $catalogo[0];
        $subcategorias = $subcategorias->lista_subcategorias($subcategorias);
        #dd($subcategorias);
        return view('subcategorias.index',compact('subcategorias','catalogo'));
    }       

    function lista_disenios(Request $request,$subcategoria){
        $disenios = new disenio;
        $disenios->subcategoria = $subcategoria;

        $catalogo = db::table('subcategorias as s')
                    ->join('categorias as ca','ca.id','s.categoria')
                    ->join('familias as f','ca.familia','f.id')
                    ->join('catalogos as c','c.id','f.catalogo')
                    ->join('tbl_fabricantes as fa','c.fabricante','id_fabricante')
                    ->where('s.id',$subcategoria)
                    ->selectraw('s.*,c.id as catalogo, ca.categoria as nom_categoria, ca.familia, f.familia as nom_familia, fa.fabricante as nom_fabricante, c.catalogo as nom_catalogo, id_fabricante,ca.id as categoria')
                    ->get();      
        $catalogo = $catalogo[0];    
        $disenios = $disenios->lista_disenios($disenios);
        return view('disenios.index',compact('disenios','catalogo'));
    }

    function lista_items(Request $request){
        $items = new item;
        $items->disenio = $request->disenio;

        $catalogo = db::table('disenios as dd')
                    ->join('subcategorias as s','s.id','dd.subcategoria')
                    ->join('categorias as ca','ca.id','s.categoria')
                    ->join('familias as f','ca.familia','f.id')
                    ->join('catalogos as c','c.id','f.catalogo')
                    ->join('tbl_fabricantes as fa','c.fabricante','id_fabricante')
                    ->where('dd.id',$request->disenio)
                    ->selectraw('dd.*,  dd.id as id_disenio, s.subcategoria as nom_subcategoria ,c.id as catalogo, ca.categoria as nom_categoria, ca.familia, f.familia as nom_familia, fa.fabricante as nom_fabricante, c.catalogo as nom_catalogo, id_fabricante,ca.id as categoria')
                    ->get();      
        $catalogo = $catalogo[0];    
        $items = $items->lista_items($items);
        return view('items.index',compact('items','catalogo'));
    }

    function obtiene_catalogo(Request $request){
        $catalogos =  new catalogos;
        
        $catalogos = $catalogos->obtiene_catalogo($request);
        return $catalogos;
    }

    function obtiene_catalogo2(Request $request){
        $catalogos =  new catalogos;
        
        $catalogos = $catalogos->obtiene_catalogo2($request);
        return $catalogos;
    }

    /**
     * Show the form for creating a new catalogos.
     *
     * @return Response
     */

    public function create()
    {
        return view('catalogos.create');
    }

    /**
     * Store a newly created catalogos in storage.
     *
     * @param CreatecatalogosRequest $request
     *
     * @return Response
     */
    public function store(CreatecatalogosRequest $request)
    {
        $input = $request->all();

        $catalogos = $this->catalogosRepository->create($input);

        Flash::success('Catalogos saved successfully.');

        return redirect(route('catalogos.index'));
    }

    /**
     * Display the specified catalogos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $catalogos = $this->catalogosRepository->find($id);

        if (empty($catalogos)) {
            Flash::error('Catalogos not found');

            return redirect(route('catalogos.index'));
        }

        return view('catalogos.show')->with('catalogos', $catalogos);
    }

    /**
     * Show the form for editing the specified catalogos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $catalogos = $this->catalogosRepository->find($id);

        if (empty($catalogos)) {
            Flash::error('Catalogos not found');

            return redirect(route('catalogos.index'));
        }

        return view('catalogos.edit')->with('catalogos', $catalogos);
    }

    /**
     * Update the specified catalogos in storage.
     *
     * @param int $id
     * @param UpdatecatalogosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecatalogosRequest $request)
    {
        $catalogos = $this->catalogosRepository->find($id);

        if (empty($catalogos)) {
            Flash::error('Catalogos not found');

            return redirect(route('catalogos.index'));
        }

        $catalogos = $this->catalogosRepository->update($request->all(), $id);

        Flash::success('Catalogos updated successfully.');

        return redirect(route('catalogos.index'));
    }

    /**
     * Remove the specified catalogos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $catalogos = $this->catalogosRepository->find($id);

        if (empty($catalogos)) {
            Flash::error('Catalogos not found');

            return redirect(route('catalogos.index'));
        }

        $this->catalogosRepository->delete($id);

        Flash::success('Catalogos deleted successfully.');

        return redirect(route('catalogos.index'));
    }
}
