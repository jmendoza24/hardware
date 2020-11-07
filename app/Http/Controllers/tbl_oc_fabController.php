<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createtbl_oc_fabRequest;
use App\Http\Requests\Updatetbl_oc_fabRequest;
use App\Repositories\tbl_oc_fabRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use DB;
class tbl_oc_fabController extends AppBaseController
{
    /** @var  tbl_oc_fabRepository */
    private $tblOcFabRepository;

    public function __construct(tbl_oc_fabRepository $tblOcFabRepo)
    {
        $this->tblOcFabRepository = $tblOcFabRepo;
    }

    /**
     * Display a listing of the tbl_oc_fab.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tblOcFabs = db::select("SELECT f.id_fabricante as idf,f.fabricante,sum(d.cantidad) AS cant,IFNULL(SUM(d.lp),0) AS total
                FROM cotizacions c
                INNER JOIN cotizacion_detalle d ON d.id_cotizacion = c.id
                INNER JOIN productos p ON p.id=d.item
                INNER JOIN tbl_fabricantes f ON f.id_fabricante=p.fabricante
                WHERE c.estatus=1
                GROUP BY f.fabricante,f.id_fabricante");

        return view('tbl_oc_fabs.index',compact('tblOcFabs'));
    }   

    /**
     * Show the form for creating a new tbl_oc_fab.
     *
     * @return Response
     */
    public function create()
    {
        return view('tbl_oc_fabs.create');
    }

    /**
     * Store a newly created tbl_oc_fab in storage.
     *
     * @param Createtbl_oc_fabRequest $request
     *
     * @return Response
     */
    public function store(Createtbl_oc_fabRequest $request)
    {
        $input = $request->all();

        $tblOcFab = $this->tblOcFabRepository->create($input);

        Flash::success('Tbl Oc Fab saved successfully.');

        return redirect(route('tblOcFabs.index'));
    }

    /**
     * Display the specified tbl_oc_fab.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        
                $tblOcFabs = db::select("SELECT f.id_fabricante as idf,f.fabricante,d.id_fab,
                    IFNULL(sum(d.cantidad),0) AS cant,IFNULL(sum(d.lp),0) AS total,
                    IFNULL(sum(d.lp),0) * ifnull(sum(d.cantidad),0) AS subtotal
                    FROM cotizacions c
                    INNER JOIN cotizacion_detalle d ON d.id_cotizacion = c.id
                    INNER JOIN productos p ON p.id=d.item
                    INNER JOIN tbl_fabricantes f ON f.id_fabricante=p.fabricante
                    WHERE c.estatus=1 AND f.id_fabricante =77
                    GROUP BY  f.id_fabricante,f.fabricante,d.id_fab");

        return view('tbl_oc_fabs.show',compact('tblOcFabs'));
  



    }

    /**
     * Show the form for editing the specified tbl_oc_fab.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tblOcFab = $this->tblOcFabRepository->find($id);

        if (empty($tblOcFab)) {
            Flash::error('Tbl Oc Fab not found');

            return redirect(route('tblOcFabs.index'));
        }

        return view('tbl_oc_fabs.edit')->with('tblOcFab', $tblOcFab);
    }

    /**
     * Update the specified tbl_oc_fab in storage.
     *
     * @param int $id
     * @param Updatetbl_oc_fabRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetbl_oc_fabRequest $request)
    {
        $tblOcFab = $this->tblOcFabRepository->find($id);

        if (empty($tblOcFab)) {
            Flash::error('Tbl Oc Fab not found');

            return redirect(route('tblOcFabs.index'));
        }

        $tblOcFab = $this->tblOcFabRepository->update($request->all(), $id);

        Flash::success('Tbl Oc Fab updated successfully.');

        return redirect(route('tblOcFabs.index'));
    }

    /**
     * Remove the specified tbl_oc_fab from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tblOcFab = $this->tblOcFabRepository->find($id);

        if (empty($tblOcFab)) {
            Flash::error('Tbl Oc Fab not found');

            return redirect(route('tblOcFabs.index'));
        }

        $this->tblOcFabRepository->delete($id);

        Flash::success('Tbl Oc Fab deleted successfully.');

        return redirect(route('tblOcFabs.index'));
    }
}
