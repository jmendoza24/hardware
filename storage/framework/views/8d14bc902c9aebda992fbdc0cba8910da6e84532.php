<?php $__env->startSection('titulo'); ?> <h2 style=" color: #5C8293"><strong>Nuevo proyecto</strong></h2>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php ($editar =0); ?>
<?php echo Form::open(['route' => 'proyectos.store']); ?>


    <?php echo $__env->make('proyectos.fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/proyectos/create.blade.php ENDPATH**/ ?>