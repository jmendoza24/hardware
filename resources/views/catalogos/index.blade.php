@extends('layouts.app')

@section('titulo') Catalogos @endsection
@section('content')
    <div class="col-md-12">    
    <h1 class="pull-right">
       <span class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" onclick="ver_catalogo(1,0,1,'catalogos')" data-toggle="modal" data-backdrop="false" data-target="#primary">+ Catalogo</span>
    </h1>
    </div>
    <br><br><br>
    <div class="col-md-12" id="tabla_catalogos">
     @include('catalogos.table')
    </div>
@endsection