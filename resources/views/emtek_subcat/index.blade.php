@extends('layouts.app')

@section('titulo') Subcategorias Colores @endsection
@section('content')
    <div class="col-md-12">    
    <h1 class="pull-right">
       <span class="btn btn_azul pull-right" style="margin-top: -10px;margin-bottom: 5px" onclick="ver_catalogo(18,0,1)" data-toggle="modal" data-backdrop="false" data-target="#primary">+ Color</span>
    </h1>
    </div>
    <br><br><br>
    <div class="row">
        <div class="col-md-12" id="tabla_catalogos">
         	@include('emtek_subcat.table')
        </div>
      </div>
    
@endsection
