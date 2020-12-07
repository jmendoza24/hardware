<?php $__env->startSection('titulo'); ?> Editar Participante |<span style="font-size: 20px;"> <?php echo e($clientes->nombre); ?></span>  <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php ($editar = 1); ?>
   <?php echo Form::model($clientes, ['route' => ['clientes.update', $clientes->id_cliente], 'method' => 'patch']); ?>

        <?php echo $__env->make('clientes.fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/altermed/public_html/hardwarecollection.mx/laravel/resources/views/clientes/edit.blade.php ENDPATH**/ ?>