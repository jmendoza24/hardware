@extends('layouts.app')

@section('titulo') Proyectos @endsection
@section('content')
    <div class="col-md-12">    
    <h1 class="pull-right">
       <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('proyectos.create') !!}">+ Proyecto</a>
    </h1>
    </div>
    <br><br><br>
    <div class="col-md-12" style="overflow-x: scroll;">
     @include('proyectos.table')
    </div>
@endsection
