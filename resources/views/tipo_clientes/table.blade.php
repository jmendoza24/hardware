<table class="table table-striped  table-bordered file-export" id="tipoClientes-table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Tipo Cliente</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($tipoClientes as $tipoCliente)
        <tr>
            <td>{!! $tipoCliente->id !!}</td>
            <td>{!! $tipoCliente->tipo_cliente !!}</td>
            <td>
                <div class='btn-group'>
                    <span class='btn btn-outline-success btn-round' onclick="ver_catalogo(13,{{$tipoCliente->id}},2,'tipo_clientes')" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-edit"></i></span>
                    <span class='btn btn-outline-danger btn-round' onclick="elimina_catalogo(13,{{$tipoCliente->id}},'tabla_catalogos')" ><i class="fa fa-trash"></i></span>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
