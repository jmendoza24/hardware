<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createtbl_oc_fabRequest;
use App\Http\Requests\Updatetbl_oc_fabRequest;
use App\Repositories\tbl_oc_fabRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\tbl_oc_fab;
use App\Models\pedidos_detalles;
use App\Models\cotizador_detalle;
use App\Models\items_productos;
use Flash;
use Response;
use DB;
use Session;
use Redirect;
class tbl_oc_fabController extends AppBaseController
{
    /** @var  tbl_oc_fabRepository */
    private $tblOcFabRepository;

    public function __construct(tbl_oc_fabRepository $tblOcFabRepo)
    {
        $this->tblOcFabRepository = $tblOcFabRepo;
    }

    /**
     * Display a listing of the tbl_oc_fab.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request){

        $id_pedido = $request->session()->has('id_pedido') ? $request->session()->get('id_pedido') : 0;
        $tblOcFabs = db::select('call proceso_pedidos_informacion('.$id_pedido.')');

        return view('tbl_oc_fabs.index',compact('tblOcFabs'));
    }   

    public function show(Request $request,$id){
        
        if($request->session()->has('id_pedido')){
            $id_pedido = $request->session()->get('id_pedido');
        }else{
            
            $id_pedido = tbl_oc_fab::insertGetId(['estatus'=>1,'id_fabricante'=>$id]);
            $request->session()->put('id_pedido',$id_pedido);
            $id_pedido = $id_pedido;
        }

        $pedido = new tbl_oc_fab;
        $pedido->id_pedido = $id_pedido;
        $pedido->id = $id;

        $tblOcFabs = $pedido->informacion_pedido($pedido);
        $id_fabricante = $id;


        return view('tbl_oc_fabs.show',compact('tblOcFabs','id_pedido','id_fabricante'));
  
    }

    function guarda_pedido(Request $request){
        $id_pedido = $request->session()->get('id_pedido');
        $pedido = new tbl_oc_fab;
        $pedido->id_pedido = $id_pedido;
        $pedido->id = $request->id_fabricante;
        
        $datos = $request->tipo ==1 ?
                    cotizador_detalle::where('id',$request->id)->first():
                    items_productos::where('id',$request->id)->first;

        $cantidad = pedidos_detalles::where([['tipo',$request->tipo],['id_detalle',$request->id],['id_pedido',$id_pedido]])
                    ->selectraw('sum(cantidad) as cantidad, id_detalle, tipo')
                    ->groupby('id_detalle','tipo')
                    ->first();

        
        if(isset($cantidad) == false){
            $cantidad = (object)array('cantidad'=>0);
        }

        if($cantidad->cantidad < $datos->ocf){
            pedidos_detalles::updateOrCreate(['id_pedido'=>$id_pedido,'tipo'=>$request->tipo,'id_detalle'=>$request->id,'id_pedido'=>$id_pedido],
                                    ['id_pedido'=>$id_pedido,
                                    'tipo'=>$request->tipo,
                                    'id_detalle'=>$request->id,
                                    'cantidad'=>str_replace(',','',$request->cantidad),
                                    'lp'=>$request->lp]);
        }
        

        $tblOcFabs = $pedido->informacion_pedido($pedido);
        $id_fabricante = $request->id_fabricante;
        $id_pedido = $pedido->id;
        $options = view('tbl_oc_fabs.pedidos',compact('tblOcFabs','id_fabricante'))->render();

        return json_encode($options);

    }

    function pedidos(Request $request){
        $pedidos = db::select('SELECT f.id, fab.fabricante, fab.abrev, COUNT(cantidad) AS cantidad, SUM(cantidad * lp) AS total, f.estatus
                                FROM pedidos_fabricantes f
                                INNER JOIN pedidos_detalles d ON d.id_pedido = f.id
                                INNER JOIN tbl_fabricantes fab ON fab.id_fabricante = f.id_fabricante
                                GROUP BY f.id, fab.fabricante, fab.abrev,f.estatus');

        return view('tbl_oc_fabs.listado_pedidos',compact('pedidos'));
    }

    function ver_pedido(Request $request){
        $tblOcFabs = db::select("SELECT f.id, fab.abrev,  det.id_fab, det.handing, det.finish, det.style_sel as style, c.id_occ, d.cantidad, d.lp, pr.nombre, pr.nombre_corto
                            FROM pedidos_fabricantes f
                            INNER JOIN pedidos_detalles d ON d.id_pedido = f.id 
                            INNER JOIN tbl_fabricantes fab ON fab.id_fabricante = f.id_fabricante
                            INNER JOIN cotizacion_detalle det ON d.id_detalle = det.id
                            INNER JOIN productos p ON p.id=det.item
                            INNER JOIN cotizacions c ON c.id = det.id_cotizacion
                            LEFT JOIN proyectos pr ON pr.id = c.proyecto
                            WHERE id_pedido = ".$request->id_pedido."
                            AND d.tipo = 1
                            UNION all
                            SELECT f.id, fab.abrev,  p.codigo_sistema, '', '', '', c.id_occ, d.cantidad, d.lp, pr.nombre, pr.nombre_corto
                            FROM pedidos_fabricantes f
                            INNER JOIN pedidos_detalles d ON d.id_pedido = f.id 
                            INNER JOIN tbl_fabricantes fab ON fab.id_fabricante = f.id_fabricante
                            INNER JOIN items_productos det ON d.id_detalle = det.id
                            INNER JOIN productos p ON p.id=det.item
                            INNER JOIN cotizacions c ON c.id = det.id_cotizacion
                            LEFT JOIN proyectos pr ON pr.id = c.proyecto
                            WHERE id_pedido = ".$request->id_pedido."
                            AND d.tipo = 2");

        $options = view('tbl_oc_fabs.vista_pedido',compact('tblOcFabs'))->render();
        return json_encode($options);
    }



    public function estatus_pedido2(Request $request){



     DB::table('pedidos_fabricantes')->where([['id_pedido',$request['pedido']]])->update(['estatus'=>$request['cpedido']]);
      
    //return Redirect::back();
     return 1;

    }

    public function finaliza_pedido(Request $request){
        $request->session()->forget('id_pedido');
        return redirect()->route('tblOcFabs.index');
    }
        
}
