<?php $__env->startSection('titulo'); ?> <h2><strong>Participantes</strong></h2> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-md-12">    
    <h1 class="pull-right">
       <a class="btn btn_azul pull-right" style="margin-top: -10px;margin-bottom: 5px" href="<?php echo route('clientes.create'); ?>">+ Participante</a>
    </h1>
    </div>
    <br>
    <div class="col-md-12" style="overflow-x: scroll;">
     <?php echo $__env->make('clientes.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/hardware/resources/views/clientes/index.blade.php ENDPATH**/ ?>