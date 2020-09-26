<form id="catalogos_forma" action="">
	@csrf
	<input type="hidden" name="id_catalogo" value="13">
	<input type="hidden" name="id" value="{{$tipo_cliente->id}}">
    <div class="form-group col-md-12">
	    {!! Form::label('tipo_cliente', 'Tipo Cliente:') !!}
	    <input type="text" name="tipo_cliente" value="{{$tipo_cliente->tipo_cliente}}" class="form-control requerido">
	</div>
    <div class="form-group col-sm-12">
        <span class="btn btn-primary pull-right" onclick="guarda_catalogo(13,{{$tipo_cliente->id}},1,'tabla_catalogos')">Guardar</span>
    </div>
</form>