<form id="catalogos_forma" action="">
    @csrf
    <input type="hidden" name="id_catalogo" value="15">
    <input type="hidden" name="id" value="{{$participantes->id}}">
    <input type="hidden" name="id_cliente" value="{{$participantes->id_cliente}}">
    
    <div class="form-group col-sm-12">
        {!! Form::label('familia', 'Contacto:') !!}
        <input type="text" class="form-control" name="contacto" id="contacto" value="{{ $participantes->contacto}}">
    </div>

    <div class="form-group col-sm-12">
        {!! Form::label('familia', 'Correo:') !!}
        <input type="text" class="form-control" name="correo" id="correo" value="{{ $participantes->correo}}">
    </div>

    <div class="form-group col-sm-12">
        {!! Form::label('familia', 'Teléfono:') !!}
        <input type="text" class="form-control" name="telefono" id="telefono" value="{{ $participantes->telefono}}">
    </div>

    <div class="form-group col-sm-12">
        {!! Form::label('familia', 'Puesto:') !!}
        <input type="text" class="form-control" name="puesto" id="puesto" value="{{ $participantes->puesto}}">
    </div>
    <div class="form-group col-sm-12">
        {!! Form::label('familia', 'Activo:') !!}
        <select class="form-control" name="activo">
            <option value="">Seleccione...</option>
            <option value="1" {{$participantes->activo==1?'selected':''}}>Activo</option>
            <option value="0" {{$participantes->activo==0?'selected':''}}>No Activo</option>
        </select>
    </div>
    <hr>
    <div class="form-group col-sm-12">
        <span class="btn btn-primary pull-right" onclick="guarda_catalogo(15,{{$participantes->id}},1,'tabla_catalogos')">Guardar</span>
    </div>
</form>