<style type="text/css">
    #tabla-asi{padding: 2px;}
</style>
<table class="table table-striped  table-bordered " id="tabla-asi">
    <thead >
        <tr>
            <th>Contacto</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Puesto</th>
            <th>Activo</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($participantes as $p)
        <tr>
            <td><span class="blue" onclick="ver_catalogo(15,{{$p->id}},2,{{$clientes->id_cliente}})" data-toggle="modal" data-backdrop="false" data-target="#primary" style="cursor: pointer;"><b>{{ $p->contacto}}</b></span></td>
            <td>{{ $p->correo}}</td>
            <td>{{ $p->telefono}}</td>
            <td>{{ $p->puesto}}</td>
            <td>{{ $p->activo==1?'Activo':'Inactivo'}}</td>
            <td><button class="btn btn-danger btn-sm" type="button" onclick="elimina_catalogo(15,{{$p->id}},'tabla_catalogos',{{$p->id_cliente}})"><i class="fa fa-trash"></i></button></td>
        </tr>
        @endforeach
    </tbody>
</table>