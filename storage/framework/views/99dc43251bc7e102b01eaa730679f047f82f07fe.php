<style type="text/css">
	#titulos_tab td{padding: 5px;}
</style>
<table class="table table-bordered table-striped" id="titulos_tab">
	<tr>
		<td class="gris_tabla">Proyecto:</td>
		<td><?php echo e($cotizacion->nombre_corto); ?></td>
		<td class="gris_tabla">Cotización:</td>
		<td><b><?php if($cotizacion->id_hijo != ''): ?> <?php echo e($cotizacion->id_hijo . '.'.$cotizacion->ver); ?> <?php else: ?> <?php echo e($cotizacion->id .'.'); ?> <?php endif; ?></b></td>
		<td class="gris_tabla">Fecha:</td>
		<td> <?php echo e($cotizacion->fecha); ?></td>
	</tr> 
	<tr><td class="gris_tabla">Participante: </td>
		<td> <?php echo e($cotizacion->contacto); ?></label></td>
		<td class="gris_tabla">OC Cliente: </td>
		<td> <b><?php echo e($cotizacion->id_occ); ?> </b>	</td>		
		<td colspan="2"></td>
	</tr>
	<?php if($cotizacion->abatimiento==1 && $vista != 2): ?>
	<tr>
		<td colspan="6" class="gris_tabla">
			<b>Datos de confirmación</b><br>
			Nombre: <?php echo e($cotizacion->nombre); ?><br>
			Correo confirmacion: <?php echo e($cotizacion->correo); ?><br>
			Fecha confirmación: <?php echo e($cotizacion->fecha_abatimiento); ?><br>
			Email enviado : <?php echo e($cotizacion->email_enviado); ?>


		</td>
	</tr>
	<?php endif; ?>
