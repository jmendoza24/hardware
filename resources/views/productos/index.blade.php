@extends('layouts.app')

@section('titulo') Productos @endsection
@section('content')
<div class="row">
	<div class="col-md-4">
		<select class="form-control" id="fabricantes" onchange="busca_producto(1)">
			<option value="">Seleccione</option>
			@foreach($fabricantes as $f)
			<option value="{{ $f->id_fabricante}}" {{$f->id_fabricante==77?'selected':''}}>{{ $f->fabricante}}</option>
			@endforeach
		</select>
	</div>
	<div class="col" id="conteos">
		@include('productos.conteos')
	</div>
	<div class="col-md-2">    
    <h1 class="pull-right">
       <a class="btn btn_azul pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('productos.create') !!}">+ Producto</a>
    </h1>
    </div>
</div>
    
<div class="row">
    <div class="col-md-12" id="productos">
     	@include('productos.table')
    </div>
</div> 
@endsection
