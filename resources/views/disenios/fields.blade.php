<form id="catalogos_forma" action="">
	@csrf
	<input type="hidden" name="id_catalogo" value="9">
	<input type="hidden" name="id" value="{{$disenios->id}}">
	<!-- Fabricante Field -->
	<input type="hidden" class="form-control" id="subcategoria" name="subcategoria" value="{{$disenios->subcategoria}}">
	<!-- Catalogo Field -->
	<div class="form-group col-sm-12">
	    {!! Form::label('disenio', 'Diseño:') !!}
	    <input type="text" required="" name="disenio" class="form-control" id="disenio" value="{{$disenios->disenio}}">
	</div>
	<hr>
	<div class="form-group col-sm-12">
		<span class="btn btn-primary pull-right" onclick="guarda_catalogo(9,{{$disenios->id}},1,'disenios')">Guardar</span>
	</div>
</form> 
