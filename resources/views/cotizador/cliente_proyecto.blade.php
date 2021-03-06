<div class="col-md-12 form-row" style="padding-top: 5px;">
    <div class="form-row col-md-4">
        <span class="col-md-1 btn-group">
            <button type="button" class="btn btn-icon btn-pure" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('proyectos.create')}}" target="_blank">Nuevo</a>
                <a class="dropdown-item" onclick="buscar_cliente_proyecto(0)">Refrescar</a>
            </div>
        </span>
        <label class="col-md-3" style="padding-top: 8px;">Proyectos:</label>
        <select class="form-control select2 select2-size-xs col-md-7" id="proyectos" onchange="@if($tipo==1 || $tipo==0) buscar_cliente_proyecto(1) @else actualiza_cliente_proyecto(1) @endif" >
            <option value="">Seleccione...</option>
            @foreach($proyectos as $p)
            <option value="{{$p->id}}" {{$cotizacion->proyecto==$p->id?'selected':''}}>{{$p->nombre_corto}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-row col-md-4">
        <span class="col-md-1 btn-group">
            <button type="button" class="btn btn-icon btn-pure" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('clientes.create')}}" target="_blank">Nuevo</a>
                <a class="dropdown-item" onclick="buscar_cliente_proyecto(0)">Refrescar</a>
            </div>
        </span>
        <label class="col-md-3" style="padding-top: 8px;">Participante:</label>
        <select class="col-md-8 form-control select2 select2-size-xs" id="clientes" onchange="@if($tipo==2 || $tipo==0) buscar_cliente_proyecto(2) @else actualiza_cliente_proyecto(1) @endif">
            <option value="">Seleccione...</option>
            @foreach($clientes as $c)
            <option value="{{$c->id}}" {{$cotizacion->cliente==$c->id?'selected':''}}>{{$c->contacto}}</option>
            @endforeach
        </select> 
        <span style="margin-left: 50px; font-size: 11px;">{{ $cotizacion->c_correo != '' ? $cotizacion->c_correo :'Sin correo'}}</span>
    </div>
    <div class="col-md-2 form-row">
        <label class="col-md-3" style="padding-top: 4px;">PDF:</label>
        <select class="form-control form-control-sm col-md-8" id="id_tipo" style="margin-top: 4px;" onchange="baja_cotiza_pdf({{ $cotizacion->id }},0)">
            <option value="">Seleccione...</option>
            <option value="1">Producto</option>
            <option value="4">Modificación</option>
            <option value="3">Producto y Modificación</option>
            <option value="2">Instalación</option>
        </select>
    </div>
    <div class="col text-right" style="margin-top: 10px;">
        <!--<span style="color: white" class=" btn btn-outline-primary btn_azul btn-sm" onclick="baja_cotiza_pdf({{ $cotizacion->id }})">PDF</span>-->
        <!--<span class="btn btn-outline-primary btn-sm">XLS</span>--->
        <span style="color: white"  class="btn btn-outline-primary btn_azul btn-sm" onclick="enviar_cotizacion(1)">Guardar</span>
        <span style="color: white" class="btn btn-outline-primary btn_azul btn-sm" onclick="enviar_cotizacion(2)">Enviar</span>

    </div>
</div>