<div class="table-responsive">
    <table class="table" id="proyectosFiles-table">
        <thead>
            <tr>
                <th>Id Proyecto</th>
        <th>Tipo File</th>
        <th>File</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($proyectosFiles as $proyectosFiles)
            <tr>
                <td>{!! $proyectosFiles->id_proyecto !!}</td>
            <td>{!! $proyectosFiles->tipo_file !!}</td>
            <td>{!! $proyectosFiles->file !!}</td>
                <td>
                    {!! Form::open(['route' => ['proyectosFiles.destroy', $proyectosFiles->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('proyectosFiles.show', [$proyectosFiles->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('proyectosFiles.edit', [$proyectosFiles->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
