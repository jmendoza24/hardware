@extends('layouts.app')
@section('titulo') Nuevo producto  @endsection
@section('content')
@php($editar=0) 
{!! Form::open(['route' => 'productos.store']) !!}

    @include('productos.fields')

{!! Form::close() !!}
@endsection

