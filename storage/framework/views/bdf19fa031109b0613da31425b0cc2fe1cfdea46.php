<?php $__env->startSection('titulo'); ?> Subcategorias Colores <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-md-12">    
    <h1 class="pull-right">
       <span class="btn btn_azul pull-right" style="margin-top: -10px;margin-bottom: 5px" onclick="ver_catalogo(18,0,1)" data-toggle="modal" data-backdrop="false" data-target="#primary">+ Color</span>
    </h1>
    </div>
    <br><br><br>
    <div class="row">
        <div class="col-md-12" id="tabla_catalogos">
         	<?php echo $__env->make('emtek_subcat.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
      </div>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/emtek_subcat/index.blade.php ENDPATH**/ ?>