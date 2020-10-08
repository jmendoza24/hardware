@extends('layouts.app') 
@section('content')
<br> 
<style type="text/css">
    .td-2px{padding: 2px;}
</style>
<div class="col-md-12" id="cotiza_table">
	  <table class="table table-striped table-bordered zero-configuration responsive" id="tablac">
        <thead>
            <tr>
                <th>Cotización</th>
                <th>Proyecto</th>
                <th>Cliente</th>
                <th>Teléfono</th>
                <th>Total USD</th>
                <th>Total MXN</th>
                <th></th>
                <th>Correo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cotizaciones as $c)
                <tr>
                    <td><span class="badge badge-primary" onclick="ver_catalogo(16,{{ $c->id}})" data-toggle="modal" data-backdrop="false" data-target="#primary" style="cursor: pointer; font-size: 12px;">{{$c->id}}</span></td>
                    <td>{{$c->nombre}}</td>
                    <td>{{$c->contacto}}</td>
                    <td>{{$c->telefono}}</td>
                    <td style="text-align: right">${{ number_format($c->total_usa,2)}}</td>
                    <td style="text-align: right">${{ number_format($c->total_mx,2)}}</td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-sm btn-outline-primary" href="{{ route('cotizador.revive',['id_cotizacion'=>$c->id])}}"><i class="fa fa-window-maximize"></i></a> &nbsp;
                            <span class="btn btn-sm btn-outline-danger" onclick="eliminar_cotizacion({{ $c->id}})"><i class="fa fa-trash"></i></span>
                        </div>
                    </td>
                    <td>{{$c->correo}}</td>
                </tr>
            @endforeach
        </tbody>
          
      </table>
</div>
@endsection