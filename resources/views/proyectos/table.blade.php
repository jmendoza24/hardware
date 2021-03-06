<table class="table table-bordered table-striped zero-configuration" id="proyectos-table">
    <thead>
        <tr class="gris_tabla">
            <th></th>
            <th>Proyecto</th>
            <th>Nombre Corto</th>
            <th>Dirección</th>
            <th>Tipo de Proyecto</th>
            <th>Comentarios</th>
            <th>Estatus</th>
        </tr>
    </thead>
    <tbody>
    @foreach($proyectos as $proyectos)
        <tr class="">
            <td>
                {!! Form::open(['route' => ['proyectos.destroy', $proyectos->id], 'method' => 'delete']) !!}
                <div class="btn-group">
                    <button type="button" class="btn btn-icon btn-pure dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
                    <div class="dropdown-menu">
                        <a href="{!! route('proyectos.edit', [$proyectos->id]) !!}" class='btn btn-sm btn-success btn_azul ml-1'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger btn_rojo', 'onclick' => "return confirm('Estas seguro deseas eliminar este registro?')"]) !!}
                    </div>
                </div>
                {!! Form::close() !!}            
            </td>
            <td>{!! $proyectos->nombre !!}</td>
            <td>{!! $proyectos->nombre_corto !!}</td>
            <td>{!! $proyectos->direccion !!}</td>
            <td></td>
            <td><textarea style="width: 400px; height: 60px;" class="form-control" id="comentario_{{$proyectos->id}}" onchange="guarda_comentarios({{$proyectos->id}})" >{!! $proyectos->comentarios !!}</textarea> </td>
            <td> {!! ($proyectos->estatus==1)?'Activo':'No activo' !!} </td>
        </tr>
    @endforeach
    </tbody>
</table>
