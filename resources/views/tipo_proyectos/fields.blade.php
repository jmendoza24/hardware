<form id="catalogos_forma" action="">
	@csrf
	<input type="hidden" name="id_catalogo" value="14">
	<input type="hidden" name="id" value="{{$tipo_proyecto->id}}">
    <div class="form-group col-md-12">
	    {!! Form::label('tipo_cliente', 'Tipo Proyecto:') !!}
	    <input type="text" name="tipo_proyecto" value="{{$tipo_proyecto->tipo_proyecto}}" class="form-control requerido">
	</div>
    <div class="form-group col-sm-12">
        <span class="btn btn-primary pull-right" onclick="guarda_catalogo(14,{{$tipo_proyecto->id}},1,'tabla_catalogos')">Guardar</span>
    </div>
</form>
