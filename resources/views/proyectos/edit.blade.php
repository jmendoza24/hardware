@extends('layouts.app')
@section('titulo') <h2 style=" color: #5C8293"><strong>Editar proyecto -</strong><span style="font-size: 22px;"> {{$proyectos->nombre}} </span> </h2> @endsection
@section('content')
@php($editar =1)
{!! Form::model($proyectos, ['route' => ['proyectos.update', $proyectos->id], 'method' => 'patch']) !!}
      @include('proyectos.fields')
 {!! Form::close() !!}
@endsection
