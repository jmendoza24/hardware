<?php $__env->startSection('titulo'); ?> OC Fabricantes <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-md-12">    
    <h1 class="pull-right">
    </h1>
    </div>
    <br><br><br>
    <div class="col-md-12" style="overflow-x: scroll;">
     <?php echo $__env->make('tbl_oc_fabs.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/altermed/public_html/demo.cotiza.tech/laravel/resources/views/tbl_oc_fabs/index.blade.php ENDPATH**/ ?>