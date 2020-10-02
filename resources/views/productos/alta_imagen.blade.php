<form id="catalogos_forma" action="">
	@csrf
	<input type="hidden" name="id_catalogo" value="17">
	<input type="hidden" name="id" value="{{$imagenes->id}}">
	<input type="hidden" name="id_producto" value="{{$imagenes->id_producto}}">
	@if($imagenes->foto!='')
	<div class="col-sm-12">
		<img src="/storage/{{ $imagenes->foto}}" style="width: 100%;">
	</div>
	@else
	<div class="form-group col-sm-12">
	    {!! Form::label('catalogo', 'Imagen:') !!}
	    <input type="file" class="form-control" name="foto" id="foto">
	</div>
	<hr>
	<div class="form-group col-sm-12">
		<span class="btn btn-primary pull-right" onclick="guarda_catalogo(17,{{$imagenes->id}},1,'imagenes_productos')">Guardar</span>
	</div>
	@endif
</form> 