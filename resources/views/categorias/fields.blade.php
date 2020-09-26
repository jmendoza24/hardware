<form id="catalogos_forma" action="">
	@csrf
	<input type="hidden" name="id_catalogo" value="3">
	<input type="hidden" name="id" value="{{$categorias->id}}">
	<input type="hidden" name="familia" id="familia" value="{{ $categorias->familia}}">
	<!-- Catalogo Field -->
	<div class="form-group col-sm-12">
	    {!! Form::label('categoria', 'Categoria:') !!}
	    <input type="text" required="" name="categoria" class="form-control" id="categoria" value="{{$categorias->categoria}}">
	</div>
	<hr>
	<div class="form-group col-sm-12">
		<span class="btn btn-primary pull-right" onclick="guarda_catalogo(3,{{$categorias->id}},1,'categorias')">Guardar</span>
	</div>
</form> 
