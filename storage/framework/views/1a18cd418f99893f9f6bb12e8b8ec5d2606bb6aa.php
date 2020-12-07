<?php $__env->startSection('titulo'); ?> Nuevo Participante  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php ($editar = 0); ?>
<?php echo Form::open(['route' => 'clientes.store']); ?>

    <?php echo $__env->make('clientes.fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/altermed/public_html/hardwarecollection.mx/laravel/resources/views/clientes/create.blade.php ENDPATH**/ ?>