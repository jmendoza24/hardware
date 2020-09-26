@extends('layouts.app')

@section('titulo') Fabricantes @endsection
@section('content')
    <div class="col-md-12">    
    <h1 class="pull-right">
       <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('fabricantes.create') !!}">+ Fabricante</a>
    </h1>
    </div>
    <br><br><br>
    <div class="col-md-12" style="overflow-x: scroll;">
     @include('fabricantes.table')
    </div>
@endsection
