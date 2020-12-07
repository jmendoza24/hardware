<form id="catalogos_forma" action="">
	<?php echo csrf_field(); ?>
	<input type="hidden" name="id_catalogo" value="14">
	<input type="hidden" name="id" value="<?php echo e($tipo_proyecto->id); ?>">
    <div class="form-group col-md-12">
	    <?php echo Form::label('tipo_cliente', 'Tipo Proyecto:'); ?>

	    <input type="text" name="tipo_proyecto" value="<?php echo e($tipo_proyecto->tipo_proyecto); ?>" class="form-control requerido">
	</div>
    <div class="form-group col-sm-12">
        <span class="btn btn-primary pull-right" onclick="guarda_catalogo(14,<?php echo e($tipo_proyecto->id); ?>,1,'tabla_catalogos')">Guardar</span>
    </div>
</form>
<?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/tipo_proyectos/fields.blade.php ENDPATH**/ ?>