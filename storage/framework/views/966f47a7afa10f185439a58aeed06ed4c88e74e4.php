<?php $__env->startSection('titulo'); ?> Tipo Clientes <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="col-md-12">    
    <h1 class="pull-right">
       <span class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" onclick="ver_catalogo(13,0,1,'tipo_clientes')" data-toggle="modal" data-backdrop="false" data-target="#primary">+ Tipo cliente</span>
    </h1>
</div>
<br>
<div class="col-md-12" id="tabla_catalogos">
    <?php echo $__env->make('tipo_clientes.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/tipo_clientes/index.blade.php ENDPATH**/ ?>