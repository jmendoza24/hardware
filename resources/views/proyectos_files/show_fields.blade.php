<!-- Id Proyecto Field -->
<div class="form-group">
    {!! Form::label('id_proyecto', 'Id Proyecto:') !!}
    <p>{!! $proyectosFiles->id_proyecto !!}</p>
</div>

<!-- Tipo File Field -->
<div class="form-group">
    {!! Form::label('tipo_file', 'Tipo File:') !!}
    <p>{!! $proyectosFiles->tipo_file !!}</p>
</div>

<!-- File Field -->
<div class="form-group">
    {!! Form::label('file', 'File:') !!}
    <p>{!! $proyectosFiles->file !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $proyectosFiles->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $proyectosFiles->updated_at !!}</p>
</div>

