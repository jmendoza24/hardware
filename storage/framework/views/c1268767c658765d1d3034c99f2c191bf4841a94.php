<?php $__env->startSection('titulo'); ?> Nuevo producto  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php ($editar=0); ?> 
<?php echo Form::open(['route' => 'productos.store']); ?>


    <?php echo $__env->make('productos.fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/productos/create.blade.php ENDPATH**/ ?>