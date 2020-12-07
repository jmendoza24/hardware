<?php $__env->startSection('titulo'); ?> Productos <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-md-12">    
    <h1 class="pull-right">
       <a class="btn btn_azul pull-right" style="margin-top: -10px;margin-bottom: 5px" href="<?php echo route('productos.create'); ?>">+ Producto</a>
    </h1>
    </div>
    <br><br><br>
    <div class="col-md-12" style="overflow-x: scroll;">
     <?php echo $__env->make('productos.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/altermed/public_html/demo.cotiza.tech/laravel/resources/views/productos/index.blade.php ENDPATH**/ ?>