<ul class="nav nav-tabs nav-underline no-hover-bg nav-justified">
  <li class="nav-item">
    <a class="nav-link active" id="baseIcon-tab11" data-toggle="tab" aria-controls="tabIcon11"
    href="#tabIcon11" aria-expanded="true"> General</a>
  </li>
  @if($editar == 1)
  <li class="nav-item">
    <a class="nav-link" id="baseIcon-tab13" data-toggle="tab" aria-controls="tabIcon13" href="#tabIcon12" aria-expanded="false"> Contactos adicionales</a>
  </li>
  @endif
</ul>
<div class="tab-content px-1 pt-1">
  <div role="tabpanel" class="tab-pane active" id="tabIcon11" aria-expanded="true" aria-labelledby="baseIcon-tab11">
    <div class="row">
        <div class="form-group col-sm-6">
            {!! Form::label('fabricante', 'Fabricante:') !!}
            {!! Form::text('fabricante', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('abrev', 'Abrev:') !!}
            {!! Form::text('abrev', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('direccion', 'Direccion:') !!}
            {!! Form::textarea('direccion', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('pais', 'Pais:') !!}
            <select class="form-control" id="pais" name="pais">
                <option value="">Seleccione...</option>
                @foreach($pais as $ps)
                <option value="{{ $ps->id}}" {{ ($fabricantes->pais==$ps->id)?'selected':'' }}>{{ $ps->Pais}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('estado', 'Estado:') !!}
            {!! Form::text('estado', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('cp', 'Cp:') !!}
            {!! Form::number('cp', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('contacto', 'Contacto:') !!}
            {!! Form::text('contacto', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('telefono_dir', 'Teléfono Directo:') !!}
            {!! Form::text('telefono_dir', null, ['class' => 'form-control phone-inputmask']) !!}
        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('telefono_gen', 'Teléfono General:') !!}
            {!! Form::text('telefono_gen', null, ['class' => 'form-control phone-inputmask']) !!}
        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('telefono_fax', 'Teléfono Fax:') !!}
            {!! Form::text('telefono_fax', null, ['class' => 'form-control phone-inputmask']) !!}
        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('datos_bancarios', 'Datos Bancarios:') !!}
            {!! Form::textarea('datos_bancarios', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('web', 'Web:') !!}
            {!! Form::text('web', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('correo', 'Correo:') !!}
            {!! Form::text('correo', null, ['class' => 'form-control email-inputmask']) !!}
        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('correo_gen', 'Correo General:') !!}
            {!! Form::text('correo_gen', null, ['class' => 'form-control email-inputmask']) !!}
        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('condiciones', 'Condiciones:') !!}
            {!! Form::text('condiciones', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('descripcion', 'Descripción:') !!}
            {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('gama', 'Gama:') !!}
            <select class="form-control" name="gama">
                <option value="">Seleccione...</option>
                @foreach($gama as $g)
                <option value="{{ $g->id}}" {{ ($g->id==$fabricantes->gama)?'selected':''}}>{{ $g->tipo}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('modalidad', 'Modalidad:') !!}
            <select class="form-control" name="modalidad">
                <option value="">Seleccione...</option>
                @foreach($modalidad as $m)
                <option value="{{ $m->id}}" {{ ($m->id==$fabricantes->modalidad)?'selected':''}}>{{ $m->tipo}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('activo', 'Activo:') !!}
            <select class="form-control" name="activo">
                <option value=""></option>
                <option value="1" {{($fabricantes->activo==1?'selected':'')}}>SI</option>
                <option value="0" {{($fabricantes->activo==0?'selected':'')}}>NO</option>
            </select>
        </div>        
    </div>
  </div>
  <div class="tab-pane" id="tabIcon12" aria-labelledby="baseIcon-tab12">
    <span class="btn btn-primary pull-right" data-toggle="modal" data-backdrop="false" data-target="#primary" style="margin-top: -10px;margin-bottom: 5px" onclick="agrega_contacto({{$fabricantes->id_fabricante}},0)">+ Contacto</span>
    <br><br>
    <div class="row" id="contactos_fab">
        @include('fabricantes.contacto')
    </div>
  </div>
</div>

<div class="form-group col-sm-12" style="text-align: right;">
    <hr>
    {!! Form::submit('Guardar', ['class' => 'btn btn_azul']) !!}
    <a href="{!! route('fabricantes.index') !!}" class="btn btn_rojo">Cancelar</a>
</div>
