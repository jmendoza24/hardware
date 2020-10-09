<table class="table table-striped table-bordered file-export" id="catalogos-table">
    <thead>
        <tr class="gris_tabla">
            <th>Id</th>
            <th>Fabricante</th>
            <th>Catálogo</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($catalogos as $catalogos)
        <tr>
            <td>{{ $catalogos->id}}</td>
            <td>{!! $catalogos->fabricante !!}</td>
            <td> <a href="{{ route('familias.lista',['id_catalogo'=>$catalogos->id])}}"><b>{!! $catalogos->catalogo !!}</b></a></td>
            <td>
                <div class='btn-group'>
                    <span onclick="ver_catalogo(1,{{$catalogos->id}},2,{{$catalogos->id_fabricante}})" class='btn btn-float btn_azul btn-outline-success btn-round' data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-edit"></i></span>
                    <span onclick="elimina_catalogo(1,{{$catalogos->id}},'catalogos',{{$catalogos->id_fabricante}})" class='btn btn_rojo btn-float btn-outline-danger btn-round'><i class="fa fa-trash"></i></span>    
                </div>
            </td>
        </tr>
    @endforeach 
    </tbody>
</table>
