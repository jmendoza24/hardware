@extends('layouts.app')
@section('titulo') Nuevo fabricante  @endsection
@section('content')
@php($editar = 0)
{!! Form::open(['route' => 'fabricantes.store']) !!}
    @include('fabricantes.fields')
{!! Form::close() !!}
@endsection