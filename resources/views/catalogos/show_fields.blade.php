<!-- Fabricante Field -->
<div class="form-group">
    {!! Form::label('fabricante', 'Fabricante:') !!}
    <p>{!! $catalogos->fabricante !!}</p>
</div>

<!-- Catalogo Field -->
<div class="form-group">
    {!! Form::label('catalogo', 'Catalogo:') !!}
    <p>{!! $catalogos->catalogo !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $catalogos->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $catalogos->updated_at !!}</p>
</div>

