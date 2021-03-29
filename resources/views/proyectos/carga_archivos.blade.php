<form id="catalogos_forma" action="">
	@csrf
	<input type="hidden" name="id_catalogo" value="18">
	<input type="hidden" name="id" value="{{$archivos->id}}">
	<input type="hidden" name="id_proyecto" value="{{ $archivos->id_proyecto}}">

	<div class="form-group col-sm-12">
	    {!! Form::label('subcategoria', 'Tipo Archivo:') !!}
	    <select class="form-control" name="tipo_archivo">
	    	<option value="">Seleccione</option>
	    	<option value="1">Imagenes</option>
	    	<option value="2">Archivos</option>
	    </select>
	</div>
	<div class="form-group col-sm-12">
	    {!! Form::label('subcategoria', 'Descripción:') !!}
	    <textarea class="form-control" name="descripcion"></textarea>
	</div>
	<div class="form-group col-sm-12">
	    {!! Form::label('subcategoria', 'Archivo:') !!}
	    <input type="file" name="archivo" class="form-control">
	</div>
	<hr>
	<div class="form-group col-sm-12">
		<span class="btn btn_azul pull-right" onclick="guarda_catalogo(18,{{$archivos->id_proyecto}},1,'subcategorias')">Guardar</span>
	</div>
</form> 
