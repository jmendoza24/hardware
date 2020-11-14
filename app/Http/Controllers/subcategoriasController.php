<?php

namespace App\Http\Controllers;

use App\Models\subcategorias;
use App\Http\Requests\CreatesubcategoriasRequest;
use App\Http\Requests\UpdatesubcategoriasRequest;
use App\Repositories\subcategoriasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use DB;

class subcategoriasController extends AppBaseController
{
    /** @var  subcategoriasRepository */
    private $subcategoriasRepository;

    public function __construct(subcategoriasRepository $subcategoriasRepo)
    {
        $this->subcategoriasRepository = $subcategoriasRepo;
    }

    /**
     * Display a listing of the subcategorias.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $subcategorias = new subcategorias;
        $subcategorias = $subcategorias->lista_subcategorias();

        return view('subcategorias.index')
            ->with('subcategorias', $subcategorias);
    }

    /**
     * Show the form for creating a new subcategorias.
     *
     * @return Response
     */
    public function create()
    {
        return view('subcategorias.create');
    }

    /**
     * Store a newly created subcategorias in storage.
     *
     * @param CreatesubcategoriasRequest $request
     *
     * @return Response
     */
    public function store(CreatesubcategoriasRequest $request)
    {
        $input = $request->all();

        $subcategorias = $this->subcategoriasRepository->create($input);

        Flash::success('Subcategorias saved successfully.');

        return redirect(route('subcategorias.index'));
    }

    /**
     * Display the specified subcategorias.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $subcategorias = $this->subcategoriasRepository->find($id);

        if (empty($subcategorias)) {
            Flash::error('Subcategorias not found');

            return redirect(route('subcategorias.index'));
        }

        return view('subcategorias.show')->with('subcategorias', $subcategorias);
    }

    /**
     * Show the form for editing the specified subcategorias.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $subcategorias = $this->subcategoriasRepository->find($id);

        if (empty($subcategorias)) {
            Flash::error('Subcategorias not found');

            return redirect(route('subcategorias.index'));
        }

        return view('subcategorias.edit')->with('subcategorias', $subcategorias);
    }

    /**
     * Update the specified subcategorias in storage.
     *
     * @param int $id
     * @param UpdatesubcategoriasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesubcategoriasRequest $request)
    {
        $subcategorias = $this->subcategoriasRepository->find($id);

        if (empty($subcategorias)) {
            Flash::error('Subcategorias not found');

            return redirect(route('subcategorias.index'));
        }

        $subcategorias = $this->subcategoriasRepository->update($request->all(), $id);

        Flash::success('Subcategorias updated successfully.');

        return redirect(route('subcategorias.index'));
    }

    /**
     * Remove the specified subcategorias from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $subcategorias = $this->subcategoriasRepository->find($id);

        if (empty($subcategorias)) {
            Flash::error('Subcategorias not found');

            return redirect(route('subcategorias.index'));
        }

        $this->subcategoriasRepository->delete($id);

        Flash::success('Subcategorias deleted successfully.');

        return redirect(route('subcategorias.index'));
    }

    function colores(Request $request){
        $subcategorias =  db::select("SELECT distinct ss.id, concat(c.categoria,'-',ss.subcategoria) as subcategoria
                                      FROM subcategoria_colores s
                                      INNER JOIN subcategorias ss ON ss.id = s.subcategoria
                                      inner join categorias c ON c.id = ss.categoria 
                                      order by c.categoria,ss.subcategoria");

        $colores = db::select('SELECT s.*, ss.subcategoria AS nombre_sub
                               FROM subcategoria_colores s
                               INNER JOIN subcategorias ss ON ss.id = s.subcategoria');
        $tipo = 1;
        return view('emtek_subcat.index',compact('subcategorias','colores','tipo'));
    }
}
