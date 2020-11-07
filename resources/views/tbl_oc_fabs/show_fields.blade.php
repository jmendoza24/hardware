<!-- Id Cotizacion Field -->
<div class="form-group">
    {!! Form::label('id_cotizacion', 'Id Cotizacion:') !!}
    <p>{{ $tblOcFab->id_cotizacion }}</p>
</div>

<!-- Estatus Field -->
<div class="form-group">
    {!! Form::label('estatus', 'Estatus:') !!}
    <p>{{ $tblOcFab->estatus }}</p>
</div>

<!-- Cantidad Field -->
<div class="form-group">
    {!! Form::label('cantidad', 'Cantidad:') !!}
    <p>{{ $tblOcFab->cantidad }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $tblOcFab->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $tblOcFab->updated_at }}</p>
</div>

