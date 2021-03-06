<?php $__env->startSection('titulo'); ?> <h2 style=" color: #5C8293"><strong>Proyectos</strong></h2> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-md-12">    
    <h1 class="pull-right">
       <a class="btn pull-right" style="
         background-color: #5C8293;
         color: white;margin-top: -10px;margin-bottom: 5px" href="<?php echo route('proyectos.create'); ?>">+ Proyecto</a>
    </h1>
    </div>
    <br><br><br>
    <div class="col-md-12" style="overflow-x: scroll;">
     <?php echo $__env->make('proyectos.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/proyectos/index.blade.php ENDPATH**/ ?>