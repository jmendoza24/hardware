@extends('layouts.app') 
@section('titulo') OC Clientes @endsection
@section('content')
<br> 
<style type="text/css">
    .td-2px{padding: 2px;}
</style>
<div class="col-md-12" style="overflow-x: scroll;">
    <table class="table table-striped table-bordered zero-configuration" style="font-size: 14px;" id="tablac">
        <thead>
            <tr style="background: #5C8293; color: white;">
                <th style="background: #43536cff; ">OCC</th>
                <th>Fecha</th>
                <th>Cotización</th>
                <th>Proyecto</th>
                <th>País</th>
                <th>Participante <br/> Comprador</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Total USD</th> 
                <th>Total MXN</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cotizaciones as $c)
                <tr>
                    <td>
                        <div class="btn-group mr-1 mb-1">
                            <button type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" style="background: #43536cff !important; border-color: #43536cff !important; "><b style="font-size: 14px;">{{ $c->id_occ}}</b></button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="#" onclick="ver_catalogo(16,{{ $c->id}})" data-toggle="modal" data-backdrop="false" data-target="#primary" ><i class="fa fa-file-text-o warning" aria-hidden="true"></i> Consultar</a>
                              <a class="dropdown-item" href="#" onclick="configura_abatimiento({{ $c->id}})" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-archive success" aria-hidden="true"></i> Asignación</a>
                              <a class="dropdown-item" href="#" onclick="baja_cotiza_pdf({{ $c->id}},1)" ><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Producto</a>
                              <a class="dropdown-item" href="#" onclick="baja_cotiza_pdf({{ $c->id}},3)" ><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Producto + Modificación</a>
                              <a class="dropdown-item" href="#" onclick="baja_cotiza_pdf({{ $c->id}},2)"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Instalación</a>
                              <a class="dropdown-item" href="#" onclick="configura_abatimiento({{ $c->id}})" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-thumb-tack primary" aria-hidden="true"></i> Abatimiento</a>
                              <a class="dropdown-item" href="{{ route('cotizador.regresar',['id_cotizacion'=>$c->id])}}"><i class="fa fa-retweet primary" aria-hidden="true"></i> A cotización</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#" onclick="eliminar_cotizacion({{ $c->id}})"><i class="fa fa-trash danger"></i> Eliminar</a>
                            </div>
                        </div>
                    </td>
                    <td><label>{{ substr($c->fecha,0,10)}}</label></td>
                    <td>@if($c->id_hijo != '') {{$c->id_hijo . '.'.$c->ver}} @else {{ $c->id .'.'}} @endif</td>
                    <td>{{$c->nombre}}</td>
                    <td>{{$c->pais}}</td>
                    <td>{{$c->contacto}}</td>
                    <td>{{$c->correo}}</td>
                    <td>{{$c->telefono}}</td>
                    <td style="text-align: right">${{ number_format($c->total_producto,2)}}</td>
                    <td style="text-align: right">${{ number_format($c->total_mx,2)}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection