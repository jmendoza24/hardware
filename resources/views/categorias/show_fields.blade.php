<!-- Fabricante Field -->
<div class="form-group">
    {!! Form::label('fabricante', 'Fabricante:') !!}
    <p>{!! $categoria->fabricante !!}</p>
</div>

<!-- Categoria Field -->
<div class="form-group">
    {!! Form::label('categoria', 'Categoria:') !!}
    <p>{!! $categoria->categoria !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $categoria->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $categoria->updated_at !!}</p>
</div>

