<ul class="nav nav-tabs nav-underline no-hover-bg nav-justified">
  <li class="nav-item">
    <a class="nav-link active" id="baseIcon-tab11" data-toggle="tab" aria-controls="tabIcon11"
    href="#tabIcon11" aria-expanded="true"> General</a>
  </li>
  @if($editar == 1)
  <li class="nav-item">
    <a class="nav-link" id="baseIcon-tab12" data-toggle="tab" aria-controls="tabIcon12"
    href="#tabIcon12" aria-expanded="false"> Involucrados</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="baseIcon-tab13" data-toggle="tab" aria-controls="tabIcon13"
    href="#tabIcon13" aria-expanded="false">Documentos</a>
  </li>
  @endif
</ul>

<div class="tab-content px-1 pt-1">
    <div role="tabpanel" class="tab-pane active" id="tabIcon11" aria-expanded="true" aria-labelledby="baseIcon-tab11">
        <div class="row">
            <div class="form-group col-sm-6">
                {!! Form::label('nombre', 'Proyecto:') !!}
                {!! Form::text('nombre', null, ['class' => 'form-control','required']) !!}
            </div>

            <!-- Nombre Corto Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('nombre_corto', 'Nombre Corto:') !!}
                {!! Form::text('nombre_corto', null, ['class' => 'form-control','required']) !!}
            </div>

            <!-- Direccion Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('direccion', 'Dirección:') !!}
                {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Geolocalizacion Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('geolocalizacion', 'Geolocalización:') !!}
                {!! Form::text('geolocalizacion', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Rfc Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('rfc', 'Proyectos relacionados:') !!}
                {!! Form::text('rfc', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Cp Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('cp', 'CP:') !!}
                {!! Form::text('cp', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-sm-6">
                {!! Form::label('estado', 'País:') !!}
                <select class="form-control" id="pais" name="pais" onchange="busca_estado('estado_select')">
                    <option value="">Seleccione...</option>
                    @foreach($paises as $ps)
                    <option value="{{ $ps->id}}" {{ ($proyectos->pais==$ps->id)?'selected':'' }}>{{ $ps->Pais}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-sm-6">
                {!! Form::label('estado', 'Estado:') !!}
                <select class="form-control" id="estado_select" name="estado" style="@if($proyectos->pais ==126 ||$proyectos->pais=='' ) display: none; @endif" onchange="get_municipios('estado_select','municipio_select')">
                    <option value="">Seleccione...</option>
                    @foreach($estados as $edo)
                    <option value="{{ $edo->id}}" {{ ($proyectos->estado==$edo->id)?'selected':'' }}>{{ $edo->estado}}</option>
                    @endforeach
                </select>
                @if($proyectos->pais != 126 && $proyectos->pais=='' ) 
                    <input type="text" name="estado" id="estado_text" class="form-control" value="{{ $proyectos->estado}}">
                @endif
            </div>

            <div class="form-group col-sm-6">
                {!! Form::label('municipio', 'Municipio:') !!}
                <select class="form-control" id="municipio_select" name="municipio" style="@if($proyectos->pais ==126 ||$proyectos->pais=='' ) display: none; @endif" >
                    <option value="">Seleccione...</option>
                    @foreach($municipios as $mun)
                    <option value="{{ $mun->id}}" {{ ($proyectos->municipio==$mun->id)?'selected':'' }}>{{ $mun->municipio}}</option>
                    @endforeach
                </select>
                @if($proyectos->pais != 126 && $proyectos->pais=='' ) 
                    <input type="text" name="municipio" id="municipio_text" class="form-control" value="{{ $proyectos->municipio}}">
                @endif
            </div>
            
        </div>
        <hr>
        <br><h2 style=" color: #5C8293"><strong>Contactos Principales</strong></h2><br><br>

        <div class="row">
            <!-- Correo Due O Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('nombre_duenio', 'Dueño:') !!}
                {!! Form::text('nombre_duenio', null, ['class' => 'form-control mail']) !!}
            </div>
            <div class="form-group col-sm-4">
                {!! Form::label('correo_duenio', 'Email:') !!}
                {!! Form::text('correo_duenio', null, ['class' => 'form-control mail']) !!}
            </div>

            <!-- Telefono Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('telefono', 'Teléfono:') !!}
                {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Arquitecto Correo Field -->
        </div>
        <div class="row"> 
            <div class="form-group col-sm-4">
                {!! Form::label('nombre_arq', 'Arquitecto:') !!}
                {!! Form::text('nombre_arq', null, ['class' => 'form-control mail']) !!}
            </div>
            <div class="form-group col-sm-4">
                {!! Form::label('arquitecto_correo', 'Email:') !!}
                {!! Form::text('arquitecto_correo', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Tel Arq Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('tel_arq', 'Teléfono:') !!}
                {!! Form::text('tel_arq', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="row">
            <!-- Comprador Correo Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('nombre_firma', 'Firma:') !!}
                {!! Form::text('nombre_firma', null, ['class' => 'form-control mail']) !!}
            </div>

            <div class="form-group col-sm-4">
                {!! Form::label('comprador_firma', 'Email:') !!}
                {!! Form::text('comprador_firma', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Tel Comprador Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('tel_firma', 'Teléfono:') !!}
                {!! Form::text('tel_firma', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="row">
            <!-- Comprador Correo Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('nombre_comprador', 'Comprador:') !!}
                {!! Form::text('nombre_comprador', null, ['class' => 'form-control mail']) !!}
            </div>

            <div class="form-group col-sm-4">
                {!! Form::label('comprador_correo', 'Email:') !!}
                {!! Form::text('comprador_correo', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Tel Comprador Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('tel_comprador', 'Teléfono:') !!}
                {!! Form::text('tel_comprador', null, ['class' => 'form-control']) !!}
            </div>
        </div>
                <div class="row">
            <!-- Comprador Correo Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('nombre_comprador', 'Residente principal:') !!}
                {!! Form::text('residente', null, ['class' => 'form-control mail']) !!}
            </div>

            <div class="form-group col-sm-4">
                {!! Form::label('residente_correo', 'Email:') !!}
                {!! Form::text('residente_correo', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Tel Comprador Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('tel_residente', 'Teléfono:') !!}
                {!! Form::text('residente_tel', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <hr>
        <div class="row">
            
            <div class="form-group col-sm-6">
                {!! Form::label('tipo', 'Tipo de Proyecto:') !!}
                <select class="form-control" name="tipo">
                <option value="">Seleccione..</option>
                @foreach($tipo_proyecto as $t)
                    <option value="{{$t->id}}" {{$t->id == $proyectos->tipo?'selected':''}}>{{$t->tipo_proyecto}}</option>
                @endforeach
                </select>
            </div>

            <!-- Comentarios Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('comentarios', 'Comentarios:') !!}
                {!! Form::text('comentarios', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Estatus Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('estatus', 'Estatus:') !!}
                <select class="form-control" name="estatus">
                    <option value="">Seleccione...</option>
                    <option value="1" {{$proyectos->estatus ==1 ? 'selected':''}}>Activo</option>
                    <option value="2" {{$proyectos->estatus ==2 ? 'selected':''}}>No activo</option>
                </select>
            </div>

            <!-- Submit Field -->
        </div>
        <hr>
        <div class="row">
            <div class="form-group col-sm-12" style="text-align: right;">
                {!! Form::submit('Guardar', ['class' => 'btn azul']) !!}
                <a href="{!! route('proyectos.index') !!}" class="btn btn_rojo">Cancelar</a>
            </div>
        </div>
    </div>
    @if($editar == 1)
    <div class="tab-pane" id="tabIcon12" aria-labelledby="baseIcon-tab12">
        @include('proyectos.clientes')
    </div>
    <div class="tab-pane" id="tabIcon13" aria-labelledby="baseIcon-tab3">
        <div class="col-md-12 text-left">
            <span class="btn btn-outline-success" data-toggle="modal" data-target="#primary"  onclick="ver_catalogo(18,0,1,'',{{ $proyectos->id}},1)"><i class="fa fa-plus"></i> Nuevo Documento</span>
        </div>
        <br>
        <div class="row" id="tabla_catalogos">
           @include('proyectos.archivos')
        </div>
    </div>
    @endif
</div>