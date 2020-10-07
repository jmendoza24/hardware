<table class="table table-striped  table-bordered file-export">
    <thead>
        <tr>
            <th class="hide">Id</th>
            <th>Fabricante</th>
            <th>Contacto</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($fabricantes as $fabricantes)
        <tr>
            <td>{{ $fabricantes->id_fabricante}}</td>
            <td>{!! $fabricantes->abrev !!}</td>
            <td>{!! $fabricantes->contacto !!}</td>
            <td>{!! $fabricantes->correo !!}</td>
            <td>{!! $fabricantes->telefono_dir !!}</td>
            <td>
                {!! Form::open(['route' => ['fabricantes.destroy', $fabricantes->id_fabricante], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('fabricantes.edit', [$fabricantes->id_fabricante]) !!}" class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn-round', 'onclick' => "return confirm('Estas seguro deseas eliminar este fabricante?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
