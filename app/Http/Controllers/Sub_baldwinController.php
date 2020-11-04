<?php

namespace App\Http\Controllers;

use App\Models\Sub_baldwin;
use App\Http\Requests\CreateSub_baldwinRequest;
use App\Http\Requests\UpdateSub_baldwinRequest;
use App\Repositories\Sub_baldwinRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class Sub_baldwinController extends AppBaseController
{
    /** @var  Sub_baldwinRepository */
    private $subBaldwinRepository;

    public function __construct(Sub_baldwinRepository $subBaldwinRepo)
    {
        $this->subBaldwinRepository = $subBaldwinRepo;
    }

    /**
     * Display a listing of the Sub_baldwin.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request){
        $subBaldwins = new Sub_baldwin;
        $subBaldwins = $subBaldwins->lista_subbaldwin(77);
        $titulo = 'Baldwin';
        $cata = 6;
        $variable  =  array(1=>'Sufijo',2=>'Grupo sufijo', 3=>'Style 1', 4=>'Style 2', 5=>'Style 3', 6=>'Latch', 7=>'Strike', 8=>'Cylinder', 9=>'Keying', 10=>'DC1 BWN1',
                            11=>'DC2 BWN2',12=>'DC3 BWN3', 13=>'DC4 BWN4', 14=>'DP', 15=>'EXTERIOR TRIM  DEP 1', 16=>'EXTERIOR TRIM  DEP 1 ACCION', 17=>'INTERIOR ESCUTCHEON  DEP 2', 
                            18=>'INTERIOR ESCUTCHEON  DEP 2 ACCION', 19=>'KNOB / LEVER  DEP 3', 20=>'KNOB / LEVER  DEP 3 ACCION', 21=>'SPINDLE  DEP 4', 22=>'SPINDLE  DEP 4 ACCION',
                            23=>'CYLINDER   DEP 5', 24=>'CYLINDER   DEP 5 ACCION', 25=>'MORTISE LOCK  DEP 6', 26=>'MORTISE LOCK  DEP 6 ACCION', 27=>'BLOCKING RING  DEP 7',
                            28=>'BLOCKING RING  DEP 7 ACCION', 29=>'TURN KNOB / ADAPTOR DEP 8', 30=>'TURN KNOB / ADAPTOR DEP 8 ACCION', 31=>'DEP 9 ',32=>'DEP 9 ACCION',
                            33=>'DEP 10 HC LIBRES ', 34=>'DEP 10 HC LIBRES ACCION', 35=>'DEP 11 HC LIBRES', 36=>'DEP 11 HC LIBRES ACCION', 37=>'DEP 12 HC LIBRES', 38=>'DEP 12 HC LIBRES ACCION',
                            39=>'DEP ROSETTES', 40=>'DEP ROSETTES ACCION', 41=>'DEP LATCHES', 42=>'DEP LATCHES ACCION', 43=>'DEP ADAPTOR ', 44=>'DEP ADAPTOR ACCION', 45=>'DEP SPINDLE', 46 =>'DEP SPINDLE ACCION',
                            47=>'DEP EXT BUTTON',48=>'DEP EXT BUTTON ACCION',49=>'Finish INT');
        $variable  = (object)$variable;

        return view('sub_baldwins.index',compact('subBaldwins','titulo','cata','variable'));
    }

    function subEmtek(Request $request){
        $subBaldwins = new Sub_baldwin;
        $subBaldwins = $subBaldwins->lista_subbaldwin(76);
        $titulo = 'Emtek';
        $cata = 7;
        $variable=array(1=>'DC', 2=>'MORTISE', 3=>'FMM1', 4=>'STEM', 5=>'FMM2', 6=>'HANDLE', 7=>'FMM3', 8=>'WHEEL', 9=>'FASTENER', 10=>'STYLE', 11=>'FINISH-EMK');

        $variable  = (object)$variable;
        return view('sub_baldwins.index',compact('subBaldwins','titulo','cata','variable'));
    }

    function selectores(Request $request){
        $subBaldwins = new Sub_baldwin;
        $subBaldwins = $subBaldwins->lista_subbaldwin(0);
        $titulo = 'Selectores';
        $cata = 12;
        $variable=array(1=>'BACKSET');

        $variable  = (object)$variable;
        return view('sub_baldwins.index',compact('subBaldwins','titulo','cata','variable'));
    }

    function valida_grupo(Request $request){
        $existe = Sub_baldwin::where([['variable',$request->variable],['subcatalogo',$request->grupo],['fabricante',$request->fabricante]])->count();
        return $existe;
    }
    /**
     * Show the form for creating a new Sub_baldwin.
     *
     * @return Response
     */
    public function create(){

        return view('sub_baldwins.create');
    }

    /**
     * Store a newly created Sub_baldwin in storage.
     *
     * @param CreateSub_baldwinRequest $request
     *
     * @return Response
     */
    public function store(CreateSub_baldwinRequest $request)
    {
        $input = $request->all();

        $subBaldwin = $this->subBaldwinRepository->create($input);

        Flash::success('Sub Baldwin saved successfully.');

        return redirect(route('subBaldwins.index'));
    }

    /**
     * Display the specified Sub_baldwin.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $subBaldwin = $this->subBaldwinRepository->find($id);

        if (empty($subBaldwin)) {
            Flash::error('Sub Baldwin not found');

            return redirect(route('subBaldwins.index'));
        }

        return view('sub_baldwins.show')->with('subBaldwin', $subBaldwin);
    }

    /**
     * Show the form for editing the specified Sub_baldwin.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $subBaldwin = $this->subBaldwinRepository->find($id);

        if (empty($subBaldwin)) {
            Flash::error('Sub Baldwin not found');

            return redirect(route('subBaldwins.index'));
        }

        return view('sub_baldwins.edit')->with('subBaldwin', $subBaldwin);
    }

    /**
     * Update the specified Sub_baldwin in storage.
     *
     * @param int $id
     * @param UpdateSub_baldwinRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSub_baldwinRequest $request)
    {
        $subBaldwin = $this->subBaldwinRepository->find($id);

        if (empty($subBaldwin)) {
            Flash::error('Sub Baldwin not found');

            return redirect(route('subBaldwins.index'));
        }

        $subBaldwin = $this->subBaldwinRepository->update($request->all(), $id);

        Flash::success('Sub Baldwin updated successfully.');

        return redirect(route('subBaldwins.index'));
    }

    /**
     * Remove the specified Sub_baldwin from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $subBaldwin = $this->subBaldwinRepository->find($id);

        if (empty($subBaldwin)) {
            Flash::error('Sub Baldwin not found');

            return redirect(route('subBaldwins.index'));
        }

        $this->subBaldwinRepository->delete($id);

        Flash::success('Sub Baldwin deleted successfully.');

        return redirect(route('subBaldwins.index'));
    }
}