</table>
<hr>
<table class="table table-striped table-bordered small text-center">
	<tr style="background: #5C8293; color: white;">
		<td colspan="2"><span class="btn btn-sm btn-outline-primary white" onclick="configura_abatimiento(<?php echo e($cotizacion->id); ?>,2,<?php echo e($vista=='' ? 1 : $vista); ?>)">+ Abatimiento</span> </td>
		<td style="padding:6px;"><b>I/LH</b></td>
		<td style="padding:6px;"><b>I/RH</b></td>
		<td style="padding:6px;"><b>O/LH</b></td>
		<td style="padding:6px;"><b>O/RH</b></td>
		<td style="padding:6px;"><b>POCKET</b></td>
		<td style="padding:6px;"><b>VAIVEN</b></td>
	</tr>
	<?php ($i = 1); ?>
	<?php $__currentLoopData = $abtimiento; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<tr> 
		<?php if($i < 4): ?>
		<td style="padding:10px;">
			<input type="text" class="form-control form-control-sm" id="puerta_<?php echo e($a->id); ?>" style="" value="<?php echo e($a->puerta); ?>" onchange="guarda_abatimiento(<?php echo e($a->id); ?>,<?php echo e($cotizacion->id); ?>)" >
		</td>
		<td style="padding:10px;">
			<?php if($i==1): ?>
			<span class="btn btn-sm btn-outline-info" style=" float: right;" onclick="muestra_abatimiento()"><i class="fa fa-info"></i></span>
			<?php endif; ?>

			<select class="form-control form-control-sm" id="sel_<?php echo e($a->id); ?>" style="width: 60%; float: left;" onchange="guarda_abatimiento(<?php echo e($a->id); ?>,<?php echo e($cotizacion->id); ?>)">
				<option value="CL" <?php echo e($a->sel == 'CL' ? 'selected':''); ?>>CL</option>
				<option value="TG" <?php echo e($a->sel == 'TG' ? 'selected':''); ?>>TG</option>
				<option value="TC" <?php echo e($a->sel == 'TC' ? 'selected':''); ?>>TC</option>
			</select>
		</td>
		<?php else: ?> 
		<td style="padding:10px;" colspan="2">
			<input type="text" style="width: 80%; float: left;" class="form-control form-control-sm" id="puerta_<?php echo e($a->id); ?>" style="" value="<?php echo e($a->puerta); ?>" onchange="guarda_abatimiento(<?php echo e($a->id); ?>,<?php echo e($cotizacion->id); ?>)" > &nbsp;
			<span style="float: right;" class="btn btn-sm btn-outline-danger" onclick="elimina_elemento(<?php echo e($a->id); ?>,<?php echo e($cotizacion->id); ?>)"><i class="fa fa-trash"></i></span>
		</td>
		<?php endif; ?>
		<td style="padding:6px;"><input type="radio" name="p_<?php echo e($a->id); ?>" id="p_<?php echo e($a->id); ?>" <?php echo e($a->valor == 'I/LH'? 'checked' :''); ?> value="I/LH" onclick="guarda_abatimiento(<?php echo e($a->id); ?>,<?php echo e($cotizacion->id); ?>)"></td>
		<td style="padding:6px;"><input type="radio" name="p_<?php echo e($a->id); ?>" id="p_<?php echo e($a->id); ?>" <?php echo e($a->valor == 'I/RH'? 'checked' :''); ?> value="I/RH" onclick="guarda_abatimiento(<?php echo e($a->id); ?>,<?php echo e($cotizacion->id); ?>)"></td>
		<td style="padding:6px;"><input type="radio" name="p_<?php echo e($a->id); ?>" id="p_<?php echo e($a->id); ?>" <?php echo e($a->valor == 'O/LH'? 'checked' :''); ?> value="O/LH" onclick="guarda_abatimiento(<?php echo e($a->id); ?>,<?php echo e($cotizacion->id); ?>)"></td>
		<td style="padding:6px;"><input type="radio" name="p_<?php echo e($a->id); ?>" id="p_<?php echo e($a->id); ?>" <?php echo e($a->valor == 'O/RH'? 'checked' :''); ?> value="O/RH" onclick="guarda_abatimiento(<?php echo e($a->id); ?>,<?php echo e($cotizacion->id); ?>)"></td>
		<td style="padding:6px;"><input type="radio" name="p_<?php echo e($a->id); ?>" id="p_<?php echo e($a->id); ?>" <?php echo e($a->valor == 'POCKET'? 'checked' :''); ?> value="POCKET" onclick="guarda_abatimiento(<?php echo e($a->id); ?>,<?php echo e($cotizacion->id); ?>)"></td>
		<td style="padding:6px;"><input type="radio" name="p_<?php echo e($a->id); ?>" id="p_<?php echo e($a->id); ?>" <?php echo e($a->valor == 'VAIVEN'? 'checked' :''); ?> value="VAIVEN" onclick="guarda_abatimiento(<?php echo e($a->id); ?>,<?php echo e($cotizacion->id); ?>)"></td>
	</tr>
	<?php ($i +=1); ?>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>

<?php if($vista == 2): ?>
<div class="row">
<form action="<?php echo e(route('guarda.abatimiento')); ?>" class="form-row" method="post">
	<input type="hidden" name="id" value="<?php echo e($cotizacion->id); ?>">
	<?php echo csrf_field(); ?>
		<label class="col-md-12 " style="color: red; font-size: 14px">Confirme la configuración,  ingresar su nombre y correo.</label>
		<div class="col-md-5">
			<input type="text" name="nombre" required="" class="form-control mr-1" placeholder="Nombre completo">
		</div>
		<div class="col-md-5">
			<input type="text" name="email" required="" class="form-control mr-1" placeholder="E-mail">
		</div>
		<div class="col-md-2">
			<input type="submit" class="btn btn-primary" value="Firmar" >
		</div>
	</div>
</form>
<?php else: ?>
<div class="row">
	<div class="col-md-10">
		<input type="text" id="email" class="form-control" value="<?php echo e($cotizacion->correo); ?>">
	</div>
	<div class="col-md-2">
		<span class="btn btn-primary pull-right" onclick="enviar_abatimiento(<?php echo e($cotizacion->id); ?>)">Enviar</span>
	</div>

</div>
<?php endif; ?><?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/cotizador/abatimientos.blade.php ENDPATH**/ ?>