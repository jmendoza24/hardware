<input type="hidden" id="id_info" value="<?php echo e($producto->info); ?>">
<table class="table small table-striped table-bordered">
	<tr>
		<td colspan="<?php if($producto->info == 7 || $producto->info == 4 || $producto->info == 6): ?> 2 <?php else: ?> 4 <?php endif; ?>" style="text-align: left;"><span class="badge badge-primary" style="font-size: 14px;"> <?php echo e($producto->info); ?> </span></td>
		<?php if($producto->info == 7 || $producto->info == 4 || $producto->info == 6): ?>
		<td class="gris_tabla">
			<?php 
				$det_grupo = $detalle->det_grupo !='' ? explode(',',($detalle->det_grupo)) : array();
				$f_grupo = $detalle->f_grupo !='' ? explode(',',($detalle->f_grupo)) : array();
			?>
			<select class="form-control form-control-sm" title="DT" id="dt_g" onchange="guarda_detalle(<?php echo e($info_adic->id_detalle); ?>)">
				<option value="">DET</option>
				<?php $__currentLoopData = $det_grupo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($d); ?>" <?php echo e($detalle->det == $d? 'selected': ''); ?>><?php echo e($d); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>
		</td>
		<td style="width: 200px;" class="gris_tabla">
			<div class="row">
				<?php if($producto->info != 4 and $producto->info != 6): ?>
				<div class="col-md-5">
					<select class="form-control form-control-sm" style="width: 80px;" title="F" id="f_g" onchange="guarda_detalle(<?php echo e($info_adic->id_detalle); ?>)">
					<option value="">Mortise</option>
					<?php $__currentLoopData = $f_grupo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="<?php echo e($f); ?>" <?php echo e($detalle->f == $f? 'selected': ''); ?>><?php echo e($f); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
				</div>
				<?php endif; ?>
				<?php if($producto->latch_ext == 1): ?>
					<div class="col-md-5"><label><input type="checkbox" id="latch_ext" <?php echo e($detalle->latch==1 ? 'checked' :''); ?> style="margin-top: 5px;" onclick="guarda_detalle(<?php echo e($info_adic->id_detalle); ?>)" > Latch </label></div>
				<?php endif; ?>
			</div>
		</td>
		<?php endif; ?>
		<td class="gris_tabla"> SKU: </td>
		<td>
			<?php echo e($detalle->id_fab); ?>

		</td>
		<?php if($producto->info == 5): ?>

		<?php ($cant = sizeof($dependencias) > 0 ? ($dependencias[0]->ctd == 0 ? 1 : $dependencias[0]->ctd) : 1); ?>
		<td style="text-align:right; width: 9%;">$<?php echo e(number_format($detalle->lp/($detalle->phc == 0 ? 1 : $cant),2)); ?></td>
		<td style="text-align:right; width: 9%;">$<?php echo e(number_format($detalle->phc/($detalle->phc == 0 ? 1 : $cant),2)); ?></td>
		<td style="text-align:right; width: 9%;">$<?php echo e(number_format($detalle->pvc/($detalle->pvc == 0 ? 1 : $cant),2)); ?></td>
		<?php else: ?> 
		<td style="text-align:right; width: 9%;">$<?php echo e(number_format($detalle->lp,2)); ?></td>
		<td style="text-align:right; width: 9%;">$<?php echo e(number_format($detalle->phc,2)); ?></td>
		<td style="text-align:right; width: 9%;">$<?php echo e(number_format($detalle->pvc,2)); ?></td>
		<?php endif; ?>
	</tr>
	<tr>
		<td class="gris_tabla">Fabricante:</td>
		<td><?php echo e($informacion->fabricante); ?></td>
		<td class="gris_tabla">Item:</td>  
		<td><?php echo e($informacion->item); ?></td>
		<td class="gris_tabla">Página:</td>
		<td><?php echo e($producto->pagina); ?></td>
		<td colspan="3" rowspan="4"></td>
	</tr> 
	<tr>
		<td class="gris_tabla">Categoria:</td>
		<td><?php echo e($informacion->categoria); ?></td>
		<td class="gris_tabla">Finish:</td>
		<td>
			 <?php if($producto->info== 1 || $producto->info == 2): ?>
			 	<label style="font-size: 13px;"> <input type="checkbox" id="finish_all" onchange="actualiza_finish(<?php echo e($detalle->id); ?>,<?php echo e($detalle->id_cotizacion); ?>,'<?php echo e($info_adic->finish); ?>')" > <b><?php echo e($info_adic->finish); ?></b></label>
			 	<?php else: ?>
			 	<?php echo e($detalle->finish); ?>

			 <?php endif; ?>
			 
		</td>
		<td class="gris_tabla">Nota: </td>
		<td><?php echo e($producto->nota); ?></td>
	</tr>
	<tr>
		<td class="gris_tabla">Sub. Categoria:</td>
		<td><?php echo e($informacion->subcategoria); ?></td>
		<?php # $sufijo = $info_adic->sufijo !='' ? explode(',',($info_adic->sufijo)) : array();?>
		<td class="gris_tabla">Sufijo:</td>
		<td>
			<?php echo e($detalle->sufijo); ?>

		</td>
		<td class="gris_tabla">Foto:</td>
		<td><?php if($fotos->foto != ''): ?><a href="/storage/<?php echo e($fotos->foto); ?>" target="_blank">Ver Foto</a><?php else: ?> Sin fotos <?php endif; ?></td>
	</tr>
	<tr>
		<td class="gris_tabla">Diseño:</td>
		<td><?php echo e($informacion->disenio); ?></td>
		<td class="gris_tabla">Handing:</td>
		<td>
			<?php echo e($detalle->handing); ?>

		</td>
		<td class="gris_tabla">Descripción:</td>
		<td><?php echo e($producto->descripcion); ?></td>
	</tr>
	<tr>
		<td class="gris_tabla">Descripción:</td>
		<td></td>
		<td class="gris_tabla">Style:</td>
		<td>
			<?php if($producto->info != 5 && $producto->info != 7): ?>
			<?php 
			
			  $ext_trim = $info_adic->ext_trim !='' ? explode(',',($info_adic->ext_trim)) : array();
			  $int_escutch =  $info_adic->int_escutch !='' ? explode(',',($info_adic->int_escutch)) : array();
			  $knob_lever =  $info_adic->knob_lever !='' ? explode(',',($info_adic->knob_lever)) : array();
			  $spindle =  $info_adic->spindle !='' ? explode(',',($info_adic->spindle)) : array();
			  
			  if(count($ext_trim)==1){
			  	$ext_trim1 = $ext_trim[0] !='' ? explode('.',($ext_trim[0])) : array();
			  }

			  if(count($int_escutch)==1){
			  	$int_escutch1 = $int_escutch[0] !='' ? explode('.',($int_escutch[0])) : array();
			  }

			  if(count($knob_lever)==1){
			  	$knob_lever1 = $knob_lever[0] !='' ? explode('.',($knob_lever[0])) : array();
			  }

			  if(count($spindle)==1){
			  	$spindle1 = $spindle[0] !='' ? explode('.',($spindle[0])) : array();
			  }

			?>
			
			<?php endif; ?>
			<?php echo e($detalle->style); ?>

		</td>
		<td colspan="2" style="background: #5C8293; border-left: 1px solid #5C8293; color: white; text-align: right; ">
			<span class="pull-left"><?php 
				switch ($cotizacion->lista_precio) {
				  case 1:
				    echo "L1 Walkin/Showroom";
				    break;
				  case 2:
				    echo "L2 Carpinteros/Instaladores";
				    break;
				  case 3:
				    echo "L3 Arq./Diseñadores";
				    break;
				  case 4:
				    "L4 Proy.Grandes/Hoteles";
				    break;
				  default:
				    echo "Sin lista de precio";
				}
			?>
			</span>
			<b class="pull-right">Total:</b></td>
		<td style="background: #5C8293; border-left: 2px solid #5C8293; color: white; text-align: right;">$<?php echo e(number_format($detalle->lp + $suma_dependencias->sum_lp,2)); ?></td>
		<td style="background: #5C8293; border-left: 2px solid #5C8293; color: white; text-align: right;">$<?php echo e(number_format($detalle->phc + $suma_dependencias->sum_phc,2)); ?></td>
		<td style="background: #5C8293; border-left: 2px solid #5C8293; color: white; text-align: right;">$<?php echo e(number_format($detalle->pvc + $suma_dependencias->sum_pvc,2)); ?></td>
	</tr>
</table><?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/cotizador/detalle_head.blade.php ENDPATH**/ ?>