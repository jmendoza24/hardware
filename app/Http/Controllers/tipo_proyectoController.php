<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createtipo_proyectoRequest;
use App\Http\Requests\Updatetipo_proyectoRequest;
use App\Repositories\tipo_proyectoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class tipo_proyectoController extends AppBaseController
{
    /** @var  tipo_proyectoRepository */
    private $tipoProyectoRepository;

    public function __construct(tipo_proyectoRepository $tipoProyectoRepo)
    {
        $this->tipoProyectoRepository = $tipoProyectoRepo;
    }

    /**
     * Display a listing of the tipo_proyecto.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tipoProyectos = $this->tipoProyectoRepository->all();

        return view('tipo_proyectos.index')
            ->with('tipoProyectos', $tipoProyectos);
    }

    /**
     * Show the form for creating a new tipo_proyecto.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipo_proyectos.create');
    }

    /**
     * Store a newly created tipo_proyecto in storage.
     *
     * @param Createtipo_proyectoRequest $request
     *
     * @return Response
     */
    public function store(Createtipo_proyectoRequest $request)
    {
        $input = $request->all();

        $tipoProyecto = $this->tipoProyectoRepository->create($input);

        Flash::success('Tipo Proyecto saved successfully.');

        return redirect(route('tipoProyectos.index'));
    }

    /**
     * Display the specified tipo_proyecto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoProyecto = $this->tipoProyectoRepository->find($id);

        if (empty($tipoProyecto)) {
            Flash::error('Tipo Proyecto not found');

            return redirect(route('tipoProyectos.index'));
        }

        return view('tipo_proyectos.show')->with('tipoProyecto', $tipoProyecto);
    }

    /**
     * Show the form for editing the specified tipo_proyecto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoProyecto = $this->tipoProyectoRepository->find($id);

        if (empty($tipoProyecto)) {
            Flash::error('Tipo Proyecto not found');

            return redirect(route('tipoProyectos.index'));
        }

        return view('tipo_proyectos.edit')->with('tipoProyecto', $tipoProyecto);
    }

    /**
     * Update the specified tipo_proyecto in storage.
     *
     * @param int $id
     * @param Updatetipo_proyectoRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetipo_proyectoRequest $request)
    {
        $tipoProyecto = $this->tipoProyectoRepository->find($id);

        if (empty($tipoProyecto)) {
            Flash::error('Tipo Proyecto not found');

            return redirect(route('tipoProyectos.index'));
        }

        $tipoProyecto = $this->tipoProyectoRepository->update($request->all(), $id);

        Flash::success('Tipo Proyecto updated successfully.');

        return redirect(route('tipoProyectos.index'));
    }

    /**
     * Remove the specified tipo_proyecto from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoProyecto = $this->tipoProyectoRepository->find($id);

        if (empty($tipoProyecto)) {
            Flash::error('Tipo Proyecto not found');

            return redirect(route('tipoProyectos.index'));
        }

        $this->tipoProyectoRepository->delete($id);

        Flash::success('Tipo Proyecto deleted successfully.');

        return redirect(route('tipoProyectos.index'));
    }
}
