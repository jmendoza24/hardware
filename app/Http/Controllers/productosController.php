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
use App\Models\tbl_fotos_productos;
use App\Models\item;
use App\Models\formulas;
use App\Models\productos;
use App\Models\productos_temporal;
use App\Models\listado_vistas;
use App\Http\Requests\CreateproductosRequest;
use App\Http\Requests\UpdateproductosRequest;
use App\Repositories\productosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Flash;
use Response;
use DB;



class productosController extends AppBaseController
{
    /** @var  productosRepository */
    private $productosRepository;

    public function __construct(productosRepository $productosRepo)
    {
        $this->productosRepository = $productosRepo;
    }

    /**
     * Display a listing of the productos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request){
        $producto = new productos;
        $producto->fabricante = 0;
        $producto->min =  0;
        $producto->max =  500;
        $init = 1;
        $fab = 0;

        $productos = array();

        $fabricantes = db::select('select distinct f.*
                                   FROM productos p
                                   inner JOIN tbl_fabricantes f ON f.id_fabricante = p.fabricante
                                   order by fabricante');

        $conteo = 0;


        return view('productos.index',compact('productos','fabricantes','conteo','init','fab'));
    }

    /**
     * Show the form for creating a new productos.
     *
     * @return Response
     */
    public function create(){
        $fabricantes    = Fabricantes::get();
        $catalogos      = array();
        $familia        = array();
        $categoria      = array();
        $subcategorias  = array();
        $disenio        = array();
        $items          = array();
        $sub_baldwins   = Sub_baldwin::get();
        $formulas       = formulas::get();
        $listado_vistas = listado_vistas::get();
        $productos  = array('fabricante'=>'',
                            'fmm1'=>'',
                            'finish_int'=>'',
                            'style'=>'',
                            'style_1'=>'',
                            'style_2'=>'',
                            'style_3'=>'',
                            'latch'=>'',
                            'strike'=>'',
                            'selector_mtk'=>'',
                            'stem'=>'',
                            'fmm2'=>'',
                            'fmm3'=>'',
                            'handle'=>'',
                            'cylinder'=>'',
                            'keyling'=>'',
                            'finish_det_1'=>'',
                            'finish_det_2'=>'',
                            'finish_det_4'=>'',
                            'dep9'=>'',
                            'backset'=>'',
                            'handing'=>'',
                            'finish'=>'',
                            'calculo_codigo'=>'',
                            'exterior_tim_dep_1'=>'',
                            'sufijo'=>'',
                            'spindle_dep4'=>'',
                            'blocking_dep7'=>'',
                            'dep10_libre'=>'',
                            'dep11_libre'=>'',
                            'dep_rossetes'=>'',
                            'dep_latches'=>'',
                            'dep_adaptor'=>'',
                            'grupo_sufijo'=>'',
                            'int_escutcheon_dep2_accion'=>'',
                            'int_escutcheon_dep2_accion'=>'',
                            'cylinder_dep5'=>'',
                            'mortise_lock_dep6'=>'',
                            'mortise'=>'',
                            'info'=>'',
                            'dep_spindle'=>'',
                            'dep_extension'=>'',
                            'turn_knob8'=>'',
                            'int_escutcheon_dep_2'=>'',
                            'knob_lever_dep3'=>'',
                            'exterior_tim_1_accion'=>'',
                            'knob_lever_dep3_accion'=>'',
                            'spindle_dep4_accion'=>'',
                            'cylinder_dep5_accion'=>'',
                            'mortise_lock_dep6_accion'=>'',
                            'blocking_dep7_accion'=>'',
                            'turn_knob8_accion'=>'',
                            'dep9_accion'=>'',
                            'dep10_libre_accion'=>'',
                            'dep11_libre_accion'=>'',
                            'dep12_libre_accion'=>'',
                            'dep_rossetes_accion'=>'',
                            'dep_latches_accion'=>'',
                            'dep_adaptor_accion'=>'',
                            'dep_spindle_accion'=>'',
                            'dep_extension_accion'=>'',
                            'dependencias'=>'',
                            'fastener'=>'',
                            'wheel'=>'',
                            'latch_ext'=>''
                        );

        $productos = (object)$productos;
        $sufijo = array();
        $imagenes = array();

        return view('productos.create',compact('fabricantes','productos','listado_vistas','catalogos','familia','categoria','subcategorias','disenio','items','sub_baldwins','formulas','sufijo','imagenes'));
    }

