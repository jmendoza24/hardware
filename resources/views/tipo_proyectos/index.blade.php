@extends('layouts.app')
@section('titulo') Tipo Proyectos @endsection
@section('content')
<div class="col-md-12">    
    <h1 class="pull-right">
       <span class="btn btn_azul pull-right" style="margin-top: -10px;margin-bottom: 5px" onclick="ver_catalogo(14,0,1,'tipo_proyectos')" data-toggle="modal" data-backdrop="false" data-target="#primary">+ Tipo Proyecto</span>
    </h1>
</div>
<br>
<div class="col-md-12" id="tabla_catalogos">
    @include('tipo_proyectos.table')
</div>
@endsection

