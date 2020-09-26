<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createtipo_clienteRequest;
use App\Http\Requests\Updatetipo_clienteRequest;
use App\Repositories\tipo_clienteRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class tipo_clienteController extends AppBaseController
{
    /** @var  tipo_clienteRepository */
    private $tipoClienteRepository;

    public function __construct(tipo_clienteRepository $tipoClienteRepo)
    {
        $this->tipoClienteRepository = $tipoClienteRepo;
    }

    /**
     * Display a listing of the tipo_cliente.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tipoClientes = $this->tipoClienteRepository->all();

        return view('tipo_clientes.index')
            ->with('tipoClientes', $tipoClientes);
    }

    /**
     * Show the form for creating a new tipo_cliente.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipo_clientes.create');
    }

    /**
     * Store a newly created tipo_cliente in storage.
     *
     * @param Createtipo_clienteRequest $request
     *
     * @return Response
     */
    public function store(Createtipo_clienteRequest $request)
    {
        $input = $request->all();

        $tipoCliente = $this->tipoClienteRepository->create($input);

        Flash::success('Tipo Cliente saved successfully.');

        return redirect(route('tipoClientes.index'));
    }

    /**
     * Display the specified tipo_cliente.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoCliente = $this->tipoClienteRepository->find($id);

        if (empty($tipoCliente)) {
            Flash::error('Tipo Cliente not found');

            return redirect(route('tipoClientes.index'));
        }

        return view('tipo_clientes.show')->with('tipoCliente', $tipoCliente);
    }

    /**
     * Show the form for editing the specified tipo_cliente.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoCliente = $this->tipoClienteRepository->find($id);

        if (empty($tipoCliente)) {
            Flash::error('Tipo Cliente not found');

            return redirect(route('tipoClientes.index'));
        }

        return view('tipo_clientes.edit')->with('tipoCliente', $tipoCliente);
    }

    /**
     * Update the specified tipo_cliente in storage.
     *
     * @param int $id
     * @param Updatetipo_clienteRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetipo_clienteRequest $request)
    {
        $tipoCliente = $this->tipoClienteRepository->find($id);

        if (empty($tipoCliente)) {
            Flash::error('Tipo Cliente not found');

            return redirect(route('tipoClientes.index'));
        }

        $tipoCliente = $this->tipoClienteRepository->update($request->all(), $id);

        Flash::success('Tipo Cliente updated successfully.');

        return redirect(route('tipoClientes.index'));
    }

    /**
     * Remove the specified tipo_cliente from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoCliente = $this->tipoClienteRepository->find($id);

        if (empty($tipoCliente)) {
            Flash::error('Tipo Cliente not found');

            return redirect(route('tipoClientes.index'));
        }

        $this->tipoClienteRepository->delete($id);

        Flash::success('Tipo Cliente deleted successfully.');

        return redirect(route('tipoClientes.index'));
    }
}
