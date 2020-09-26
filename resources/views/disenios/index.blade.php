@extends('layouts.app')

@section('titulo') Diseños @endsection
@section('content')
    <div class="col-md-12">    
    <h1 class="pull-right">
       <span class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" onclick="ver_catalogo(9,0,1,{{ $catalogo->id_fabricante}},{{ $catalogo->catalogo}},{{$catalogo->familia}},{{$catalogo->categoria}},{{$catalogo->id}})" data-toggle="modal" data-backdrop="false" data-target="#primary">+ Diseño</span>
    </h1>
    </div>
    <br><br><br>
    <div class="col-md-12" id="tabla_catalogos">
     @include('disenios.table')
    </div>
@endsection
@section('submenus')
<li><a href="{{ route('catalogos.index') }}">Catalogos</a>
	/<a href="{{ route('familias.lista',['id_catalogo'=>$catalogo->catalogo]) }}">{{$catalogo->nom_catalogo}}</a>
	/<a href="{{ route('categorias.lista',['id_familia'=>$catalogo->familia]) }}">{{$catalogo->nom_familia}}</a>
	/<a href="{{ route('subcategorias.lista',['id_categoria'=>$catalogo->categoria]) }}">{{$catalogo->nom_categoria}}</a>
</li>
@endsection