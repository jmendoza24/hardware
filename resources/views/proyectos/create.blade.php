@extends('layouts.app')
@section('titulo') <h2 style=" color: #5C8293"><strong>Nuevo proyecto</strong></h2>  @endsection
@section('content')
@php($editar =0)
{!! Form::open(['route' => 'proyectos.store']) !!}

    @include('proyectos.fields')

{!! Form::close() !!}
@endsection