    /**
     * Store a newly created productos in storage.
     *
     * @param CreateproductosRequest $request
     *
     * @return Response
     */
    public function store(CreateproductosRequest $request)
    {
        $input = $request->all();

        $productos = $this->productosRepository->create($input);
        $last_id = $productos->id;
        if($productos->calculo_codigo ==''){
            $categoria = $productos->categoria;
        }else{
            $categoria= $productos->calculo_codigo;
        }

        if($productos->item !=''){
            db::update('update productos p
                        inner join items i on i.id = p.item
                        set p.item = i.item,
                            id_item = i.id
                            where p.id = '.$last_id);
        }

        //db::update('call proceso_crear_formula('.$categoria.','.$last_id.')');

        Flash::success('Productos saved successfully');

        return redirect(route('productos.index'));
    }

    /**
     * Display the specified productos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productos = $this->productosRepository->find($id);

        if (empty($productos)) {
            Flash::error('Productos not found');

            return redirect(route('productos.index'));
        }

        return view('productos.show')->with('productos', $productos);
    }

    /**
     * Show the form for editing the specified productos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id){   
        $productos = $this->productosRepository->find($id);
        

        $fabricantes = Fabricantes::get();
        $catalogos      = catalogos::where('fabricante',$productos->fabricante)->get();
        $familia        = familia::where('catalogo',$productos->catalogo)->get();
        $categoria      = categoria::where('familia',$productos->familia)->get();
        $subcategorias  = subcategorias::where('categoria',$productos->categoria)->get();
        $disenio        = disenio::where('subcategoria',$productos->subcategoria)->get();
        $items          = item::where('disenio',$productos->disenio)->get();
        $listado_vistas = listado_vistas::get();
        $imagenes = tbl_fotos_productos::where('id_producto',$id)->get();
        /** 
        if($productos->fabricante==77 && $productos->categoria >0 && $productos->subcategoria > 0){
            $sufijo = db::select('call proceso_obtiene_sufijos('.$productos->categoria.','.$productos->subcategoria.')');
            if($sufijo[0]->campo1 == '0'){
                $sufijo = array();
            }
        }else{
            $sufijo = array();
            $sufijo = (object)$sufijo;
        }*/

        $sufijo = Sub_baldwin::where('id',$productos->grupo_sufijo)->get();
        if(sizeof($sufijo)>0){
            $sufijo = explode(',', $sufijo[0]->selector);    
        }else{
            $sufijo = array();
        }
        
        
        
        $sub_baldwins = Sub_baldwin::get();
        $formulas = formulas::get();
        
        if (empty($productos)) {
            Flash::error('Productos not found');

            return redirect(route('productos.index'));
        }

        return view('productos.edit',compact('productos','listado_vistas','catalogos','familia','categoria','subcategorias','disenio','items','fabricantes','sub_baldwins','formulas','sufijo','imagenes'));
    }

    /**
     * Update the specified productos in storage.
     *
     * @param int $id
     * @param UpdateproductosRequest $request
     *
     * @return Response
     */




    function nuevo_dibujo(Request $request){
        $opcion = 'nuevo';
        $productos = DB::table('productos')->where('id',$request->id)->get();
        $producto_dibujos = array('id_producto'=>'',
                                    'foto'=>''
                                    );

         $producto_dibujos = (object)$producto_dibujos;
         $productos = $productos[0];
         $options = view('tbl_fotos_productos.sube',compact('productos','producto_dibujos','opcion'))->render();   
         return json_encode($options); 
    }


