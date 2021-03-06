@extends('layouts.app')
@section('titulo') Productos <a class="btn btn-primary pull-right mr-2" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('productos.create') !!}">+ Producto</a> @endsection 
@section('content')
    <div class="row">    
		<div class="col-md-5">
			<select class="form-control" id="fabricante">
				<option value="">Fabricantes</option>
				@foreach($fabricantes as $f)
				<option value="{{ $f->id_fabricante}}" {{ $fab == $f->id_fabricante ? 'selected':''}}>{{ $f->fabricante}}</option>
				@endforeach
			</select>
		</div>
		<div class="col-md-7">
			<div class="row">
		    	<input type="text" id="item_buscar" class="form-control col-md-8 mr-1" placeholder="Buscar producto...">
		    	<span class="btn btn-outline-primary col-md-1" onclick="buscar_producto(0)"><i class="fa fa-search"></i></span>
	    	</div>
		</div>
    </div>
  <br>
    <div class="col-md-12" style="overflow-x: scroll;" id="tabla_productos">
     	@include('productos.table')
    </div>
@endsection
