@extends('layouts.app')
@section('titulo') Editar fabricante | {{ $fabricantes->fabricante}}  @endsection

@section('content')
@php($editar = 1)
   {!! Form::model($fabricantes, ['route' => ['fabricantes.update', $fabricantes->id_fabricante], 'method' => 'patch']) !!}
        @include('fabricantes.fields')
   {!! Form::close() !!}
@endsection 