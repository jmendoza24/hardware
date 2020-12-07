<form id="catalogos_forma" action="">
	<?php echo csrf_field(); ?>
	<input type="hidden" name="id_catalogo" value="17">
	<input type="hidden" name="id" value="<?php echo e($imagenes->id); ?>">
	<input type="hidden" name="id_producto" value="<?php echo e($imagenes->id_producto); ?>">
	<?php if($imagenes->foto!=''): ?>
	<img src="">
	<?php else: ?>
	<div class="form-group col-sm-12">
	    <?php echo Form::label('catalogo', 'Imagen:'); ?>

	    <input type="file" class="form-control" name="foto" id="foto">
	</div>
	<hr>
	<div class="form-group col-sm-12">
		<span class="btn btn-primary pull-right" onclick="guarda_catalogo(17,<?php echo e($imagenes->id); ?>,1,'imagenes_productos')">Guardar</span>
	</div>
	<?php endif; ?>
</form> <?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/productos/alta_imagen.blade.php ENDPATH**/ ?>