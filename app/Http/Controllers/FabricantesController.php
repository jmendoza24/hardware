<?php

namespace App\Http\Controllers;

use App\Models\catalogos;
use App\Models\Pais;
use App\Models\TipoProducto;
use App\Models\FabricanteContacto;
use App\Models\Fabricantes;
use App\Models\Fabricantes_costos;
use App\Http\Requests\CreateFabricantesRequest;
use App\Http\Requests\UpdateFabricantesRequest;
use App\Repositories\FabricantesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use View;
use DB;

class FabricantesController extends AppBaseController
{
    /** @var  FabricantesRepository */
    private $fabricantesRepository; 

    public function __construct(FabricantesRepository $fabricantesRepo)
    {
        $this->fabricantesRepository = $fabricantesRepo;
    }

    /**
     * Display a listing of the Fabricantes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $fabricantes = $this->fabricantesRepository->all();

        return view('fabricantes.index')
            ->with('fabricantes', $fabricantes);
    }

    /**
     * Show the form for creating a new Fabricantes.
     *
     * @return Response
     */
    public function create()
    {
        $fabricantes = array();
        $pais = Pais::get();
        $gama = array();
        $modalidad  = array();
        $catalogos = array();
        $fab_contactos  = array();
        $fabricantes = array('pais'=>'',
                             'modalidad'=>'',
                             'activo'=>0,
                             'id_fabricante'=>0);

        $fabricantes = (object)$fabricantes;

        return view('fabricantes.create',compact('fabricantes','pais','gama','modalidad','catalogos','fab_contactos'));
    }

    function costos(Request $request){
        db::update('insert into fabricantes_costos(id_fabricante)
                    SELECT distinct id_fabricante 
                    FROM tbl_fabricantes
                    WHERE id_fabricante NOT IN (SELECT id_fabricante FROM fabricantes_costos )');
        $fab = new Fabricantes;
        $fabricantes = $fab->lista_precios();

      return view('fabricantes.costos',compact('fabricantes'));
    }

    function guarda_costo(Request $request){
        $fab = new Fabricantes;
        
        Fabricantes_costos::where('id',$request->id)
                            ->update([$request->campo=>$request->valor]);

        return 1;
        
        /*
        $fabricantes = $fab->lista_precios();
        $options = view('fabricantes.table_costos',compact('fabricantes'))->render();

        return json_encode($options);*/
    }

    /**
     * Store a newly created Fabricantes in storage.
     *
     * @param CreateFabricantesRequest $request
     *
     * @return Response
     */
    public function store(CreateFabricantesRequest $request)
    {
        $input = $request->all();

        $fabricantes = $this->fabricantesRepository->create($input);

        Flash::success('Fabricantes saved successfully.');

        return redirect(route('fabricantes.index'));
    }

    /**
     * Display the specified Fabricantes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $fabricantes = $this->fabricantesRepository->find($id);

        if (empty($fabricantes)) {
            Flash::error('Fabricantes not found');

            return redirect(route('fabricantes.index'));
        }

        return view('fabricantes.show')->with('fabricantes', $fabricantes);
    }

    /**
     * Show the form for editing the specified Fabricantes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id){

        $catalogos = new catalogos;

        $fabricantes = $this->fabricantesRepository->find($id);
        $pais = Pais::get();
        $gama = TipoProducto::where([['id_catalogo',3],['num_tipo',1],['activo',1]])->get();
        $modalidad = TipoProducto::where([['id_catalogo',3],['num_tipo',2],['activo',1]])->get();
        $fab_contactos = FabricanteContacto::where('id_fabricante',$id)->get();
        $catalogos->fabricante = $id;
        $catalogos = $catalogos->lista_catalogo($catalogos);
        if (empty($fabricantes)) {
            Flash::error('Fabricantes not found');

            return redirect(route('fabricantes.index'));
        }

        return view('fabricantes.edit',compact('fabricantes','pais','gama','modalidad','fab_contactos','catalogos'));
    }

    /**
     * Update the specified Fabricantes in storage.
     *
     * @param int $id
     * @param UpdateFabricantesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFabricantesRequest $request)
    {
        $fabricantes = $this->fabricantesRepository->find($id);

        if (empty($fabricantes)) {
            Flash::error('Fabricantes not found');

            return redirect(route('fabricantes.index'));
        }

        $fabricantes = $this->fabricantesRepository->update($request->all(), $id);

        Flash::success('Fabricantes updated successfully.');

        return redirect(route('fabricantes.index'));
    }

    /**
     * Remove the specified Fabricantes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $fabricantes = $this->fabricantesRepository->find($id);

        if (empty($fabricantes)) {
            Flash::error('Fabricantes not found');

            return redirect(route('fabricantes.index'));
        }

        $this->fabricantesRepository->delete($id);

        Flash::success('Fabricantes deleted successfully.');

        return redirect(route('fabricantes.index'));
    }

    function nuevo_contacto_fab(Request $request){

        if($request->id_contacto >0){
            $contacto = FabricanteContacto::where('id_contacto',$request->id_contacto)->get();    
            $contacto = $contacto[0];
        }else{
            $contacto = array('contacto'=>'',
                              'telefono'=>'',
                              'telefono_2'=>'',
                              'correo'=>'',
                              'comentarios'=>'',
                              'id_contacto'=>0,
                              'id_fabricante'=>$request->id_fabricante);
            $contacto = (object)$contacto;
        }

        $options = view('fabricantes.fields_contacto',compact('contacto'))->render();

        return json_encode($options);

    }

    function guarda_contacto_fab(Request $request){
        $contacto = new FabricanteContacto();
        $contacto = $contacto->guarda_contacto($request);
        $fab_contactos = FabricanteContacto::where('id_fabricante',$request->id_fabricante)->get();
        $options = view('fabricantes.contacto',compact('fab_contactos'))->render();
        return json_encode($options);
    }

    function delete_contacto_fab(Request $request){
        FabricanteContacto::where('id_contacto',$request->id_contacto)->delete();
        $fab_contactos = FabricanteContacto::where('id_fabricante',$request->id_fabricante)->get();
        $options = view('fabricantes.contacto',compact('fab_contactos'))->render();
        return json_encode($options);
    }
}
