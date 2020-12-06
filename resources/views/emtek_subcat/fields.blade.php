<form id="catalogos_forma" action="">
	@csrf
	<input type="hidden" name="id_catalogo" value="18">
	<input type="hidden" name="id" value="{{$colores->id}}">	
	<div class="form-group col-sm-12">
	    {!! Form::label('subcategoria', 'Subcategoria:') !!}
	    <select class="form-control" name="subcategoria">
	    	<option value="">Seleccione...</option>
	    	@foreach($subcategorias as $s)
	    	<option value="{{$s->id}}" {{ $colores->subcategoria == $s->id ? 'selected':''}}>{{ $s->nom_categoria .' - ' .$s->subcategoria}}</option>
	    	@endforeach
	    </select>
	</div>
	<div class="form-group col-sm-12">
	    {!! Form::label('color', 'Color:') !!}
	    <input type="text" name="color" class="form-control" value="{{ $colores->color}}">
	</div>
	<div class="form-group col-sm-12">
	    {!! Form::label('costo', 'Costo:') !!}
	    <input type="number" name="costo" class="form-control" value="{{ $colores->costo}}">
	</div>
	<hr>
	<div class="form-group col-sm-12">
		<span class="btn btn-primary pull-right" onclick="guarda_catalogo(18,{{$colores->id}},1,{{$colores->subcategoria}})">Guardar</span>
	</div>
</form> 
