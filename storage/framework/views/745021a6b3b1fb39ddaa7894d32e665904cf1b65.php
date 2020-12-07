<?php $__env->startSection('titulo'); ?> Productos <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-md-4">
		<select class="form-control" id="fabricantes" onchange="busca_producto(1)">
			<option value="">Seleccione</option>
			<?php $__currentLoopData = $fabricantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<option value="<?php echo e($f->id_fabricante); ?>" <?php echo e($f->id_fabricante==77?'selected':''); ?>><?php echo e($f->fabricante); ?></option>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</select>
	</div>
	<div class="col" id="conteos">
		<?php echo $__env->make('productos.conteos', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</div>
	<div class="col-md-2">    
    <h1 class="pull-right">
       <a class="btn btn_azul pull-right" style="margin-top: -10px;margin-bottom: 5px" href="<?php echo route('productos.create'); ?>">+ Producto</a>
    </h1>
    </div>
</div>
    
<div class="row">
    <div class="col-md-12" id="productos">
     	<?php echo $__env->make('productos.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/productos/index.blade.php ENDPATH**/ ?>