

<?php $__env->startSection('titulo'); ?>Costos <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-md-12" id="lista_costs">
     <?php echo $__env->make('fabricantes.table_costos', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/altermed/public_html/hardwarecollection.mx/laravel/resources/views/fabricantes/costos.blade.php ENDPATH**/ ?>