<?php $__env->startSection('titulo'); ?> Productos <a class="btn btn-primary pull-right mr-2" style="margin-top: -10px;margin-bottom: 5px" href="<?php echo route('productos.create'); ?>">+ Producto</a> <?php $__env->stopSection(); ?> 
<?php $__env->startSection('content'); ?>
    <div class="row">    
		<div class="col-md-5">
			<select class="form-control" id="fabricante">
				<option value="">Fabricantes</option>
				<?php $__currentLoopData = $fabricantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<option value="<?php echo e($f->id_fabricante); ?>" <?php echo e($fab == $f->id_fabricante ? 'selected':''); ?>><?php echo e($f->fabricante); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>
		</div>
		<div class="col-md-7">
			<div class="row">
		    	<input type="text" id="item_buscar" class="form-control col-md-8 mr-1" placeholder="Buscar producto...">
		    	<span class="btn btn-outline-primary col-md-1" onclick="buscar_producto(0)"><i class="fa fa-search"></i></span>
	    	</div>
		</div>
    </div>
  <br>
    <div class="col-md-12" style="overflow-x: scroll;" id="tabla_productos">
     	<?php echo $__env->make('productos.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/productos/index.blade.php ENDPATH**/ ?>