<!-- Id Proyecto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_proyecto', 'Id Proyecto:') !!}
    {!! Form::number('id_proyecto', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Cliente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_cliente', 'Id Cliente:') !!}
    {!! Form::number('id_cliente', null, ['class' => 'form-control']) !!}
</div>

<!-- Comentario Field -->
<div class="form-group col-sm-6">
    {!! Form::label('comentario', 'Comentario:') !!}
    {!! Form::text('comentario', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('proyectosClientes.index') !!}" class="btn btn-default">Cancel</a>
</div>
