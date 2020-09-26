@extends('layouts.app')
@section('titulo') Editar Participante |<span style="font-size: 20px;"> {{ $clientes->nombre}}</span>  @endsection

@section('content')
@php($editar = 1)
   {!! Form::model($clientes, ['route' => ['clientes.update', $clientes->id_cliente], 'method' => 'patch']) !!}
        @include('clientes.fields')
   {!! Form::close() !!}
@endsection  