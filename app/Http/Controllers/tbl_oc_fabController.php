<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createtbl_oc_fabRequest;
use App\Http\Requests\Updatetbl_oc_fabRequest;
use App\Repositories\tbl_oc_fabRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
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
    public function index(Request $request)
    {
        $tblOcFabs = db::select("CALL totales_oc()");


        return view('tbl_oc_fabs.index',compact('tblOcFabs'));
    }   



    public function estatus_pedido2(Request $request){



     DB::table('pedidos_fabricantes')->where([['id_pedido',$request['pedido']]])->update(['estatus'=>$request['cpedido']]);
      
    //return Redirect::back();
     return 1;

    }


    public function agrega_producto_oc(Request $request){


    $id_fab=$request['id_fab'];
    $fabricante=$request['fabricante'];
    $cant=$request['cant'];
    $idf=$request['idf'];
    $subtotal=$request['subtotal'];
    $total=$request['total'];
    $id_dc=$request['id_dc'];
    $pedido = $request->session()->get('pedido');
    $cpedido=$request['cpedido'];

    if($cpedido=='' || $cpedido==0){
        $cpedido=0;
    }else{
        $cpedido=$request['cpedido'];

    }

        $maxcotizacion=DB::table('pedidos_fabricantes')
                         ->selectraw('max(id_pedido) as id_pedido') 
                         ->get();
        $maxcotizacion = $maxcotizacion[0];


        $tblOcFabs = db::select("SELECT count(*) as c from tbl_oc_fabricantes where id_relacion=$id_dc and id_pedido=$maxcotizacion->id_pedido");

        if($tblOcFabs[0]->c!=0  and $cpedido==0){


           db::table('tbl_oc_fabricantes')
                ->where('id_relacion',$id_dc)
                ->delete();
        }else{


            db::table('tbl_oc_fabricantes')
              ->insert(['id_fab'=>$id_fab,
                         'fabricante'=>$fabricante,
                         'cant'=>$cpedido,
                         'idf'=>$idf,
                         'subtotal'=>$subtotal,
                         'total'=>$total*$cant,
                         'id_relacion'=>$id_dc,
                         'id_pedido'=>$maxcotizacion->id_pedido, 

                      ]);

        }

      $totales = db::select("SELECT CAST(sum(total) AS DECIMAL(10,6)) as tot from tbl_oc_fabricantes where id_pedido=$maxcotizacion->id_pedido");
      $totales=$totales[0];
      $totales->tot;

      $valor=$totales->tot; 
      return  $valor;




    }

    public function finaliza_pedido(Request $request){



        $maxcotizacion=DB::table('pedidos_fabricantes')
                         ->selectraw('max(id_pedido) as id_pedido') 
                         ->get();
        $maxcotizacion = $maxcotizacion[0];

        DB::table('pedidos_fabricantes')->where([['id_pedido',$maxcotizacion->id_pedido]])->update(['estatus'=>1]);

        $request->session()->forget('id_pedido');
        return 1;
    }
    /**
     * Show the form for creating a new tbl_oc_fab.
     *
     * @return Response
     */
    public function create()
    {
        return view('tbl_oc_fabs.create');
    }

    /**
     * Store a newly created tbl_oc_fab in storage.
     *
     * @param Createtbl_oc_fabRequest $request
     *
     * @return Response
     */
    public function store(Createtbl_oc_fabRequest $request)
    {
        $input = $request->all();

        $tblOcFab = $this->tblOcFabRepository->create($input);

        Flash::success('Tbl Oc Fab saved successfully.');

        return redirect(route('tblOcFabs.index'));
    }

    /**
     * Display the specified tbl_oc_fab.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show(Request $request,$id)
    {
        $tblOcFabs = db::select("CALL producto_fab_ordenes($id)");

       
        $maxcotizacion=DB::table('pedidos_fabricantes')
                         ->selectraw('ifnull(max(id_pedido),0)+1 as id_pedido') 
                         ->get();
            $maxcotizacion = $maxcotizacion[0];

            $id = DB::table('pedidos_fabricantes')->insertGetId(
                array('estatus' => 0)
            );

            $request->session()->put('id_pedido',$maxcotizacion->id_pedido);

            #insert into cotizacion ''' 
         //   $pedido = $request->session()->get('id_pedido');

//dd($pedido);
            //session('num_cot'=>$session->cotizacion_num);

        
        return view('tbl_oc_fabs.show',compact('tblOcFabs'));
  



    }


    public function pedidos(Request $request){



        $pedidos = db::select("SELECT p.id_pedido,c.fabricante,p.estatus ,SUM(c.cant) AS cant, SUM(c.total) AS total
        FROM pedidos_fabricantes p
        INNER JOIN tbl_oc_fabricantes c ON c.id_pedido=p.id_pedido
        where p.estatus!=0
        GROUP BY c.fabricante,p.id_pedido,p.estatus");

        return view('tbl_oc_fabs.show2',compact('pedidos'));


    }


    public function ver_pedidos(Request $request){

        $id_pedido=$request['id_pedido'];

        $pedidos = db::select("SELECT p.id_pedido,c.fabricante,c.id_fab,p.estatus ,c.cant AS cant, c.total AS total
        FROM pedidos_fabricantes p
        INNER JOIN tbl_oc_fabricantes c ON c.id_pedido=p.id_pedido
        where p.id_pedido=$id_pedido
        ");



        $options = view('tbl_oc_fabs.vista_pedido',compact('pedidos'))->render();

        return json_encode($options);


    }

    /**
     * Show the form for editing the specified tbl_oc_fab.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tblOcFab = $this->tblOcFabRepository->find($id);

        if (empty($tblOcFab)) {
            Flash::error('Tbl Oc Fab not found');

            return redirect(route('tblOcFabs.index'));
        }

        return view('tbl_oc_fabs.edit')->with('tblOcFab', $tblOcFab);
    }

    /**
     * Update the specified tbl_oc_fab in storage.
     *
     * @param int $id
     * @param Updatetbl_oc_fabRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetbl_oc_fabRequest $request)
    {
        $tblOcFab = $this->tblOcFabRepository->find($id);

        if (empty($tblOcFab)) {
            Flash::error('Tbl Oc Fab not found');

            return redirect(route('tblOcFabs.index'));
        }

        $tblOcFab = $this->tblOcFabRepository->update($request->all(), $id);

        Flash::success('Tbl Oc Fab updated successfully.');

        return redirect(route('tblOcFabs.index'));
    }

    /**
     * Remove the specified tbl_oc_fab from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tblOcFab = $this->tblOcFabRepository->find($id);

        if (empty($tblOcFab)) {
            Flash::error('Tbl Oc Fab not found');

            return redirect(route('tblOcFabs.index'));
        }

        $this->tblOcFabRepository->delete($id);

        Flash::success('Tbl Oc Fab deleted successfully.');

        return redirect(route('tblOcFabs.index'));
    }
}
