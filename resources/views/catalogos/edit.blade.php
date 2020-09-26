@extends('layouts.app')
@section('titulo') Editar catalogo | {{ $catalogos->catalogo}}  @endsection

@section('content')
   {!! Form::model($catalogos, ['route' => ['catalogos.update', $catalogos->id], 'method' => 'patch']) !!}
        @include('catalogos.fields')
   {!! Form::close() !!}
@endsection  