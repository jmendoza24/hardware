@extends('layouts.app')
@section('titulo') Editar producto  @endsection
@section('content')
{!! Form::model($productos, ['route' => ['productos.update', $productos->id], 'method' => 'patch']) !!}

    @include('productos.fields')

{!! Form::close() !!}
@endsection
