@extends('layouts.app')

@section('titulo')Costos @endsection
@section('content')
    <div class="col-md-12" id="lista_costs">
     @include('fabricantes.table_costos')
    </div>
@endsection
