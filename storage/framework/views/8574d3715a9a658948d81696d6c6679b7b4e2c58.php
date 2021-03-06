<?php $__env->startSection('titulo'); ?> Dependencias <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-md-12" style="">
     	<table class="table table-bordered table-striped">
     		<thead>
	     		<tr class="gris_tabla">
	     			<th>Vistas</th>
	     		</tr>
     		</thead>
     		<tbody>
	     		<?php $__currentLoopData = $listado_vistas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	     		<tr>
	     			<td><a data-toggle="modal" data-backdrop="false" data-target="#primary" style="cursor: pointer; " onclick="ver_dependencias(<?php echo e($c->id); ?>)"><?php echo e($c->nombre); ?></a></td>
	     		</tr>
	     		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     		</tbody>
     	</table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/productos/dependencias.blade.php ENDPATH**/ ?>