<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateitemRequest;
use App\Http\Requests\UpdateitemRequest;
use App\Repositories\itemRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class itemController extends AppBaseController
{
    /** @var  itemRepository */
    private $itemRepository;

    public function __construct(itemRepository $itemRepo)
    {
        $this->itemRepository = $itemRepo;
    }

    /**
     * Display a listing of the item.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $items = $this->itemRepository->all();

        return view('items.index')
            ->with('items', $items);
    }

    /**
     * Show the form for creating a new item.
     *
     * @return Response
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created item in storage.
     *
     * @param CreateitemRequest $request
     *
     * @return Response
     */
    public function store(CreateitemRequest $request)
    {
        $input = $request->all();

        $item = $this->itemRepository->create($input);

        Flash::success('Item saved successfully.');

        return redirect(route('items.index'));
    }

    /**
     * Display the specified item.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $item = $this->itemRepository->find($id);

        if (empty($item)) {
            Flash::error('Item not found');

            return redirect(route('items.index'));
        }

        return view('items.show')->with('item', $item);
    }

    /**
     * Show the form for editing the specified item.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $item = $this->itemRepository->find($id);

        if (empty($item)) {
            Flash::error('Item not found');

            return redirect(route('items.index'));
        }

        return view('items.edit')->with('item', $item);
    }

    /**
     * Update the specified item in storage.
     *
     * @param int $id
     * @param UpdateitemRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateitemRequest $request)
    {
        $item = $this->itemRepository->find($id);

        if (empty($item)) {
            Flash::error('Item not found');

            return redirect(route('items.index'));
        }

        $item = $this->itemRepository->update($request->all(), $id);

        Flash::success('Item updated successfully.');

        return redirect(route('items.index'));
    }

    /**
     * Remove the specified item from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $item = $this->itemRepository->find($id);

        if (empty($item)) {
            Flash::error('Item not found');

            return redirect(route('items.index'));
        }

        $this->itemRepository->delete($id);

        Flash::success('Item deleted successfully.');

        return redirect(route('items.index'));
    }
}
