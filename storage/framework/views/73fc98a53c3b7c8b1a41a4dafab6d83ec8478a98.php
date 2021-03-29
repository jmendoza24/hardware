<?php $__env->startSection('titulo'); ?> <h2 style=" color: #5C8293"><strong>Editar proyecto -</strong><span style="font-size: 22px;"> <?php echo e($proyectos->nombre); ?> </span> </h2> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php ($editar =1); ?>
<?php echo Form::model($proyectos, ['route' => ['proyectos.update', $proyectos->id], 'method' => 'patch']); ?>

      <?php echo $__env->make('proyectos.fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/proyectos/edit.blade.php ENDPATH**/ ?>