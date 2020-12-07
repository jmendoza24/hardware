<form id="catalogos_forma" action="">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="id_catalogo" value="15">
    <input type="hidden" name="id" value="<?php echo e($participantes->id); ?>">
    <input type="hidden" name="id_cliente" value="<?php echo e($participantes->id_cliente); ?>">
    
    <div class="form-group col-sm-12">
        <?php echo Form::label('familia', 'Contacto:'); ?>

        <input type="text" class="form-control" name="contacto" id="contacto" value="<?php echo e($participantes->contacto); ?>">
    </div>

    <div class="form-group col-sm-12">
        <?php echo Form::label('familia', 'Correo:'); ?>

        <input type="text" class="form-control" name="correo" id="correo" value="<?php echo e($participantes->correo); ?>">
    </div>

    <div class="form-group col-sm-12">
        <?php echo Form::label('familia', 'Teléfono:'); ?>

        <input type="text" class="form-control" name="telefono" id="telefono" value="<?php echo e($participantes->telefono); ?>">
    </div>

    <div class="form-group col-sm-12">
        <?php echo Form::label('familia', 'Puesto:'); ?>

        <input type="text" class="form-control" name="puesto" id="puesto" value="<?php echo e($participantes->puesto); ?>">
    </div>
    <div class="form-group col-sm-12">
        <?php echo Form::label('familia', 'Activo:'); ?>

        <select class="form-control" name="activo">
            <option value="">Seleccione...</option>
            <option value="1" <?php echo e($participantes->activo==1?'selected':''); ?>>Activo</option>
            <option value="0" <?php echo e($participantes->activo==0?'selected':''); ?>>No Activo</option>
        </select>
    </div>
    <hr>
    <div class="form-group col-sm-12">
        <span class="btn btn-primary pull-right" onclick="guarda_catalogo(15,<?php echo e($participantes->id); ?>,1,'tabla_catalogos')">Guardar</span>
    </div>
</form><?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/clientes/participantes_fields.blade.php ENDPATH**/ ?>