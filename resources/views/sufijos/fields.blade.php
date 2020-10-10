<form id="catalogos_forma" action="">
	@csrf
	<input type="hidden" name="id_catalogo" value="8">
	<input type="hidden" name="id" value="{{$sufijos->id}}">
	<!-- Fabricante Field -->
	<div class="form-group col-sm-12">
	    {!! Form::label('categoria', 'Categoria:') !!}
	    <select name="categoria" id="categoria" class="form-control" onchange="obtiene_catalogo(4,'subcategoria')">
		<option value="">Seleccione...</option>
		@foreach($categorias as $categoria)
			<option value="{{ $categoria->id}}" {{ $sufijos->categoria==$categoria->id?'selected':''}}>{{ $categoria->categoria}}</option>
		@endforeach
	</select>
	</div>
	<div class="form-group col-sm-12">
	    {!! Form::label('subcategoria', 'Subcategoria:') !!}
	    <select name="subcategoria" id="subcategoria" class="form-control">
		<option value="">Seleccione...</option>
		@foreach($subcategorias as $subcategoria)
			<option value="{{ $subcategoria->id}}" {{ $sufijos->subcategoria==$subcategoria->id?'selected':''}}>{{ $subcategoria->subcategoria}}</option>
		@endforeach
	</select>
	</div>
	
	<div class="form-group col-sm-12">
	    {!! Form::label('sufijo', 'Sufijo:') !!}
	    <input type="text" name="sufijo" id="sufijo" value="{{$sufijos->sufijo}}" class="form-control">
	</div>
	<hr>
	<div class="form-group col-sm-12">
		<span class="btn btn_azul pull-right" onclick="guarda_catalogo(8,{{$sufijos->id}},1,'sufijos')">Guardar</span>
	</div>
</form> 
