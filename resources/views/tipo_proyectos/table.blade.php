<table class="table table-striped  table-bordered file-export" id="tipoClientes-table">
    <thead>
        <tr class="gris_tabla">
            <th>Id</th>
            <th>Tipo Proyecto</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
     @foreach($tipoProyectos as $tipoProyecto)
        <tr>
            <td>{!! $tipoProyecto->id !!}</td>
            <td>{!! $tipoProyecto->tipo_proyecto !!}</td>
            <td>
                <div class='btn-group'>
                    <span class='btn btn-outline-success btn_azul btn-round' onclick="ver_catalogo(14,{{$tipoProyecto->id}},2,'tipo_clientes')" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-edit"></i></span>
                    <span class='btn btn-outline-danger  btn_rojo btn-round' onclick="elimina_catalogo(14,{{$tipoProyecto->id}},'tabla_catalogos')" ><i class="fa fa-trash"></i></span>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
