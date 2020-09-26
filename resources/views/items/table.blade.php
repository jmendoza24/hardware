<table class="table table-striped table-bordered file-export" id="items-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Diseño</th>
            <th>Item</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($items as $item)
            <tr>
                <td>{!! $item->id !!}</td>
                <td>{!! $item->nom_disenio !!}</td>
                <td>{!! $item->item !!}</td>
            <td>
                <div class='btn-group'>
                    <span onclick="ver_catalogo(10,{{$item->id}},2)" class='btn btn-float btn-outline-success btn-round' data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-edit"></i></span>
                    <span onclick="elimina_catalogo(10,{{$item->id}},'items',{{ $item->id_fabricante}},{{$item->catalogo}},{{ $item->id_familia}},{{$item->categoria}},{{$item->idsubcategoria}},{{$item->disenio}})" class='btn btn-float btn-outline-danger btn-round'><i class="fa fa-trash"></i></span>    
                </div>
            </td>
        </tr>
    @endforeach 
    </tbody>
</table>