<div class="row">
<!-- Fabricante Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('Condiciones', 'Condiciones Adicionales:') !!}
      <textarea id="condiciones" class="form-control">{{ $data->condiciones }}</textarea>
    </div>

    <!-- Catalogo Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('Notas', 'Notas de cotización:') !!}
        <textarea id="notas" class="form-control">{{ $data->notas }}</textarea>
    </div>

    <!-- Pagina Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('Cuentas', 'Cuentas Bancarias:') !!}
        <textarea id="cuentas" class="form-control">{{ $data->cuentas }}</textarea>
    </div>
<!-- Submit Field -->
</div>
<div class="form-group col-sm-12" style="text-align: right;">
    <button class="btn btn-primary" onclick="guarda_generales()">Guardar</button>
        <a href="#" class="btn btn-secondary">Cancelar</a>
    </div>