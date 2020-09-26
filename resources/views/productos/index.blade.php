@extends('layouts.app')

@section('titulo') Productos @endsection
@section('content')
    <div class="col-md-12">    
    <h1 class="pull-right">
       <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('productos.create') !!}">+ Producto</a>
    </h1>
    </div>
    <br><br><br>
    <div class="col-md-12" style="overflow-x: scroll;">
     @include('productos.table')
    </div>
@endsection
