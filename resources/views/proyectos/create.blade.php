@extends('layouts.app')
@section('titulo') Nuevo proyecto  @endsection
@section('content')
@php($editar =0)
{!! Form::open(['route' => 'proyectos.store']) !!}

    @include('proyectos.fields')

{!! Form::close() !!}
@endsection