<?php $__env->startSection('titulo'); ?> Editar producto  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php ($editar=1); ?> 
<?php echo Form::model($productos, ['route' => ['productos.update', $productos->id], 'method' => 'patch']); ?>


    <?php echo $__env->make('productos.fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
   
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/productos/edit.blade.php ENDPATH**/ ?>