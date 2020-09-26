<!-- Id Proyecto Field -->
<div class="form-group">
    {!! Form::label('id_proyecto', 'Id Proyecto:') !!}
    <p>{!! $proyectosClientes->id_proyecto !!}</p>
</div>

<!-- Id Cliente Field -->
<div class="form-group">
    {!! Form::label('id_cliente', 'Id Cliente:') !!}
    <p>{!! $proyectosClientes->id_cliente !!}</p>
</div>

<!-- Comentario Field -->
<div class="form-group">
    {!! Form::label('comentario', 'Comentario:') !!}
    <p>{!! $proyectosClientes->comentario !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $proyectosClientes->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $proyectosClientes->updated_at !!}</p>
</div>

