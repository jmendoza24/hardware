<?php

namespace App\Http\Controllers;

use App\Models\sufijos;
use App\Http\Requests\CreatesufijosRequest;
use App\Http\Requests\UpdatesufijosRequest;
use App\Repositories\sufijosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class sufijosController extends AppBaseController
{
    /** @var  sufijosRepository */
    private $sufijosRepository;

    public function __construct(sufijosRepository $sufijosRepo)
    {
        $this->sufijosRepository = $sufijosRepo;
    }

    /**
     * Display a listing of the sufijos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request){
        $sufijos = new sufijos;

        $sufijos = $sufijos->lista_sufijos(); 

        return view('sufijos.index',compact('sufijos'));
    }

    /**
     * Show the form for creating a new sufijos.
     *
     * @return Response
     */
    public function create()
    {
        return view('sufijos.create');
    }

    /**
     * Store a newly created sufijos in storage.
     *
     * @param CreatesufijosRequest $request
     *
     * @return Response
     */
    public function store(CreatesufijosRequest $request)
    {
        $input = $request->all();

        $sufijos = $this->sufijosRepository->create($input);

        Flash::success('Sufijos saved successfully.');

        return redirect(route('sufijos.index'));
    }

    /**
     * Display the specified sufijos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sufijos = $this->sufijosRepository->find($id);

        if (empty($sufijos)) {
            Flash::error('Sufijos not found');

            return redirect(route('sufijos.index'));
        }

        return view('sufijos.show')->with('sufijos', $sufijos);
    }

    /**
     * Show the form for editing the specified sufijos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sufijos = $this->sufijosRepository->find($id);

        if (empty($sufijos)) {
            Flash::error('Sufijos not found');

            return redirect(route('sufijos.index'));
        }

        return view('sufijos.edit')->with('sufijos', $sufijos);
    }

    /**
     * Update the specified sufijos in storage.
     *
     * @param int $id
     * @param UpdatesufijosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesufijosRequest $request)
    {
        $sufijos = $this->sufijosRepository->find($id);

        if (empty($sufijos)) {
            Flash::error('Sufijos not found');

            return redirect(route('sufijos.index'));
        }

        $sufijos = $this->sufijosRepository->update($request->all(), $id);

        Flash::success('Sufijos updated successfully.');

        return redirect(route('sufijos.index'));
    }

    /**
     * Remove the specified sufijos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sufijos = $this->sufijosRepository->find($id);

        if (empty($sufijos)) {
            Flash::error('Sufijos not found');

            return redirect(route('sufijos.index'));
        }

        $this->sufijosRepository->delete($id);

        Flash::success('Sufijos deleted successfully.');

        return redirect(route('sufijos.index'));
    }
}
