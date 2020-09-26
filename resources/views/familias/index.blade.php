@extends('layouts.app')

@section('titulo') Familias  @endsection
@section('content')
    <div class="col-md-12">    
    <h1 class="pull-right">
       <span class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" onclick="ver_catalogo(2,0,1,{{$catalogo->fabricante}},{{ $catalogo->id}})" data-toggle="modal" data-backdrop="false" data-target="#primary">+ Familia</span>
    </h1>
    </div>
    <br><br><br>
    <div class="col-md-12" id="tabla_catalogos">
     @include('familias.table')
    </div>
@endsection

@section('submenus')
<li><a href="{{ route('catalogos.index') }}">Catalogos</a></li>
@endsection