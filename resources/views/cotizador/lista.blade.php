@extends('layouts.app') 
@section('content')
<br> 
<style type="text/css">
    .td-2px{padding: 2px;}
</style>
<div class="col-md-12" id="cotiza_table">
	  <table class="table table-striped table-bordered zero-configuration">
        <thead>
            <tr>
                <th>Cotización</th>
                <th>Proyecto</th>
                <th>Cliente</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cotizaciones as $c)
                <tr>
                    <td>{{$c->id}}</td>
                    <td>{{$c->nombre}}</td>
                    <td>{{$c->contacto}}</td>
                    <td>{{$c->correo}}</td>
                    <td>{{$c->telefono}}</td>
                    <td>{{ number_format(9999,2)}}</td>
                </tr>
            @endforeach
        </tbody>
          
      </table>
</div>
@endsection