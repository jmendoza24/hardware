<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateformulasRequest;
use App\Http\Requests\UpdateformulasRequest;
use App\Repositories\formulasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use DB;


class formulasController extends AppBaseController
{
    /** @var  formulasRepository */
    private $formulasRepository;

    public function __construct(formulasRepository $formulasRepo)
    {
        $this->formulasRepository = $formulasRepo;
    }

    /**
     * Display a listing of the formulas.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $formulas = db::table('catalogos as c')
                        ->join('formulas as f','c.id','f.catalogo')
                        ->selectraw('f.*,c.catalogo as nom_catalogo')
                        ->get();
                        

        return view('formulas.index',compact('formulas'));
    }

    /**
     * Show the form for creating a new formulas.
     *
     * @return Response
     */
    public function create()
    {
        return view('formulas.create');
    }

    /**
     * Store a newly created formulas in storage.
     *
     * @param CreateformulasRequest $request
     *
     * @return Response
     */
    public function store(CreateformulasRequest $request)
    {
        $input = $request->all();

        $formulas = $this->formulasRepository->create($input);

        Flash::success('Formulas saved successfully.');

        return redirect(route('formulas.index'));
    }

    /**
     * Display the specified formulas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $formulas = $this->formulasRepository->find($id);

        if (empty($formulas)) {
            Flash::error('Formulas not found');

            return redirect(route('formulas.index'));
        }

        return view('formulas.show')->with('formulas', $formulas);
    }

    /**
     * Show the form for editing the specified formulas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $formulas = $this->formulasRepository->find($id);

        if (empty($formulas)) {
            Flash::error('Formulas not found');

            return redirect(route('formulas.index'));
        }

        return view('formulas.edit')->with('formulas', $formulas);
    }

    /**
     * Update the specified formulas in storage.
     *
     * @param int $id
     * @param UpdateformulasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateformulasRequest $request)
    {
        $formulas = $this->formulasRepository->find($id);

        if (empty($formulas)) {
            Flash::error('Formulas not found');

            return redirect(route('formulas.index'));
        }

        $formulas = $this->formulasRepository->update($request->all(), $id);

        Flash::success('Formulas updated successfully.');

        return redirect(route('formulas.index'));
    }

    /**
     * Remove the specified formulas from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $formulas = $this->formulasRepository->find($id);

        if (empty($formulas)) {
            Flash::error('Formulas not found');

            return redirect(route('formulas.index'));
        }

        $this->formulasRepository->delete($id);

        Flash::success('Formulas deleted successfully.');

        return redirect(route('formulas.index'));
    }
}
