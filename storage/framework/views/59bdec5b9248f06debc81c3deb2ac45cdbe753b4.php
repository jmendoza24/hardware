<form id="catalogos_forma" action="">
	<?php echo csrf_field(); ?>
	<input type="hidden" name="id_catalogo" value="6">
	<input type="hidden" name="id" value="<?php echo e($selectores->id); ?>">
	<input type="hidden" id="fabricante" name="fabricante" value="<?php echo e($selectores->fabricante); ?>">
	
	<div class="form-group col-sm-12">
	    <?php echo Form::label('variable', 'Variable:'); ?>

	    <select class="form-control" id="variable" name="variable">
	    	<?php $__currentLoopData = $variable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
	    	<option value="<?php echo e($key); ?>" <?php echo e($key== $selectores->variable?'selected':''); ?>><?php echo e($value); ?></option>                    
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	    </select>
	</div>

	<div class="form-group col-sm-12">
	    <?php echo Form::label('Subcatalogo', 'Grupo:'); ?>

	    <input type="text" required="" name="subcatalogo" class="form-control" id="subcatalogo" value="<?php echo e($selectores->subcatalogo); ?>" onchange="valida_grupo()">
	</div>
	<div class="form-group col-sm-12">
	    <?php echo Form::label('Selector', 'Opciones:'); ?>&nbsp;(<span style="font-size: 11px;"><b>Separado por comas, Sin espacios</b></span>). Ej: AB,CD,EF,H
	    <textarea required="" name="selector" class="form-control" id="selector" ><?php echo e($selectores->selector); ?></textarea>
	</div>

	<hr>
	<div class="form-group col-sm-12">
		<span class="btn btn_azul pull-right" onclick="guarda_catalogo(6,<?php echo e($selectores->id); ?>,1,'baldwins')">Guardar</span>
	</div>
</form> <?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/sub_baldwins/fields.blade.php ENDPATH**/ ?>