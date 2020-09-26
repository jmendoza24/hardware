@extends('layouts.app')
@section('titulo') Nuevo producto  @endsection
@section('content')
{!! Form::open(['route' => 'productos.store']) !!}

    @include('productos.fields')

{!! Form::close() !!}
@endsection

