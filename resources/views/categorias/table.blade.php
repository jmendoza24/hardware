<table class="table table-striped table-bordered file-export" id="categorias-table">
    <thead>
        <tr class="gris_tabla">
            <th>Id</th>
            <th>Familia</th>
            <th>Categoria</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($categorias as $categoria)
        <tr>
            <td>{{ $categoria->id}}</td>
            <td>{!! $categoria->familia !!}</td>
            <td><a href="{{ route('subcategorias.lista',['id_categoria'=>$categoria->id])}}"><b>{!! $categoria->categoria !!}</b></a></td>
            <td>
                <div class='btn-group'>
                    <span onclick="ver_catalogo(3,{{$categoria->id}},2,{{ $categoria->id_fabricante}},{{$categoria->catalogo}},{{ $categoria->id_familia}})" class='btn btn-float btn_azul btn-outline-success btn-round' data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-edit"></i></span>
                    <span onclick="elimina_catalogo(3,{{$categoria->id}},'categorias',{{ $categoria->id_fabricante}},{{$categoria->catalogo}},{{ $categoria->id_familia}})" class='btn btn-float btn_rojo btn-outline-danger btn-round'><i class="fa fa-trash"></i></span>    
                </div>
            </td>
        </tr>
    @endforeach 
    </tbody>
</table>
