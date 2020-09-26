@extends('layouts.app')
@section('titulo') Tipo Clientes @endsection
@section('content')
<div class="col-md-12">    
    <h1 class="pull-right">
       <span class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" onclick="ver_catalogo(13,0,1,'tipo_clientes')" data-toggle="modal" data-backdrop="false" data-target="#primary">+ Tipo cliente</span>
    </h1>
</div>
<br>
<div class="col-md-12" id="tabla_catalogos">
    @include('tipo_clientes.table')
</div>
@endsection

