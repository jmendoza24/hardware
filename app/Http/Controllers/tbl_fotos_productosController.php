<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createtbl_fotos_productosRequest;
use App\Http\Requests\Updatetbl_fotos_productosRequest;
use App\Repositories\tbl_fotos_productosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\tbl_fotos_productos;
use DB;

class tbl_fotos_productosController extends AppBaseController
{
    /** @var  tbl_fotos_productosRepository */
    private $tblFotosProductosRepository;

    public function __construct(tbl_fotos_productosRepository $tblFotosProductosRepo)
    {
        $this->tblFotosProductosRepository = $tblFotosProductosRepo;
    }
  
    /**
     * Display a listing of the tbl_fotos_productos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tblFotosProductos = $this->tblFotosProductosRepository->all();

        return view('tbl_fotos_productos.index')
            ->with('tblFotosProductos', $tblFotosProductos);
    }

    /**
     * Show the form for creating a new tbl_fotos_productos.
     *
     * @return Response
     */
    public function create()
    {
        return view('tbl_fotos_productos.create');
    }

    /**
     * Store a newly created tbl_fotos_productos in storage.
     *
     * @param Createtbl_fotos_productosRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {


        $arreglo = $request->all();
        
        if(empty($arreglo['foto'])){
            
            unset($arreglo['foto']);
        }else{

            $this->validate(request(),[
                'foto' => 'required|image|'
            ]);
      
           //$path = $request->file('foto')->store('');
           $file = $request->file('foto');

           $nombre = $file->getClientOriginalName();
           \Storage::disk('local')->put($nombre,\File::get($file));
           $arreglo['foto']=$nombre;
          
        }
     
        $tblFotosProductos = $this->tblFotosProductosRepository->create($arreglo);

        //return redirect()->back();
  
    }

    public function actualiza_fotos(Request $request){

        $id_p=$request['id_proyecto'];

        $tblFotosProductos=tbl_fotos_productos::where('id_producto',$id_p)->get();

        $options = view('tbl_fotos_productos.table',compact('tblFotosProductos'))->render();

        return json_encode($options);


   


    }

    /**
     * Display the specified tbl_fotos_productos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tblFotosProductos = $this->tblFotosProductosRepository->find($id);

        if (empty($tblFotosProductos)) {
            Flash::error('Tbl Fotos Productos not found');

            return redirect(route('tblFotosProductos.index'));
        }

        return view('tbl_fotos_productos.show')->with('tblFotosProductos', $tblFotosProductos);
    }

    /**
     * Show the form for editing the specified tbl_fotos_productos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tblFotosProductos = $this->tblFotosProductosRepository->find($id);

        if (empty($tblFotosProductos)) {
            Flash::error('Tbl Fotos Productos not found');

            return redirect(route('tblFotosProductos.index'));
        }

        return view('tbl_fotos_productos.edit')->with('tblFotosProductos', $tblFotosProductos);
    }

    /**
     * Update the specified tbl_fotos_productos in storage.
     *
     * @param int $id
     * @param Updatetbl_fotos_productosRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetbl_fotos_productosRequest $request)
    {
        $tblFotosProductos = $this->tblFotosProductosRepository->find($id);

        if (empty($tblFotosProductos)) {
            Flash::error('Tbl Fotos Productos not found');

            return redirect(route('tblFotosProductos.index'));
        }

        $tblFotosProductos = $this->tblFotosProductosRepository->update($request->all(), $id);

        Flash::success('Tbl Fotos Productos updated successfully.');

        return redirect(route('tblFotosProductos.index'));
    }

    /**
     * Remove the specified tbl_fotos_productos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response        
     */      
    public function destroy(Request $request)   
    {


         $input = $request->all();
         $id=$input['id']; 

        $dato=tbl_fotos_productos::where('id',$id)->get();
        $dato=$dato[0];
        $id_producto=$dato->id_producto;
        DB::table('tbl_fotos_productos')->delete($id);

        return $id_producto;


    }
}
