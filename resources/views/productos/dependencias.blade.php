@extends('layouts.app')

@section('titulo') Dependencias @endsection
@section('content')
    <div class="col-md-12" style="">
     	<table class="table table-bordered table-striped">
     		<thead>
	     		<tr class="gris_tabla">
	     			<th>Vistas</th>
	     		</tr>
     		</thead>
     		<tbody>
	     		@foreach($listado_vistas as $c)
	     		<tr>
	     			<td><a data-toggle="modal" data-backdrop="false" data-target="#primary" style="cursor: pointer; " onclick="ver_dependencias({{$c->id}})">{{$c->nombre}}</a></td>
	     		</tr>
	     		@endforeach
     		</tbody>
     	</table>
    </div>
@endsection
