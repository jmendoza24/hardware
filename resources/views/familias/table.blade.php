<table  class="table table-striped table-bordered file-export" id="familias-table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Catalogo</th>
            <th>Familia</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
            @foreach($familias as $familia)
                <tr>
                    <td>{{  $familia->id}}</td>
                    <td>{!! $familia->catalogo !!}</td>
                    <td><a href="{{ route('categorias.lista',['id_familia'=>$familia->id])}}"><b>{!! $familia->familia !!}</b></a></td>
                    <td>
                        <div class='btn-group'>
                            <span onclick="ver_catalogo(2,{{$familia->id}},2)" class='btn btn-float btn-outline-success btn-round' data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-edit"></i></span>
                            <span onclick="elimina_catalogo(2,{{$familia->id}},'familias',{{ $familia->id_fabricante}},{{$familia->id_catalogo}})" class='btn btn-float btn-outline-danger btn-round'><i class="fa fa-trash"></i></span>    
                        </div>
                    </td>
                </tr>
            @endforeach
    </tbody>
</table>
