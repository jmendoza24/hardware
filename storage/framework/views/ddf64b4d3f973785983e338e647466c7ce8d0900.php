<div class="row">
<!-- Fabricante Field -->
    <div class="form-group col-sm-12">
        <?php echo Form::label('Condiciones', 'Condiciones Adicionales:'); ?>

      <textarea id="condiciones" class="form-control"><?php echo e($data->condiciones); ?></textarea>
    </div>

    <!-- Catalogo Field -->
    <div class="form-group col-sm-12">
        <?php echo Form::label('Notas', 'Notas de cotización:'); ?>

        <textarea id="notas" class="form-control"><?php echo e($data->notas); ?></textarea>
    </div>

    <!-- Pagina Field -->
    <div class="form-group col-sm-12">
        <?php echo Form::label('Cuentas', 'Cuentas Bancarias:'); ?>

        <textarea id="cuentas" class="form-control"><?php echo e($data->cuentas); ?></textarea>
    </div>
<!-- Submit Field -->
</div>
<div class="form-group col-sm-12" style="text-align: right;">
    <button class="btn btn_azul" onclick="guarda_generales()">Guardar</button>
        <a href="#" class="btn btn_rojo">Cancelar</a>
    </div><?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/productos/fields_generales.blade.php ENDPATH**/ ?>