<form id="catalogos_forma" action="">
	<?php echo csrf_field(); ?>
	<input type="hidden" name="id_catalogo" value="13">
	<input type="hidden" name="id" value="<?php echo e($tipo_cliente->id); ?>">
    <div class="form-group col-md-12">
	    <?php echo Form::label('tipo_cliente', 'Tipo Cliente:'); ?>

	    <input type="text" name="tipo_cliente" value="<?php echo e($tipo_cliente->tipo_cliente); ?>" class="form-control requerido">
	</div>
    <div class="form-group col-sm-12">
        <span class="btn btn-primary pull-right" onclick="guarda_catalogo(13,<?php echo e($tipo_cliente->id); ?>,1,'tabla_catalogos')">Guardar</span>
    </div>
</form><?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/tipo_clientes/fields.blade.php ENDPATH**/ ?>