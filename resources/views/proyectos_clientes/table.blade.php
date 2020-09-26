<div class="table-responsive">
    <table class="table" id="proyectosClientes-table">
        <thead>
            <tr>
                <th>Id Proyecto</th>
        <th>Id Cliente</th>
        <th>Comentario</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($proyectosClientes as $proyectosClientes)
            <tr>
                <td>{!! $proyectosClientes->id_proyecto !!}</td>
            <td>{!! $proyectosClientes->id_cliente !!}</td>
            <td>{!! $proyectosClientes->comentario !!}</td>
                <td>
                    {!! Form::open(['route' => ['proyectosClientes.destroy', $proyectosClientes->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('proyectosClientes.show', [$proyectosClientes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('proyectosClientes.edit', [$proyectosClientes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
