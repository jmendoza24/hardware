<div class="col-md-12">
	<label>Cliente: <?php echo e($cotizacion->nombre); ?></label>
	<span class="pull-right"><b>Cotización: <?php if($cotizacion->id_hijo != ''): ?> <?php echo e($cotizacion->id_hijo . '.'.$cotizacion->ver); ?> <?php else: ?> <?php echo e($cotizacion->id .'.'); ?> <?php endif; ?></span></b>
	
</div>

<table class="table table-striped table-bordered small text-center">
	<tr style="background: #5C8293; color: white;">
		<td><span class="btn btn-sm btn-outline-primary white" onclick="configura_abatimiento(<?php echo e($cotizacion->id); ?>,2)">+</span> </td>
		<td><b>I/LH</b></td>
		<td><b>I/RH</b></td>
		<td><b>O/LH</b></td>
		<td><b>O/RH</b></td>
		<td><b>POCKET</b></td>
		<td><b>VAIVEN</b></td>
	</tr>
	<?php $__currentLoopData = $abtimiento; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<tr> 
		<td><input type="text" class="form-control form-control-sm" id="puerta_<?php echo e($a->id); ?>" style="width: 60px;" value="<?php echo e($a->puerta); ?>" onchange="guarda_abatimiento(<?php echo e($a->id); ?>,<?php echo e($cotizacion->id); ?>)"></td>
		<td><input type="radio" name="p_<?php echo e($a->id); ?>" id="p_<?php echo e($a->id); ?>" <?php echo e($a->valor == 'I/LH'? 'checked' :''); ?> value="I/LH" onclick="guarda_abatimiento(<?php echo e($a->id); ?>,<?php echo e($cotizacion->id); ?>)"></td>
		<td><input type="radio" name="p_<?php echo e($a->id); ?>" id="p_<?php echo e($a->id); ?>" <?php echo e($a->valor == 'I/RH'? 'checked' :''); ?> value="I/RH" onclick="guarda_abatimiento(<?php echo e($a->id); ?>,<?php echo e($cotizacion->id); ?>)"></td>
		<td><input type="radio" name="p_<?php echo e($a->id); ?>" id="p_<?php echo e($a->id); ?>" <?php echo e($a->valor == 'O/LH'? 'checked' :''); ?> value="O/LH" onclick="guarda_abatimiento(<?php echo e($a->id); ?>,<?php echo e($cotizacion->id); ?>)"></td>
		<td><input type="radio" name="p_<?php echo e($a->id); ?>" id="p_<?php echo e($a->id); ?>" <?php echo e($a->valor == 'O/RH'? 'checked' :''); ?> value="O/RH" onclick="guarda_abatimiento(<?php echo e($a->id); ?>,<?php echo e($cotizacion->id); ?>)"></td>
		<td><input type="radio" name="p_<?php echo e($a->id); ?>" id="p_<?php echo e($a->id); ?>" <?php echo e($a->valor == 'POCKET'? 'checked' :''); ?> value="POCKET" onclick="guarda_abatimiento(<?php echo e($a->id); ?>,<?php echo e($cotizacion->id); ?>)"></td>
		<td><input type="radio" name="p_<?php echo e($a->id); ?>" id="p_<?php echo e($a->id); ?>" <?php echo e($a->valor == 'VAIVEN'? 'checked' :''); ?> value="VAIVEN" onclick="guarda_abatimiento(<?php echo e($a->id); ?>,<?php echo e($cotizacion->id); ?>)"></td>
	</tr>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
<hr>
<div class="row">
	<div class="col-md-10">
		<input type="text" id="email" class="form-control" value="<?php echo e($cotizacion->correo); ?>">
	</div>
	<div class="col-md-2">
		<span class="btn btn-primary pull-right">Enviar</span>
	</div>
</div><?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/cotizador/abatimientos.blade.php ENDPATH**/ ?>