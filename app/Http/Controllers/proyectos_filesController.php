<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createproyectos_filesRequest;
use App\Http\Requests\Updateproyectos_filesRequest;
use App\Repositories\proyectos_filesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class proyectos_filesController extends AppBaseController
{
    /** @var  proyectos_filesRepository */
    private $proyectosFilesRepository;

    public function __construct(proyectos_filesRepository $proyectosFilesRepo)
    {
        $this->proyectosFilesRepository = $proyectosFilesRepo;
    }

    /**
     * Display a listing of the proyectos_files.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $proyectosFiles = $this->proyectosFilesRepository->all();

        return view('proyectos_files.index')
            ->with('proyectosFiles', $proyectosFiles);
    }

    /**
     * Show the form for creating a new proyectos_files.
     *
     * @return Response
     */
    public function create()
    {
        return view('proyectos_files.create');
    }

    /**
     * Store a newly created proyectos_files in storage.
     *
     * @param Createproyectos_filesRequest $request
     *
     * @return Response
     */
    public function store(Createproyectos_filesRequest $request)
    {
        $input = $request->all();

        $proyectosFiles = $this->proyectosFilesRepository->create($input);

        Flash::success('Proyectos Files saved successfully.');

        return redirect(route('proyectosFiles.index'));
    }

    /**
     * Display the specified proyectos_files.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $proyectosFiles = $this->proyectosFilesRepository->find($id);

        if (empty($proyectosFiles)) {
            Flash::error('Proyectos Files not found');

            return redirect(route('proyectosFiles.index'));
        }

        return view('proyectos_files.show')->with('proyectosFiles', $proyectosFiles);
    }

    /**
     * Show the form for editing the specified proyectos_files.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $proyectosFiles = $this->proyectosFilesRepository->find($id);

        if (empty($proyectosFiles)) {
            Flash::error('Proyectos Files not found');

            return redirect(route('proyectosFiles.index'));
        }

        return view('proyectos_files.edit')->with('proyectosFiles', $proyectosFiles);
    }

    /**
     * Update the specified proyectos_files in storage.
     *
     * @param int $id
     * @param Updateproyectos_filesRequest $request
     *
     * @return Response
     */
    public function update($id, Updateproyectos_filesRequest $request)
    {
        $proyectosFiles = $this->proyectosFilesRepository->find($id);

        if (empty($proyectosFiles)) {
            Flash::error('Proyectos Files not found');

            return redirect(route('proyectosFiles.index'));
        }

        $proyectosFiles = $this->proyectosFilesRepository->update($request->all(), $id);

        Flash::success('Proyectos Files updated successfully.');

        return redirect(route('proyectosFiles.index'));
    }

    /**
     * Remove the specified proyectos_files from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $proyectosFiles = $this->proyectosFilesRepository->find($id);

        if (empty($proyectosFiles)) {
            Flash::error('Proyectos Files not found');

            return redirect(route('proyectosFiles.index'));
        }

        $this->proyectosFilesRepository->delete($id);

        Flash::success('Proyectos Files deleted successfully.');

        return redirect(route('proyectosFiles.index'));
    }
}
