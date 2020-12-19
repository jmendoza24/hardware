 
<?php $__env->startSection('content'); ?>
<br> 
<style type="text/css">
    .td-2px{padding: 2px;}
</style>
<div class="col-md-12">
    <a class="btn btn-primary pull-right" href="<?php echo route('cotizador.index'); ?>">+ Cotización</a>
</div>
<br><br>
<div class="col-md-12" id="cotiza_table">
	  <?php echo $__env->make('cotizador.cotizaciones', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\hardware\resources\views/cotizador/lista.blade.php ENDPATH**/ ?>