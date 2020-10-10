<table class="table table-striped  table-bordered zero-configuration">
    <thead>
        <tr class="gris_tabla">
            <th>Nombre</th>
            <th>Teléfono 1</th>
            <th>Teléfono 2</th>
            <th>Correo</th>
            <th>Comentarios</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
   @foreach($fab_contactos as $contacto)
        <tr>
            <td>{{ $contacto->contacto}}</td>
            <td>{{ $contacto->telefono}}</td>
            <td>{{ $contacto->telefono_2}}</td>
            <td>{{ $contacto->correo}}</td>
            <td>{{ $contacto->comentarios}}</td>
            <td>
                <div class='btn-group'>
                    <span data-toggle="modal" data-backdrop="false" data-target="#primary" onclick="agrega_contacto({{$contacto->id_fabricante}},{{$contacto->id_contacto}})" class='btn btn-float btn_azul btn-outline-success btn-round' ><i class="fa fa-edit"></i></span>
                    <a onclick="delete_contacto({{$contacto->id_fabricante}},{{$contacto->id_contacto}})" class='btn btn-float btn-outline-danger btn_rojo btn-round'><i class="fa fa-trash"></i></a>
                </div>
            </td>
        </tr>
   @endforeach
    </tbody>
</table>
