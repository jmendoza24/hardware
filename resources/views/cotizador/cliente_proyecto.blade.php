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
    </div>
    <div class="col-md-2 form-row">
        <label class="col-md-3" style="padding-top: 4px;">Tipo:</label>
        <select class="form-control form-control-sm col-md-8" id="id_tipo" style="margin-top: 4px;">
            <option value="">Seleccione...</option>
            <option value="1">Sencilla</option>
            <option value="2">Completa</option>
        </select>
    </div>
    <div class="col text-right" style="margin-top: 10px;">
        <span class="btn btn-outline-primary btn-sm" onclick="baja_cotiza_pdf({{ $cotizacion->id }})">PDF</span>
        <!--<span class="btn btn-outline-primary btn-sm">XLS</span>--->
        <span class="btn btn-outline-primary btn-sm" onclick="enviar_cotizacion(1)">Save</span>
        <span class="btn btn-outline-primary btn-sm" onclick="enviar_cotizacion(2)">Send</span>
        @php($tipo=2)

                <a class="btn btn-outline-primary btn-sm"  href="{{ route('envia.cotiza',['tipo'=>$tipo],['num_cotizacion2'=>$cotizacion->id])}}"> Send2</a>

    </div>
</div>