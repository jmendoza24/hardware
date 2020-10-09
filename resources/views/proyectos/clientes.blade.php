<style type="text/css">
    .table th, .table td {
     padding: 6px;
    }
</style>
<div class="row">
    <div class="col-md-12 form-inline">
            <label class="mr-1">Selecciona participantes:</label>
            <select class="form-control select2" id="cliente_proyecto" style="width: 200px;">
                <option class="">Seleccione...</option>
                @foreach($clientes as $c)
                <option value="{{ $c->id_cliente}}">{{$c->nombre}}</option>
                @endforeach
            </select>
            &nbsp;
            <input type="text" name="cliente_comentarios" id="cliente_comentarios"  class="form-control mr-1" style="width: 300px" placeholder="Comentarios">
            <span class="btn btn-outline-primary" onclick="agrega_clientes({{$proyectos_id}})">Agregar</span>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12" >
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="gris_tabla">
                    <td>Empresa</td>
                    <td>Nombre</td>
                    <td>Teléfono</td>
                    <td>Correo</td>
                    <td>Puesto</td>
                    <!--<td>Tipo cliente</td>
                    <td>Lista precio</td>-->
                    <td>Comentario</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @foreach($proyectos_clientes as $p)
                <tr>
                    <td>{{ $p->empresa}}</td>
                    <td>{{ $p->contacto}}</td>
                    <td>{{ $p->telefono}}</td>
                    <td>{{ $p->correo}}</td>
                    <td>{{ $p->puesto}}</td>
                    <td>{{$p->comentario}}</td>
                    <td style="text-align: center;"><span class="btn btn-outline-danger btn-sm" onclick="eliminar_clientes({{$p->id_proyecto}},{{$p->id_cp}})"><i class="fa fa-trash"></i></span></td>
                </tr>
                @endforeach
            </tbody>
        </table>    
    </div>
</div>

