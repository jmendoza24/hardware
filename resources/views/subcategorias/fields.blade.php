<form id="catalogos_forma" action="">
	@csrf
	<input type="hidden" name="id_catalogo" value="4">
	<input type="hidden" name="id" value="{{$subcategorias->id}}">
	<input type="hidden" name="categoria" id="categoria" value="{{$subcategorias->categoria}}">

	<!-- Catalogo Field -->
	<div class="form-group col-sm-12">
	    {!! Form::label('subcategoria', 'subcategoria:') !!}
	    <input type="text" required="" name="subcategoria" class="form-control" id="subcategoria" value="{{$subcategorias->subcategoria}}">
	</div>
	<hr>
	<div class="form-group col-sm-12">
		<span class="btn btn_azul pull-right" onclick="guarda_catalogo(4,{{$subcategorias->id}},1,'subcategorias')">Guardar</span>
	</div>
</form> 
