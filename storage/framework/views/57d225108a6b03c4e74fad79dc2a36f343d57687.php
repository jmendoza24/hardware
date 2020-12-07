 
<?php $__env->startSection('content'); ?>
<br> 
<style type="text/css">
    .td-2px{padding: 2px;}
</style>
<div class="col-md-12" id="cotiza_table" style="overflow-x: scroll;">
	  <?php echo $__env->make('cotizador.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>		
</div>
<div class="col-md-12">
    <h4>Notas de cotización:</h4>
    <textarea class="form-control" style="height: 300px;" id="nota" onchange="guarda_cot_not(<?php echo e($cotizacion->id); ?>)" name="nota"><?php echo e($cotizacion->notas); ?></textarea>
</div>
<br>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/hardware/resources/views/cotizador/index.blade.php ENDPATH**/ ?>