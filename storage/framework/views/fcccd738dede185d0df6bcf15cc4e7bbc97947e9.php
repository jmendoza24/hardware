<?php $__env->startSection('titulo'); ?> Datos Generales de Cotización <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
     <?php echo $__env->make('productos.fields_generales', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/productos/generales.blade.php ENDPATH**/ ?>