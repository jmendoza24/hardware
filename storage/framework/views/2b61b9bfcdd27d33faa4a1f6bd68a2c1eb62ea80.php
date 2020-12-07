<form id="catalogos_forma" action="">
	<?php echo csrf_field(); ?>
	<input type="hidden" name="id_catalogo" value="1">
	<input type="hidden" name="id" value="<?php echo e($catalogos->id); ?>">
	<!-- Fabricante Field -->
	<div class="form-group col-sm-12">
	    <?php echo Form::label('fabricante', 'Fabricante:'); ?>

	    <select name="fabricante" id="fabricante" class="form-control">
		<option value="">Seleccione...</option>
		<?php $__currentLoopData = $fabricantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<option value="<?php echo e($fab->id_fabricante); ?>" <?php echo e($fab->id_fabricante==$catalogos->fabricante?'selected':''); ?>><?php echo e($fab->fabricante); ?></option>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</select>
	</div>

	
	<!-- Catalogo Field -->
	<div class="form-group col-sm-12">
	    <?php echo Form::label('catalogo', 'Catalogo:'); ?>

	    <input type="text" required="" name="catalogo" class="form-control" id="catalogo" value="<?php echo e($catalogos->catalogo); ?>">
	</div>
	<hr>
	<div class="form-group col-sm-12">
		<span class="btn azul pull-right" onclick="guarda_catalogo(1,<?php echo e($catalogos->id); ?>,1,'catalogos')">Guardar</span>
	</div>
</form> <?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/catalogos/fields.blade.php ENDPATH**/ ?>