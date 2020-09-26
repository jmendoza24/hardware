<table class="table table-striped  table-bordered file-export"> 
    <thead>
        <tr>
            
            <th>ID</th>
            <th>Empresa</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Puesto</th>
            <th>Activo</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($clientes as $clientes)
        <tr>
            <td>{{ $clientes->id_cliente}}</td>
            <td>{!! $clientes->empresa !!}</td>
            <td>{!! $clientes->contacto !!}</td>
            <td>{!! $clientes->telefono !!}</td>
            <td>{!! $clientes->correo !!}</td>
            <td>{!! $clientes->puesto !!}</td>
            <td>{!! ($clientes->activo==1)?'SI':'NO' !!}</td>
        
            <td>
                {!! Form::open(['route' => ['clientes.destroy', $clientes->id_cliente], 'method' => 'delete']) !!}
                <div class='btn-group text-center'>
                    <!--<a href="{!! route('clientes.show', [$clientes->id_cliente]) !!}" class='btn btn-float btn-outline-secondary btn-round'><i class="fa fa-eye"></i></a>--->
                    <a href="{!! route('clientes.edit', [$clientes->id_cliente]) !!}" class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn-round', 'onclick' => "return confirm('Estas seguro deseas eliminar este cliente?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
 