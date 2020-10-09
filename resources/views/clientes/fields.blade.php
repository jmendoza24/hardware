<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('nombre', 'P. Física o Moral:') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control','required']) !!}
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('empresa', 'Empresa:') !!}
        {!! Form::text('empresa', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('dir_facturacion', 'Dirección Facturación:') !!}
        {!! Form::text('dir_facturacion', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('rfc', 'RFC:') !!}
        {!! Form::text('rfc', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('pais', 'Pais:') !!}
        <select class="form-control" id="pais" name="pais">
            <option value="">Seleccione...</option>
            @foreach($pais as $ps)
            <option value="{{ $ps->id}}" {{ ($clientes->pais==$ps->id)?'selected':'' }}>{{ $ps->Pais}}</option>
            @endforeach
        </select>
    </div>
        <!-- Estado Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('estado', 'Estado:') !!}
        <select class="form-control" id="estado" name="estado" onchange="get_municipios('estado','municipio')">
            <option value="">Seleccione...</option>
            @foreach($estados as $edo)
            <option value="{{ $edo->id}}" {{ ($clientes->estado==$edo->id)?'selected':'' }}>{{ $edo->estado}}</option>
            @endforeach
        </select>
    </div>

    <!-- Municipio Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('municipio', 'Municipio:') !!}
        <select class="form-control" id="municipio" name="municipio">
            <option value="">Seleccione...</option>
            @foreach($municipios as $mun)
            <option value="{{ $mun->municipios_id}}" {{ ($clientes->municipio==$mun->municipios_id)?'selected':'' }}>{{ $mun->municipio}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('cp', 'CP:') !!}
        {!! Form::text('cp', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('correo', 'Correo:') !!}
        <textarea style="width: 500px;" id="correo" name="correo" class="form-control" ></textarea>

    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('telefono', 'Teléfono:') !!}
        {!! Form::text('telefono1', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('telefono2', 'Teléfono:') !!}
        {!! Form::text('telefono2', null, ['class' => 'form-control']) !!}
    </div>  
    <div class="form-group col-sm-6">
        {!! Form::label('id_precio', 'Lista Precio:') !!}
        <select class="form-control" name="id_precio" id="id_precio" required="">
            <option value="">Seleccione...</option>
                <option value="1" {{1==$clientes->id_precio?'selected':''}}>L1 Walkin/Showroom</option>
                <option value="2" {{2==$clientes->id_precio?'selected':''}}>L2 Carpinteros/Instaladores</option>
                <option value="3" {{3==$clientes->id_precio?'selected':''}}>L3 Arq./Diseñadores</option>
                <option value="4" {{4==$clientes->id_precio?'selected':''}}>L4 Proy.Grandes/Hoteles</option>


        </select>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('id_tipo1', 'Tipo de Participante:') !!}
        <select class="form-control" id="id_tipo1" name="id_tipo1">
            <option value="">Seleccione...</option>
            @foreach($tipo_cliente as $t)
            <option value="{{ $t->id}}" {{ ($clientes->id_tipo1==$t->id)?'selected':'' }}>{{ $t->tipo_cliente}}</option>
            @endforeach
        </select>
    </div>
    
            <!-- Cp Field -->
            

</div>
@if($editar ==1)
<hr>
<div class="row">
    <div class="col-md-12">
        <span class="btn btn-outline-primary btn_azul pull-right" onclick="ver_catalogo(15,0,1,{{$clientes->id_cliente}})" data-toggle="modal" data-backdrop="false" data-target="#primary">+ Contacto</span>
    </div>
    <br><br><br>
    <div class="col-md-12" id="tabla_catalogos">
        @include('clientes.asignacion')
    </div>
</div>
@endif
<div class="form-group col-sm-12" style="text-align: right;">
    <hr>
    {!! Form::submit('Guardar', ['class' => 'btn btn_azul']) !!}
    <a href="{!! route('clientes.index') !!}" class="btn btn_rojo">Cancelar</a>
</div>