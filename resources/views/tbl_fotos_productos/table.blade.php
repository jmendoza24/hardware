<div class="table-responsive">
    <table class="table" id="tblFotosProductos-table">
        <thead>
            <tr>
                <th>Id Producto</th>
        <th>Foto</th>
        <th>Activo</th>
        <th>Tipo</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tblFotosProductos as $tblFotosProductos)
            <tr>
                <td>{{ $tblFotosProductos->id_producto }}</td>
            <td>{{ $tblFotosProductos->foto }}</td>
            <td>{{ $tblFotosProductos->activo }}</td>
            <td>{{ $tblFotosProductos->tipo }}</td>
                <td>
                    {!! Form::open(['route' => ['tblFotosProductos.destroy', $tblFotosProductos->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('tblFotosProductos.show', [$tblFotosProductos->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('tblFotosProductos.edit', [$tblFotosProductos->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
