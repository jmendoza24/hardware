<div class="row">
	<div class="col-md-12">
	<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<span class="btn btn-outline-success btn_azul" onclick="agrega_producto(<?php echo e($i->id); ?>)" style="cursor: pointer;"><?php echo e($i->item_nom); ?>-<?php echo e($i->sufijo); ?></span>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
	<div class="col-md-12">
		<br>
		<img src="/storage/<?php echo e($fotos->foto); ?>" style="width: 100%;">	
	</div>	
</div>



<?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/cotizador/detalle.blade.php ENDPATH**/ ?>