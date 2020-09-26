<?php

namespace App\Http\Controllers;
use App\Models\Clientes;
use App\Models\Pais;
use App\Models\Estados;
use App\Models\TipoProducto;
use App\Models\Fabricantes;
use App\Models\tipo_cliente;
use App\Models\cliente_participantes;
use App\Http\Requests\CreateClientesRequest;
use App\Http\Requests\UpdateClientesRequest;
use App\Repositories\ClientesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request; 
use Flash;
use Response;
use DB;
use View;

class ClientesController extends AppBaseController
{
    /** @var  ClientesRepository */
    private $clientesRepository;

    public function __construct(ClientesRepository $clientesRepo)
    {
        $this->clientesRepository = $clientesRepo;
    }

    /**
     * Display a listing of the Clientes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $clientes = db::select('SELECT p.*, empresa
                                FROM cliente_participantes p
                                inner JOIN tbl_clientes c ON c.id_cliente = p.id_cliente');
       
        return view('clientes.index')
            ->with('clientes', $clientes);
    }

    /**
     * Show the form for creating a new Clientes.
     *
     * @return Response
     */
    public function create()
    {
        $clientes = array('pais'=>146,
                          'estado'=>'',
                          'municipios'=>'',
                          'activo'=>'',
                          'id_tipo1'=>'',
                          'id_tipo2'=>'',
                          'id_precio'=>0,
                          'id_cliente'=>'');

        $clientes = (object)$clientes;
        $pais = Pais::get();
        $estados = Estados::get();
        $municipios = array();
        $lista_cliente  = array();
        $fabricante = Fabricantes::get();
        $tipo1 = TipoProducto::where([['id_catalogo',2],['num_tipo',1],['activo',1]])->get();
        $tipo2 = TipoProducto::where([['id_catalogo',2],['num_tipo',2],['activo',1]])->get();
        $tipo_cliente = tipo_cliente::get();

        $participantes = array();
        return view('clientes.create',compact('clientes','pais','estados','municipios','tipo1','tipo2','lista_cliente','fabricante','tipo_cliente','participantes'));
    }

    /**
     * Store a newly created Clientes in storage.
     *
     * @param CreateClientesRequest $request
     *
     * @return Response
     */
    public function store(CreateClientesRequest $request)
    {
        $input = $request->all();

        $clientes = $this->clientesRepository->create($input);

        cliente_participantes::insert(['id_cliente'=>$clientes->id_cliente,
                                       'contacto'=>$clientes->nombre,
                                       'telefono'=>$clientes->telefono1,
                                       'puesto'=>'Principal',
                                       'activo'=>1]);

        Flash::success('Clientes saved successfully.');
        return redirect()->route('clientes.edit', [$clientes->id_cliente]);
        
    }

    /**
     * Display the specified Clientes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $clientes = db::table('tbl_clientes')
                    ->where('id_cliente',$id)
                    ->get();

        if (empty($clientes)) {
            Flash::error('Clientes not found');

            return redirect(route('clientes.index'));
        }

        return view('clientes.show')->with('clientes', $clientes);
    }

    /**
     * Show the form for editing the specified Clientes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id){
        $filtro = new Estados();
        $fabricante = new Clientes();

        $clientes = Clientes::where('id_cliente',$id)->get();
        $clientes = $clientes[0];
        $pais = Pais::get();
        $estados = Estados::get();

        $filtro->id_municipio = $clientes->estado;        
        $municipios = $filtro->municipios($filtro);
        $tipo1 = TipoProducto::where([['id_catalogo',2],['num_tipo',1],['activo',1]])->get();
        $tipo2 = TipoProducto::where([['id_catalogo',2],['num_tipo',2],['activo',1]])->get();
        $tipo3 = TipoProducto::where([['id_catalogo',2],['num_tipo',3],['activo',1]])->get();
        $tipo4 = TipoProducto::where([['id_catalogo',2],['num_tipo',4],['activo',1]])->get();

        $fabricante->id_cliente = $clientes->id_cliente;
        $fabricante = $fabricante->obtieneFabricantes($fabricante);

      #  $fabricante = FabricanteContacto::where('id_fabricante',$id)->get();
        $lista_cliente = Clientes::where([['activo',1],['id_cliente','!=',$id]])->get();
        $tipo_cliente = tipo_cliente::get();
        $participantes = cliente_participantes::where('id_cliente',$id)->get();

        return view('clientes.edit',compact('clientes','pais','estados','municipios','tipo1','tipo2','tipo3','tipo4','fabricante','lista_cliente','tipo_cliente','participantes'));
    }

    /**
     * Update the specified Clientes in storage.
     *
     * @param int $id
     * @param UpdateClientesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClientesRequest $request)
    {
         $clientes = db::table('tbl_clientes')
                    ->where('id_cliente',$id)
                    ->get();

        if (empty($clientes)) {
            Flash::error('Clientes not found');

            return redirect(route('clientes.index'));
        }

        $clientes = $this->clientesRepository->update($request->all(), $id);

        Flash::success('Clientes updated successfully.');

        return redirect(route('clientes.index'));
    }

    /**
     * Remove the specified Clientes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
         db::table('tbl_clientes')
        ->where('id_cliente',$id)
        ->delete();

        if (empty($clientes)) {
            Flash::error('Clientes not found');

            return redirect(route('clientes.index'));
        }

        $this->clientesRepository->delete($id);

        Flash::success('Clientes deleted successfully.');

        return redirect(route('clientes.index'));
    }

    function clientes_asignado(Request $request){
        $clientes = new Clientes();

        $clientes->id_cliente = $request->id_cliente;
        $clientes->cliente_id = $request->cliente_id;

        $insertado = $clientes->inserta_asignado($clientes);
        if($insertado ==1){
            return 1;
        }else{
            $fabricante = $clientes->obtieneFabricantes($clientes);

            $options = view('clientes.asignacion',compact('fabricante'))->render();
            return json_encode($options);    
        }
        
    }

    function elimina_cliente_asignado(Request $request){
        $clientes = new Clientes();
        $clientes->cliente_id = $request->cliente_id;
        $clientes->id_cliente = $request->id_cliente;

        $clientes->elimina_asignado($clientes);
        $fabricante = $clientes->obtieneFabricantes($clientes);
        $options = view('clientes.asignacion',compact('fabricante'))->render();
        
        return json_encode($options);
    }
}
