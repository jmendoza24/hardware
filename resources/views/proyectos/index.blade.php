@extends('layouts.app')

@section('titulo') <h2 style=" color: #5C8293"><strong>Proyectos</strong></h2> @endsection
@section('content')
    <div class="col-md-12">    
    <h1 class="pull-right">
       <a class="btn pull-right" style="
         background-color: #5C8293;
         color: white;margin-top: -10px;margin-bottom: 5px" href="{!! route('proyectos.create') !!}">+ Proyecto</a>
    </h1>
    </div>
    <br><br><br>
    <div class="col-md-12" style="overflow-x: scroll;">
     @include('proyectos.table')
    </div>
@endsection
