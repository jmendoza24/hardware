@extends('layouts.app')

@section('titulo') <h2><strong>Participantes</strong></h2> @endsection
@section('content')
    <div class="col-md-12">    
    <h1 class="pull-right">
       <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('clientes.create') !!}">+ Participante</a>
    </h1>
    </div>
    <br>
    <div class="col-md-12" style="overflow-x: scroll;">
     @include('clientes.table')
    </div>
@endsection

