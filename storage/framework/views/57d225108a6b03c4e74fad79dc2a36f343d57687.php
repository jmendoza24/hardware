 
<?php $__env->startSection('content'); ?>
<br> 
<style type="text/css">
    .td-2px{padding: 2px;}
</style>
<div class="col-md-12" id="cotiza_table">
	  <?php echo $__env->make('cotizador.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>		
</div>
<div class="col-md-12">
    <h4>Notas de cotización:</h4>
    <textarea class="form-control" id="nota" onchange="guarda_cot_not(<?php echo e($cotizacion->id); ?>)" name="nota"><?php echo e($cotizacion->notas); ?></textarea>
</div>
<br>
	<div class="col-md-12">
		<fieldset class="checkboxsas">
          <label><input type="checkbox" value="1"  name=""> Enviar cotización producto.  </label>
        </fieldset>
        <fieldset class="checkboxsas">
          <label><input type="checkbox" value="1"  name=""> Enviar cotización instalación.  </label>
        </fieldset>
        <fieldset class="checkboxsas">
          <label><input type="checkbox" value="1"  name=""> Generar OCC proveedor.  </label>
        </fieldset>
    </div>
    
 <div class="col-md-12">
    <label>
    	<ul style="font-size: 10px; font-family: sans-serif;">
    		<li>EN PRODUCTOS MADRE (SET) SUFIJOS CON PRODUCTOS ASIGNADOS Y SE ADAPTAN AL FINISH DE LA COTIZACION. PARA PRODUCTOS DESIGNER EN DEPENDENCIAS LOS SUFIJOS SE PRESENTAN EN GRUPOS ASI COMO LOS COLORES PARA SER SELECCION.</li>
    		<li>DESCUENTO SOLO SOBRE EL PRODUCTO</li>
    	</ul>
    </label>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/hardware/resources/views/cotizador/index.blade.php ENDPATH**/ ?>