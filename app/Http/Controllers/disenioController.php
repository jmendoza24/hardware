<?php

namespace App\Http\Controllers;

use App\Models\disenio;
use App\Http\Requests\CreatedisenioRequest;
use App\Http\Requests\UpdatedisenioRequest;
use App\Repositories\disenioRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class disenioController extends AppBaseController
{
    /** @var  disenioRepository */
    private $disenioRepository;

    public function __construct(disenioRepository $disenioRepo)
    {
        $this->disenioRepository = $disenioRepo;
    }

    /**
     * Display a listing of the disenio.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request){
        $disenios = new disenio;
        $disenios = $disenios->lista_disenios();

        return view('disenios.index')->with('disenios', $disenios);

    }

    
    /**
     * Show the form for creating a new disenio.
     *
     * @return Response
     */
    public function create()
    {
        return view('disenios.create');
    }

    /**
     * Store a newly created disenio in storage.
     *
     * @param CreatedisenioRequest $request
     *
     * @return Response
     */
    public function store(CreatedisenioRequest $request)
    {
        $input = $request->all();

        $disenio = $this->disenioRepository->create($input);

        Flash::success('Disenio saved successfully.');

        return redirect(route('disenios.index'));
    }

    /**
     * Display the specified disenio.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $disenio = $this->disenioRepository->find($id);

        if (empty($disenio)) {
            Flash::error('Disenio not found');

            return redirect(route('disenios.index'));
        }

        return view('disenios.show')->with('disenio', $disenio);
    }

    /**
     * Show the form for editing the specified disenio.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $disenio = $this->disenioRepository->find($id);

        if (empty($disenio)) {
            Flash::error('Disenio not found');

            return redirect(route('disenios.index'));
        }

        return view('disenios.edit')->with('disenio', $disenio);
    }

    /**
     * Update the specified disenio in storage.
     *
     * @param int $id
     * @param UpdatedisenioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedisenioRequest $request)
    {
        $disenio = $this->disenioRepository->find($id);

        if (empty($disenio)) {
            Flash::error('Disenio not found');

            return redirect(route('disenios.index'));
        }

        $disenio = $this->disenioRepository->update($request->all(), $id);

        Flash::success('Disenio updated successfully.');

        return redirect(route('disenios.index'));
    }

    /**
     * Remove the specified disenio from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $disenio = $this->disenioRepository->find($id);

        if (empty($disenio)) {
            Flash::error('Disenio not found');

            return redirect(route('disenios.index'));
        }

        $this->disenioRepository->delete($id);

        Flash::success('Disenio deleted successfully.');

        return redirect(route('disenios.index'));
    }
}
