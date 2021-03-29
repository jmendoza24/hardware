<?php $__env->startSection('titulo'); ?> Editar fabricante | <?php echo e($fabricantes->fabricante); ?>  <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php ($editar = 1); ?>
   <?php echo Form::model($fabricantes, ['route' => ['fabricantes.update', $fabricantes->id_fabricante], 'method' => 'patch']); ?>

        <?php echo $__env->make('fabricantes.fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/fabricantes/edit.blade.php ENDPATH**/ ?>