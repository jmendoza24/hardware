<table class="table table-bordered table-striped zero-configuration" id="proyectos-table">
    <thead>
        <tr class="gris_tabla">
            <th>Proyecto</th>
            <th>Nombre Corto</th>
            <th>Dirección</th>
            <th>Tipo de Proyecto</th>
            <th>Comentarios</th>
            <th>Estatus</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($proyectos as $proyectos)
        <tr class="">
            <td>{!! $proyectos->nombre !!}</td>
            <td>{!! $proyectos->nombre_corto !!}</td>
            <td>{!! $proyectos->direccion !!}</td>
            <td></td>
            <td><textarea style="width: 400px; height: 60px;" class="form-control" id="comentario_{{$proyectos->id}}" onchange="guarda_comentarios({{$proyectos->id}})" >{!! $proyectos->comentarios !!}</textarea> </td>
            <td> {!! ($proyectos->estatus==1)?'Activo':'No activo' !!} </td>
            <td>
                {!! Form::open(['route' => ['proyectos.destroy', $proyectos->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('proyectos.edit', [$proyectos->id]) !!}" class='btn btn-float btn-outline-success btn_azul btn-round'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn_rojo btn-round', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
