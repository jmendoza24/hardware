

<table class="table small table-striped table-bordered">
	<tr>
		<td colspan="4" style="text-align: right;"></td>
		<td class="gris_tabla"> IdFab: </td>
		<td>
			<?php if($producto->info == 5): ?>
			<?php echo e($detalle->id_fab); ?>

			<?php else: ?>
			<?php echo e(str_replace('xxx', $info_adic->finish,  $producto->codigo_sistema)); ?>

			<?php endif; ?>
		</td>
		<td style="text-align:right; width: 9%;">$<?php echo e(number_format($detalle->lp,2)); ?></td>
		<td style="text-align:right; width: 9%;">$<?php echo e(number_format($detalle->phc,2)); ?></td>
		<td style="text-align:right; width: 9%;">$<?php echo e(number_format($detalle->pvc,2)); ?></td>
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
			<?php $finish_1 = $info_adic->finish_1 !='' ? explode(',',($info_adic->finish_1)) : array();
				  $finish_2 = $info_adic->finish_2 !='' ? explode(',',($info_adic->finish_2)) : array();
				  $finish_3 = $info_adic->finish_3 !='' ? explode(',',($info_adic->finish_3)) : array();
				  $finish_4 = $info_adic->finish_4 !='' ? explode(',',($info_adic->finish_4)) : array();
			 ?>
			<select class="form-control form-control-sm" id="det_finish" style="width: 100px;" onchange="guarda_detalle(<?php echo e($info_adic->id_detalle); ?>)">
				<option value="">Seleccione...</option>
					<?php $__currentLoopData = $finish_1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="<?php echo e($f1); ?>" <?php echo e($f1==$info_adic->finish?'selected':''); ?>><?php echo e($f1); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php $__currentLoopData = $finish_2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="<?php echo e($f2); ?>" <?php echo e($f2==$info_adic->finish?'selected':''); ?>><?php echo e($f2); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php $__currentLoopData = $finish_3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="<?php echo e($f3); ?>" <?php echo e($f3==$info_adic->finish?'selected':''); ?>><?php echo e($f3); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php $__currentLoopData = $finish_4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f4): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($f4); ?>" <?php echo e($f4==$info_adic->finish?'selected':''); ?>><?php echo e($f4); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>
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
			<?php echo e($info_adic->sufijo); ?>

		</td>
		<td class="gris_tabla">Foto:</td>
		<td><?php if($fotos->foto != ''): ?><a href="/storage/<?php echo e($fotos->foto); ?>" target="_blank">Ver Foto</a><?php else: ?> Sin fotos <?php endif; ?></td>
	</tr>
	<tr>
		<td class="gris_tabla">Diseño:</td>
		<td><?php echo e($informacion->disenio); ?></td>
		<td class="gris_tabla">Handing</td>
		<td>
			<?php if($producto->info == 5): ?>
			<select id="handing" class="form-control form-control-sm" style="width: 100px;" onchange="guarda_detalle(<?php echo e($info_adic->id_detalle); ?>)">
				<option value="">Seleccione...</option>
				<option value="LH" <?php echo e($detalle->handing=='LH'?'selected':''); ?>>LH</option>
				<option value="RH" <?php echo e($detalle->handing=='RH'?'selected':''); ?>>RH</option>
			</select>
			<?php else: ?>
			<input type="hidden" id="handing" value="<?php echo e($info_adic->handing); ?>">
			<?php echo e($info_adic->handing); ?>

			<?php endif; ?>
		</td>
		<td class="gris_tabla">Descripción:</td>
		<td><?php echo e($producto->descripcion); ?></td>
	</tr>
	<tr>
		<td class="gris_tabla">Descripción:</td>
		<td></td>
		<td class="gris_tabla">Style</td>
		<td>
			<?php if($producto->info != 5): ?>
			<?php 
			  $style_1 = $info_adic->style_1 !='' ? explode(',',($info_adic->style_1)) : array();
			  $style_2 = $info_adic->style_2 !='' ? explode(',',($info_adic->style_2)) : array();
			  $style_3 = $info_adic->style_3 !='' ? explode(',',($info_adic->style_3)) : array();
			  
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
			<select class="form-control form-control-sm" id="det_style" style="width: 100px;" onchange="guarda_detalle(<?php echo e($info_adic->id_detalle); ?>)">
				<option value="">Seleccione..</option>
				<?php $__currentLoopData = $style_1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($s1); ?>" <?php echo e($s1==$info_adic->style?'selected':''); ?>><?php echo e($s1); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php $__currentLoopData = $style_2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<option value="<?php echo e($s2); ?>" <?php echo e($s2==$info_adic->style?'selected':''); ?>><?php echo e($s2); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php $__currentLoopData = $style_3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<option value="<?php echo e($s3); ?>" <?php echo e($s3==$info_adic->style?'selected':''); ?>><?php echo e($s3); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>
			<?php endif; ?>
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
</table><?php /**PATH /home/altermed/public_html/hardwarecollection.mx/laravel/resources/views/cotizador/detalle_head.blade.php ENDPATH**/ ?>