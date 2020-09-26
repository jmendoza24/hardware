@extends('layouts.app')
@section('titulo') Editar proyecto - <span style="font-size: 22px;"> {{$proyectos->nombre}} </span>  @endsection
@section('content')
@php($editar =1)
{!! Form::model($proyectos, ['route' => ['proyectos.update', $proyectos->id], 'method' => 'patch']) !!}
      @include('proyectos.fields')
 {!! Form::close() !!}
@endsection
