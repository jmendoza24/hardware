<!-- Id Producto Field -->
<div class="form-group">
    {!! Form::label('id_producto', 'Id Producto:') !!}
    <p>{{ $tblFotosProductos->id_producto }}</p>
</div>

<!-- Foto Field -->
<div class="form-group">
    {!! Form::label('foto', 'Foto:') !!}
    <p>{{ $tblFotosProductos->foto }}</p>
</div>

<!-- Activo Field -->
<div class="form-group">
    {!! Form::label('activo', 'Activo:') !!}
    <p>{{ $tblFotosProductos->activo }}</p>
</div>

<!-- Tipo Field -->
<div class="form-group">
    {!! Form::label('tipo', 'Tipo:') !!}
    <p>{{ $tblFotosProductos->tipo }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $tblFotosProductos->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $tblFotosProductos->updated_at }}</p>
</div>

