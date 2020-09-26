@extends('layouts.app')
@section('titulo') Nuevo Participante  @endsection
@section('content')
@php($editar = 0)
{!! Form::open(['route' => 'clientes.store']) !!}
    @include('clientes.fields')
{!! Form::close() !!}

@endsection
