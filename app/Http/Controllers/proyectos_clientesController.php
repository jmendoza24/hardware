<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createproyectos_clientesRequest;
use App\Http\Requests\Updateproyectos_clientesRequest;
use App\Repositories\proyectos_clientesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class proyectos_clientesController extends AppBaseController
{
    /** @var  proyectos_clientesRepository */
    private $proyectosClientesRepository;

    public function __construct(proyectos_clientesRepository $proyectosClientesRepo)
    {
        $this->proyectosClientesRepository = $proyectosClientesRepo;
    }

    /**
     * Display a listing of the proyectos_clientes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $proyectosClientes = $this->proyectosClientesRepository->all();

        return view('proyectos_clientes.index')
            ->with('proyectosClientes', $proyectosClientes);
    }

    /**
     * Show the form for creating a new proyectos_clientes.
     *
     * @return Response
     */
    public function create()
    {
        return view('proyectos_clientes.create');
    }

    /**
     * Store a newly created proyectos_clientes in storage.
     *
     * @param Createproyectos_clientesRequest $request
     *
     * @return Response
     */
    public function store(Createproyectos_clientesRequest $request)
    {
        $input = $request->all();

        $proyectosClientes = $this->proyectosClientesRepository->create($input);

        Flash::success('Proyectos Clientes saved successfully.');

        return redirect(route('proyectosClientes.index'));
    }

    /**
     * Display the specified proyectos_clientes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $proyectosClientes = $this->proyectosClientesRepository->find($id);

        if (empty($proyectosClientes)) {
            Flash::error('Proyectos Clientes not found');

            return redirect(route('proyectosClientes.index'));
        }

        return view('proyectos_clientes.show')->with('proyectosClientes', $proyectosClientes);
    }

    /**
     * Show the form for editing the specified proyectos_clientes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $proyectosClientes = $this->proyectosClientesRepository->find($id);

        if (empty($proyectosClientes)) {
            Flash::error('Proyectos Clientes not found');

            return redirect(route('proyectosClientes.index'));
        }

        return view('proyectos_clientes.edit')->with('proyectosClientes', $proyectosClientes);
    }

    /**
     * Update the specified proyectos_clientes in storage.
     *
     * @param int $id
     * @param Updateproyectos_clientesRequest $request
     *
     * @return Response
     */
    public function update($id, Updateproyectos_clientesRequest $request)
    {
        $proyectosClientes = $this->proyectosClientesRepository->find($id);

        if (empty($proyectosClientes)) {
            Flash::error('Proyectos Clientes not found');

            return redirect(route('proyectosClientes.index'));
        }

        $proyectosClientes = $this->proyectosClientesRepository->update($request->all(), $id);

        Flash::success('Proyectos Clientes updated successfully.');

        return redirect(route('proyectosClientes.index'));
    }

    /**
     * Remove the specified proyectos_clientes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $proyectosClientes = $this->proyectosClientesRepository->find($id);

        if (empty($proyectosClientes)) {
            Flash::error('Proyectos Clientes not found');

            return redirect(route('proyectosClientes.index'));
        }

        $this->proyectosClientesRepository->delete($id);

        Flash::success('Proyectos Clientes deleted successfully.');

        return redirect(route('proyectosClientes.index'));
    }
}
