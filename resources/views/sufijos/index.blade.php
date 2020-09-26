@extends('layouts.app')

@section('titulo') Sufijos @endsection
@section('content')
    <div class="col-md-12">    
    <h1 class="pull-right">
       <span class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" onclick="ver_catalogo(8,0,1,'sufijos')" data-toggle="modal" data-backdrop="false" data-target="#primary">+ Sufijo</span>
    </h1>
    </div>
    <br><br><br>
    <div class="col-md-12" id="tabla_catalogos">
     @include('sufijos.table')
    </div>
@endsection