    public function update($id, UpdateproductosRequest $request)
    {
        $productos = $this->productosRepository->find($id);

        if (empty($productos)) {
            Flash::error('Productos not found');

            return redirect(route('productos.index'));
        }

        $productos = $this->productosRepository->update($request->all(), $id);
        //dd($productos);
        if($productos->calculo_codigo ==''){
            $categoria = $productos->categoria;
        }else{
            $categoria= $productos->calculo_codigo;
        }

        if($productos->item !=''){
            db::update('update productos p
                        inner join items i on i.id = p.item
                        set p.item = i.item,
                            id_item = i.id
                            where p.id = '.$id);
        }
        
        //db::update('call proceso_crear_formula('.$categoria.','.$id.')');

        

        Flash::success('Productos updated successfully.');

        return redirect(route('productos.index'));
    }

    /**
     * Remove the specified productos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        // $productos = $this->productosRepository->find($id);

        // if (empty($productos)) {
        //     Flash::error('Productos not found');

        //     return redirect(route('productos.index'));
        // }

        #$this->productosRepository->delete($id);
        
        productos::where('id',$id)->delete();
        Flash::success('Productos deleted successfully.');

        return redirect(route('productos.index'));
    }

    function productos_masivo(Request $request){
        $productos = db::select('call procesos_masivo()');

        return view('productos.masivo',compact('productos'));
    }

    function download_excel(Request $request){
        $filename = 'files/Formato_masivo.csv';
        $path = Storage::disk('public')->path($filename);
        return response()->download($path);
    }

    function limpiar_temporal(Request $request){
        productos_temporal::truncate();
        $productos = productos_temporal::get();
        $options =  view('productos.table_masivo',compact('productos'))->render();
        return json_encode($options);

    }

    function catalogos_download(Request $request){
        $items = db::select("select * from informacion_productos");
        $sub_baldwins = db::select('SELECT id_fabricante, f.fabricante, s.id AS id_grupo, s.subcatalogo AS grupo, variable, selector AS opciones
                                    FROM tbl_fabricantes f
                                    LEFT JOIN  sub_baldwins s ON s.fabricante = f.id_fabricante');

        $sufijos = db::select('SELECT ca.id AS id_categoria, ca.categoria , s.id AS id_subcategoria, s.subcategoria, su.id AS id_sufijo, su.sufijo
                                FROM  categorias ca 
                                LEFT JOIN subcategorias s ON s.categoria = ca.id
                                LEFT JOIN sufijos su ON su.categoria = ca.id AND su.subcategoria = s.id');

        $variable  =  array(2=>'Grupo sufijo', 3=>'Style 1', 4=>'Style 2', 5=>'Style 3', 6=>'Latch', 7=>'Strike', 8=>'Cylinder', 9=>'Keying', 10=>'DC1 BWN1',
                            11=>'DC2 BWN2',12=>'DC3 BWN3', 13=>'DC4 BWN4', 14=>'DP', 15=>'EXTERIOR TRIM  DEP 1', 16=>'EXTERIOR TRIM  DEP 1 ACCION', 17=>'INTERIOR ESCUTCHEON  DEP 2', 
                            18=>'INTERIOR ESCUTCHEON  DEP 2 ACCION', 19=>'KNOB / LEVER  DEP 3', 20=>'KNOB / LEVER  DEP 3 ACCION', 21=>'SPINDLE  DEP 4', 22=>'SPINDLE  DEP 4 ACCION',
                            23=>'CYLINDER   DEP 5', 24=>'CYLINDER   DEP 5 ACCION', 25=>'MORTISE LOCK  DEP 6', 26=>'MORTISE LOCK  DEP 6 ACCION', 27=>'BLOCKING RING  DEP 7',
                            28=>'BLOCKING RING  DEP 7 ACCION', 29=>'TURN KNOB / ADAPTOR DEP 8', 30=>'TURN KNOB / ADAPTOR DEP 8 ACCION', 31=>'DEP 9 ',32=>'DEP 9 ACCION',
                            33=>'DEP 10 HC LIBRES ', 34=>'DEP 10 HC LIBRES ACCION', 35=>'DEP 11 HC LIBRES', 36=>'DEP 11 HC LIBRES ACCION', 37=>'DEP 12 HC LIBRES', 38=>'DEP 12 HC LIBRES ACCION',
                            39=>'DEP ROSETTES', 40=>'DEP ROSETTES ACCION', 41=>'DEP LATCHES', 42=>'DEP LATCHES ACCION', 43=>'DEP ADAPTOR ', 44=>'DEP ADAPTOR ACCION', 45=>'DEP SPINDLE', 46 =>'DEP SPINDLE ACCION',
                            47=>'DEP EXT BUTTON',48=>'DEP EXT BUTTON ACCION');
        
        $variable2=array(1=>'DC', 2=>'MORTISE', 3=>'FMM1', 4=>'STEM', 5=>'FMM2', 6=>'HANDLE', 7=>'FMM3', 8=>'WHEEL', 9=>'FASTENER', 10=>'STYLE', 11=>'FINISH-EMK');

        return view('productos.download_catalogos',compact('items','sub_baldwins','sufijos','variable','variable2'));
    }

    function buscar_elemento(Request $request){
        $campos  = Sub_baldwin::where('id',$request->campo1)->get();
        return explode(',', $campos[0]->selector);
    }

    function confirmar_eliminar(Request $request){
        productos::where('id',$request->id)->delete();
        return 1;
    }

    function enviar_produccion(){
        db::update('call enviar_produccion()');
        return 1;

    }

    function buscar_producto(Request $request){
        $fab = $request->fab;

        if($request->item != ''){
            $productos =  db::select("SELECT p.id,p.item, p.descripcion, f.abrev, p.sufijo, p.codigo_sistema, f.fabricante, c.catalogo, fa.familia, ca.categoria, s.subcategoria, p.pagina
                                        FROM productos p
                                        LEFT JOIN tbl_fabricantes f ON f.id_fabricante = p.fabricante
                                        LEFT JOIN catalogos c ON c.id = p.catalogo
                                        LEFT JOIN familias fa ON fa.id = p.familia
                                        LEFT JOIN categorias ca ON ca.id = p.categoria
                                        LEFT JOIN subcategorias s ON s.id = p.subcategoria
                                        where item like '%".$request->item."%'");
            $conteo  = 0;
            $init = 1;

        }else{
            $producto = new productos;
            $producto->fabricante = $request->fabricante;
            if($request->num == 0){
                $producto->min =   0;
                $producto->max =  500;
                $init = 1;
            }else{
                $producto->min =   ($request->num * 500) - 500 ;
                $producto->max =  500 * $request->num;    
                $init = $request->num;
            }
            
            $productos = $producto->lista_productos($producto);

            $fabricantes = db::select('select distinct f.*
                                       FROM productos p
                                       inner JOIN tbl_fabricantes f ON f.id_fabricante = p.fabricante
                                       order by fabricante');

            $conteo = ceil(productos::where('fabricante',$request->fabricante)->count() / 500);
        }

        $options =  view('productos.table',compact('productos','conteo','init','fab'))->render();
        return json_encode($options);

    }
}
