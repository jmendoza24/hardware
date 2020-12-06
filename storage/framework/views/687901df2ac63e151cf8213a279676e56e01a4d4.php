

<?php $__env->startSection('titulo'); ?> Familias  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-md-12">    
    <h1 class="pull-right">
       <span class="btn btn_azul pull-right" style="margin-top: -10px;margin-bottom: 5px" onclick="ver_catalogo(2,0,1,<?php echo e($catalogo->fabricante); ?>,<?php echo e($catalogo->id); ?>)" data-toggle="modal" data-backdrop="false" data-target="#primary">+ Familia</span>
    </h1>
    </div>
    <br><br><br>
    <div class="col-md-12" id="tabla_catalogos">
     <?php echo $__env->make('familias.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('submenus'); ?>
<li><a href="<?php echo e(route('catalogos.index')); ?>">Catalogos</a></li>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/altermed/public_html/hardwarecollection.mx/laravel/resources/views/familias/index.blade.php ENDPATH**/ ?>