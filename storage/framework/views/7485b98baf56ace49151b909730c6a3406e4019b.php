<form id="catalogos_forma" action="">
	<?php echo csrf_field(); ?>
	<input type="hidden" name="id_catalogo" value="18">
	<input type="hidden" name="id" value="<?php echo e($colores->id); ?>">	
	<div class="form-group col-sm-12">
	    <?php echo Form::label('subcategoria', 'Subcategoria:'); ?>

	    <select class="form-control" name="subcategoria">
	    	<option value="">Seleccione...</option>
	    	<?php $__currentLoopData = $subcategorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	    	<option value="<?php echo e($s->id); ?>" <?php echo e($colores->subcategoria == $s->id ? 'selected':''); ?>><?php echo e($s->nom_categoria .' - ' .$s->subcategoria); ?></option>
	    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	    </select>
	</div>
	<div class="form-group col-sm-12">
	    <?php echo Form::label('color', 'Color:'); ?>

	    <input type="text" name="color" class="form-control" value="<?php echo e($colores->color); ?>">
	</div>
	<div class="form-group col-sm-12">
	    <?php echo Form::label('costo', 'Costo:'); ?>

	    <input type="number" name="costo" class="form-control" value="<?php echo e($colores->costo); ?>">
	</div>
	<hr>
	<div class="form-group col-sm-12">
		<span class="btn btn-primary pull-right" onclick="guarda_catalogo(18,<?php echo e($colores->id); ?>,1,<?php echo e($colores->subcategoria); ?>)">Guardar</span>
	</div>
</form> 
<?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/emtek_subcat/fields.blade.php ENDPATH**/ ?>