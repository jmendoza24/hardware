<!-- Id Cotizacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_cotizacion', 'Id Cotizacion:') !!}
    {!! Form::number('id_cotizacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Estatus Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estatus', 'Estatus:') !!}
    {!! Form::number('estatus', null, ['class' => 'form-control']) !!}
</div>

<!-- Cantidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cantidad', 'Cantidad:') !!}
    {!! Form::number('cantidad', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('tblOcFabs.index') }}" class="btn btn-default">Cancel</a>
</div>
