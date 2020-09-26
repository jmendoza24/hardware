@extends('layouts.app')

@section('titulo') Formulas  @endsection
@section('content')
    <div class="col-md-12" id="tabla_formulas">
     @include('formulas.table')
    </div>
@endsection