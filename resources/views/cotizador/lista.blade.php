@extends('layouts.app') 
@section('content')
<br> 
<style type="text/css">
    .td-2px{padding: 2px;}
</style>
<div class="col-md-12" id="cotiza_table">
	  <table class="table table-striped table-bordered zero-configuration responsive">
        <thead>
            <tr>
                <th>Cotización</th>
                <th>Proyecto</th>
                <th>Cliente</th>
                <th>Teléfono</th>
                <th>Total</th>
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
                    <td>{{ number_format($c->total,2)}}</td>
                    <td>{{$c->correo}}</td>
                </tr>
            @endforeach
        </tbody>
          
      </table>
</div>
@endsection