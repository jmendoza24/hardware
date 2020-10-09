<form id="catalogos_forma" action="">
	@csrf
	<input type="hidden" name="id_catalogo" value="10">
	<input type="hidden" name="id" value="{{$items->id}}">
	<!-- Fabricante Field -->
	<input type="hidden" class="form-control" id="disenio" name="disenio" value="{{$items->disenio}}">
	<!-- Catalogo Field -->
	<div class="form-group col-sm-12">
	    {!! Form::label('item', 'Item:') !!}
	    <input type="text" name="item" id="item" class="form-control" value="{{$items->item}}">
	</div>
	<hr>
	<div class="form-group col-sm-12">
		<span class="btn btn_azul pull-right" onclick="guarda_catalogo(10,{{$items->id}},1,'items')">Guardar</span>
	</div>
</form> 

