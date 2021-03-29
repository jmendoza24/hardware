<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use App\Models\Estados;
use App\Models\catalogos;
use App\Models\Clientes;
use App\Models\proyectos;
use App\Models\proyectos_clientes;
use App\Models\proyectos_files;
use App\Models\tipo_proyecto;
use App\Models\cliente_participantes;
use App\Http\Requests\CreateproyectosRequest;
use App\Http\Requests\UpdateproyectosRequest;
use App\Repositories\proyectosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use DB;

class proyectosController extends AppBaseController
{
    /** @var  proyectosRepository */
    private $proyectosRepository;

    public function __construct(proyectosRepository $proyectosRepo)
    {
        $this->proyectosRepository = $proyectosRepo;
    }

    /**
     * Display a listing of the proyectos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $proyectos = proyectos::get();

        return view('proyectos.index')
            ->with('proyectos', $proyectos);
    }

    /**
     * Show the form for creating a new proyectos.
     *
     * @return Response
     */
    public function create(){
        $proyectos = array('estatus'=>'',
                           'pais'=>146,
                           'estado'=>0,
                           'municipio'=>'',
                           'tipo'=>0);
        $estados = estados::get();
        $municipios = array();
        $paises = Pais::get();
        $clientes = array();
        $proyectos_clientes = array();
        $proyectos_files = array();
        $proyectos = (object)$proyectos;
        $tipo_proyecto = tipo_proyecto::get();
        
        $proyectos_id  = 0;

        return view('proyectos.create',compact('proyectos','proyectos_id','estados','municipios','paises','clientes','proyectos_clientes','proyectos_files','tipo_proyecto'));
    }

    /**
     * Store a newly created proyectos in storage.
     *
     * @param CreateproyectosRequest $request
     *
     * @return Response
     */
    public function store(CreateproyectosRequest $request)
    {
        $input = $request->all();

        $proyectos = $this->proyectosRepository->create($input);

        ##Flash::success('Proyectos saved successfully.');

        return redirect()->route('proyectos.edit', [$proyectos->id]);
    }

    /**
     * Display the specified proyectos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $proyectos = $this->proyectosRepository->find($id);

        if (empty($proyectos)) {
            Flash::error('Proyectos not found');

            return redirect(route('proyectos.index'));
        }

        return view('proyectos.show')->with('proyectos', $proyectos);
    }

    /**
     * Show the form for editing the specified proyectos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id){
        $catalogos = new catalogos;  
        $proyecto = new proyectos; 
        $proyecto->id_proyecto = $id;

        $proyectos = $this->proyectosRepository->find($id);
        $estados = estados::get();
        $paises = Pais::get();
        $clientes = db::select('select distinct id as id_cliente, contacto nombre
                                from cliente_participantes
                                where id not in (select id_cliente from proyectos_clientes where id_proyecto  = '.$id . ') 
                                order by contacto');
        $catalogos->id_estado = $proyectos->estado;
        $proyectos_files = proyectos_files::where('id_proyecto',$id)->get();

        $municipios = $catalogos->get_municipios($catalogos);

        $proyectos_clientes = $proyecto->lista_clientes($proyecto);
        $proyectos_id = $id;
    
        $tipo_proyecto = tipo_proyecto::get();

        return view('proyectos.edit',compact('proyectos','proyectos_id', 'estados','paises','municipios','clientes','proyectos_clientes','proyectos_files','tipo_proyecto'));
    }

    /**
     * Update the specified proyectos in storage.
     *
     * @param int $id
     * @param UpdateproyectosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateproyectosRequest $request)
    {
        $proyectos = $this->proyectosRepository->find($id);

        if (empty($proyectos)) {
            Flash::error('Proyectos not found');

            return redirect(route('proyectos.index'));
        }

        $proyectos = $this->proyectosRepository->update($request->all(), $id);

        Flash::success('Proyectos updated successfully.');

        return redirect(route('proyectos.index'));
    }

    /**
     * Remove the specified proyectos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $proyectos = $this->proyectosRepository->find($id);

        if (empty($proyectos)) {
            Flash::error('Proyectos not found');

            return redirect(route('proyectos.index'));
        }

        $this->proyectosRepository->delete($id);

        Flash::success('Proyectos deleted successfully.');

        return redirect(route('proyectos.index'));
    }

    function agrega_clientes(Request $request){
        $proyecto = new proyectos;
        $proyecto->id_proyecto = $request->id_proyecto;

        $existe = proyectos_clientes::where([['id_proyecto',$request->id_proyecto],['id_cliente',$request->id_cliente]])->count();

        if($existe == 0){
            proyectos_clientes::insert(['id_proyecto'=>$request->id_proyecto,
                                        'id_cliente'=>$request->id_cliente,
                                        'comentario'=>$request->cliente_comentarios]);
        }

        $proyectos_clientes = $proyecto->lista_clientes($proyecto);
        $clientes = db::select('select distinct id as id_cliente, contacto nombre
                                from cliente_participantes
                                where id not in (select id_cliente from proyectos_clientes where id_proyecto  = '.$request->id_proyecto . ') 
                                order by contacto');
        $proyectos_id = $request->id_proyecto;

        $options = view('proyectos.clientes',compact('proyectos_clientes','clientes','proyectos_id'))->render();

        return json_encode($options);

    }

    function elimina_clientes(Request $request){
        proyectos_clientes::where('id',$request->id)->delete();

        $proyecto = new proyectos;
        $proyecto->id_proyecto = $request->id_proyecto;
        $proyectos_clientes = $proyecto->lista_clientes($proyecto);

        $clientes = db::select('select distinct id as id_cliente, contacto nombre
                                from cliente_participantes
                                where id not in (select id_cliente from proyectos_clientes where id_proyecto  = '.$request->id_proyecto . ') 
                                order by contacto');
        $proyectos_id = $request->id_proyecto;

        $options = view('proyectos.clientes',compact('proyectos_clientes','clientes','proyectos_id'))->render();

        return json_encode($options);
    }

    function guarda_comentarios(Request $request){
        proyectos::where('id',$request->id)
                    ->update(['comentarios',$request->comentario]);
    }
}
