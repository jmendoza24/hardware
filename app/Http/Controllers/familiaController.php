<?php

namespace App\Http\Controllers;

use App\Models\familia;
use App\Http\Requests\CreatefamiliaRequest;
use App\Http\Requests\UpdatefamiliaRequest;
use App\Repositories\familiaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class familiaController extends AppBaseController
{
    /** @var  familiaRepository */
    private $familiaRepository;

    public function __construct(familiaRepository $familiaRepo)
    {
        $this->familiaRepository = $familiaRepo;
    }

    /**
     * Display a listing of the familia.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request){
        $familias = new familia;

        $familias = $familias->lista_familias();

        return view('familias.index',compact('familias', $familias));
    }

    /**
     * Show the form for creating a new familia.
     *
     * @return Response
     */
    public function create()
    {
        return view('familias.create');
    }

    /**
     * Store a newly created familia in storage.
     *
     * @param CreatefamiliaRequest $request
     *
     * @return Response
     */
    public function store(CreatefamiliaRequest $request)
    {
        $input = $request->all();

        $familia = $this->familiaRepository->create($input);

        Flash::success('Familia saved successfully.');

        return redirect(route('familias.index'));
    }

    /**
     * Display the specified familia.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $familia = $this->familiaRepository->find($id);

        if (empty($familia)) {
            Flash::error('Familia not found');

            return redirect(route('familias.index'));
        }

        return view('familias.show')->with('familia', $familia);
    }

    /**
     * Show the form for editing the specified familia.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $familia = $this->familiaRepository->find($id);

        if (empty($familia)) {
            Flash::error('Familia not found');

            return redirect(route('familias.index'));
        }

        return view('familias.edit')->with('familia', $familia);
    }

    /**
     * Update the specified familia in storage.
     *
     * @param int $id
     * @param UpdatefamiliaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatefamiliaRequest $request)
    {
        $familia = $this->familiaRepository->find($id);

        if (empty($familia)) {
            Flash::error('Familia not found');

            return redirect(route('familias.index'));
        }

        $familia = $this->familiaRepository->update($request->all(), $id);

        Flash::success('Familia updated successfully.');

        return redirect(route('familias.index'));
    }

    /**
     * Remove the specified familia from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $familia = $this->familiaRepository->find($id);

        if (empty($familia)) {
            Flash::error('Familia not found');

            return redirect(route('familias.index'));
        }

        $this->familiaRepository->delete($id);

        Flash::success('Familia deleted successfully.');

        return redirect(route('familias.index'));
    }
}
