<table class="table table-striped table-bordered file-export" id="disenios-table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Subcategoria</th>
            <th>Diseño</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($disenios as $disenio)
        <tr>
            <td>{{ $disenio->id}}</td>
            <td>{!! $disenio->subcategoria !!}</td>
            <td><a href="{{ route('items.lista',['disenio'=>$disenio->id])}}"><b>{!! $disenio->disenio !!}</b></a></td>
            <td>
                <div class='btn-group'>
                    <span onclick="ver_catalogo(9,{{$disenio->id}},2)" class='btn btn-float btn-outline-success btn-round' data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-edit"></i></span>
                    <span onclick="elimina_catalogo(9,{{$disenio->id}},'disenios',{{ $disenio->id_fabricante}},{{$disenio->catalogo}},{{ $disenio->id_familia}},{{$disenio->categoria}},{{$disenio->idsubcategoria}})" class='btn btn-float btn-outline-danger btn-round'><i class="fa fa-trash"></i></span>    
                </div>
            </td>
        </tr>
    @endforeach 
    </tbody>
</table>