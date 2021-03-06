<form id="catalogos_forma" action="">
	@csrf
	<input type="hidden" name="id_catalogo" value="1">
	<input type="hidden" name="id" value="{{$catalogos->id}}">
	<!-- Fabricante Field -->
	<div class="form-group col-sm-12">
	    {!! Form::label('fabricante', 'Fabricante:') !!}
	    <select name="fabricante" id="fabricante" class="form-control">
		<option value="">Seleccione...</option>
		@foreach($fabricantes as $fab)
			<option value="{{ $fab->id_fabricante}}" {{ $fab->id_fabricante==$catalogos->fabricante?'selected':''}}>{{ $fab->fabricante}}</option>
		@endforeach
	</select>
	</div>
	
	<!-- Catalogo Field -->
	<div class="form-group col-sm-12">
	    {!! Form::label('catalogo', 'Catalogo:') !!}
	    <input type="text" required="" name="catalogo" class="form-control" id="catalogo" value="{{$catalogos->catalogo}}">
	</div>
	<div class="form-group col-sm-12">
	    {!! Form::label('categoria', 'Abrev:') !!}
	    <input type="text" required="" name="abrev" class="form-control" id="abrev" value="{{$catalogos->abrev}}">
	</div>
	<hr>
	<div class="form-group col-sm-12">
		<span class="btn azul pull-right" onclick="guarda_catalogo(1,{{$catalogos->id}},1,'catalogos')">Guardar</span>
	</div>
</form> 