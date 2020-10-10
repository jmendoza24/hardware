<div class="form-group col-sm-12">
	<label>Contacto:</label>
	<input type="textarea" id="c_contacto" class="form-control" value="{{$contacto->contacto}}">
</div>
<div class="form-group col-sm-12">
    <label>Teléfono:</label>
	<input type="text" id="c_telefono" class="form-control phone-inputmask" value="{{$contacto->telefono}}">
</div>
<div class="form-group col-sm-12">
    <label>Teléfono 2:</label>
	<input type="text" id="c_telefono_2" class="form-control phone-inputmask" value="{{$contacto->telefono_2}}">
</div>
<div class="form-group col-sm-12">
    <label>Correo:</label>
	<input type="text" id="c_correo" class="form-control email-inputmask" value="{{$contacto->correo}}">
</div>
<div class="form-group col-sm-12">
    <label>Comentarios:</label>
	<textarea id="c_comentarios" class="form-control">{{$contacto->comentarios}}</textarea>
</div>
<hr>
<div class="form-group col-sm-12" style="text-align: right;">
	<button class="btn btn_azul" onclick="guarda_contacto({{ $contacto->id_fabricante}},{{$contacto->id_contacto}})">Guardar</button>
    <!--<a href="{!! route('fabricantes.index') !!}" class="btn btn-warning">Cancelar</a>-->
</div>
