<table class="table table-striped table-bordered file-export" id="subcategorias-table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Categoria</th>
            <th>Subcategoria</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($subcategorias as $subcategoria)
        <tr>
            <td>{{ $subcategoria->id}}</td>
            <td>{!! $subcategoria->nom_categoria !!}</td>
            <td><a href="{{ route('disenios.lista',['subcategoria'=>$subcategoria->id])}}"><b>{!! $subcategoria->subcategoria !!}</b></a></td>
            <td>
                <div class='btn-group'>
                    <span onclick="ver_catalogo(4,{{$subcategoria->id}},2)" class='btn btn-float btn-outline-success btn-round' data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-edit"></i></span>
                    <span onclick="elimina_catalogo(4,{{$subcategoria->id}},'subcategorias',{{ $subcategoria->id_fabricante}},{{$subcategoria->catalogo}},{{ $subcategoria->id_familia}},{{$subcategoria->categoria}})" class='btn btn-float btn-outline-danger btn-round'><i class="fa fa-trash"></i></span>    
                </div>
            </td>
        </tr>
    @endforeach 
    </tbody>
</table>
 