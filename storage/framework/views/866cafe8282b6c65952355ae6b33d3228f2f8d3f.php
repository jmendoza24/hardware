<div class="col-md-12">
	<?php if($producto->info == 1 or $producto->info ==2): ?>
	<table class="table table-striped padding-table table-bordered">
		<tr>
			<td colspan="7"> </td>
			<td class="gris_tabla">Dependencia:</td>
			<td style="text-align: right;">$<?php echo e(number_format($suma_dependencias->sum_lp,2)); ?></td>
			<td style="text-align: right;">$<?php echo e(number_format($suma_dependencias->sum_phc,2)); ?></td>
			<td style="text-align: right;">$<?php echo e(number_format($suma_dependencias->sum_pvc,2)); ?></td>
		</tr>
		<tr style="text-align: center;" class="gris_tabla">
			<td></td>
			<td>Item</td>
			<td>Color</td> 
			<td>Sufijo</td>
			<td>IdFab</td>
			<td>Descripción</td>
			<td style="width: 9%;">LP</td>
			<td style="width: 9%;">Ctd</td>
			<td style="width: 9%;">LP</td>
			<td style="width: 9%;">PHC</td>
			<td style="width: 9%;">PVC</td>
		</tr>
		<?php $__currentLoopData = $dependencias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
		
		<?php 
			$elementos = array(1,2,3,5,6,7,9,11,13,14);
			$elementos2 = array(4,8,10,12);
			$caracteres = array('xxx','XXX','-')
		?>
		<tr>
			<td>
				<?php echo e($d->catagolo); ?> 
			</td>
			<td>
				<?php
				 	$items = $d->elemento !='' ? explode(',',($d->elemento)) : array();
				 	/**if(count($items)==1){
					  	$items1 = $items[0] !='' ? explode('.',($items[0])) : array();
					} */
				?> 
				<?php if($d->id_catalogo == 12 || $d->id_catalogo == 18): ?>
				<input type="text" id="item_<?php echo e($d->id_catalogo); ?>" style="width: 100px;" class="form-control form-control-sm" onchange="guarda_datos(<?php echo e($d->id); ?>,<?php echo e($d->id_catalogo); ?>)">
				<?php else: ?>
					<select class="form-control form-control-sm" id="item_<?php echo e($d->id_catalogo); ?>" style="width: 100px;" onchange="muestra_sufijo_ext(<?php echo e($d->id_catalogo); ?>); guarda_datos(<?php echo e($d->id); ?>,<?php echo e($d->id_catalogo); ?>);">
						<option value="">...</option>
						<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php $t1 = $t != '' ? explode('.',$t) : array();?>	
						<?php if(count($t1)>0): ?>
						 	<option value="<?php echo e(trim($t)); ?>" <?php echo e($d->item_seleccionado == trim($t)?'selected':''); ?>><?php echo e($t1[0]); ?> <?php if(isset($t1[2])): ?> [<?php echo e($t1[2]); ?>] <?php endif; ?></option>
						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>		
				<?php endif; ?>
			</td>
			<td>
				<?php 
					$colores = $d->colores_gral !='' ? explode(',',($d->colores_gral)) : array();
				 ?>
				<?php if($d->id_catalogo==12 || $d->id_catalogo == 18): ?>
				<input type="text" id="color_<?php echo e($d->id_catalogo); ?>" style="width: 90px;" class="form-control form-control-sm" onchange="guarda_datos(<?php echo e($d->id); ?>,<?php echo e($d->id_catalogo); ?>)">
				<?php else: ?> 
					<?php if($d->item=='-'): ?>
					-
					<?php elseif(in_array($d->id_catalogo, $elementos) && count($items)==0 && strtolower($d->color) != 'xxx' ): ?>
						<label id="color_<?php echo e($d->id_catalogo); ?>"><?php echo e($d->color); ?></label>
						<input type="hidden" id="color_<?php echo e($d->id_catalogo); ?>" value="<?php echo e($d->color); ?>">
					<?php elseif(in_array($d->id_catalogo, $elementos) && count($items)>0 ): ?>
						<select class="form-control form-control-sm" id="color_<?php echo e($d->id_catalogo); ?>" style=" width: 90px; <?php if(in_array($d->id_catalogo, $elementos2)): ?> display:none; <?php endif; ?> " onchange="guarda_datos(<?php echo e($d->id); ?>,<?php echo e($d->id_catalogo); ?>)">
							<option value="">Seleccione...</option>
							<?php if(count($colores)>0): ?>
								<?php $__currentLoopData = $colores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e(trim($c)); ?>" <?php echo e($c==$d->color?'selected':''); ?>><?php echo e($c); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php endif; ?>
						</select>
					<?php else: ?>
					-
					<?php endif; ?>	
				<?php endif; ?>
			</td>
			<td>
				<?php if($d->id_catalogo==12 || $d->id_catalogo == 18): ?>
					<input type="text" id="sufijo_<?php echo e($d->id_catalogo); ?>" style="width: 50px;" class="form-control form-control-sm" onchange="guarda_datos(<?php echo e($d->id); ?>,<?php echo e($d->id_catalogo); ?>)">
				<?php else: ?>
					<?php $sufijos = $d->sufijos_gral !='' ? explode(',',($d->sufijos_gral)) : array(); ?>
					
					<?php if(in_array($d->id_catalogo, $elementos) && strtolower($d->sufijo) != 'xxx'): ?>
					<label id="sufijo_<?php echo e($d->id_catalogo); ?>"><?php echo e($d->sufijo != 0? $d->sufijo :''); ?></label>
					<?php else: ?> 
					<label id="sufijo_<?php echo e($d->id_catalogo); ?>">-</label>
					<?php endif; ?>
				<?php endif; ?>			
			</td>
			<td><?php echo e($d->idfab); ?></td>
			<td><?php echo e($d->descripcion); ?></td>
			<td style="text-align: right;">$<?php echo e(number_format($d->lp,2)); ?></td>
			<td>
				<input type="text" id="cantidad_<?php echo e($d->id_catalogo); ?>" class="form-control form-control-sm cantidad-mask text-right" style="width:80px" onchange="guarda_datos(<?php echo e($d->id); ?>,<?php echo e($d->id_catalogo); ?>)" value="<?php echo e($d->ctd); ?>">
			</td>
			<td style="text-align: right;"><label id="lp_<?php echo e($d->id_catalogo); ?>"><?php echo e(number_format($d->lp * $d->ctd,2)); ?></label></td>
			<td style="text-align: right;"><label id="phc_<?php echo e($d->id_catalogo); ?>"><?php echo e(number_format($d->phc * $d->ctd,2)); ?></label></td>
			<td style="text-align: right;"><label id="lpv_<?php echo e($d->id_catalogo); ?>"><?php echo e(number_format($d->pvc * $d->ctd,2)); ?></label></td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</table>
	<?php elseif($producto->info ==5 || $producto->info ==7 ): ?>
	<table class="table table-striped padding-table table-bordered" style="width: 20%;">
		<tr style="text-align: center;" class="gris_tabla">
			<td></td>
			<td>DESCRIPT</td>
		</tr>
		<?php $__currentLoopData = $dependencias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
		<tr>
			<td>
				<?php echo e($d->catagolo); ?> 
			</td> 
			<td>
				<?php
				 	$items = $d->elemento !='' ? explode(',',($d->elemento)) : array();
				?> 
				<select class="form-control form-control-sm" id="item_<?php echo e($d->id_catalogo); ?>" style="width: 100px;" onchange="guarda_datos(<?php echo e($d->id); ?>,<?php echo e($d->id_catalogo); ?>);">
					<option value="">...</option>
					<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php $t1 = $t != '' ? explode('.',$t) : array();?>	
					<?php if(count($t1)>0): ?>
					 	<option value="<?php echo e(trim($t)); ?>" <?php echo e($d->item_seleccionado == trim($t)?'selected':''); ?>><?php echo e($t1[0]); ?> <?php if(isset($t1[2])): ?> [<?php echo e($t1[2]); ?>] <?php endif; ?></option>
					<?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>		
			</td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</table>
	<?php elseif($producto->info==6): ?>
	<table class="table table-striped padding-table table-bordered" style="width: 20%;">
		<tr style="text-align: center;" class="gris_tabla">
			<td></td>
			<td>LP</td>
			<td>CTD</td>
			<td>PHC</td>
			<td>PVC</td>
		</tr>
		<?php $__currentLoopData = $dependencias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
		<tr>
			<td>
				<?php echo e($d->catagolo); ?> 
			</td> 
			<td style="text-align: right;"><label id="lp_<?php echo e($d->id_catalogo); ?>"><?php echo e(number_format($d->lp,2)); ?></label></td>
			<td>
				<input type="text" id="cantidad_<?php echo e($d->id_catalogo); ?>" class="form-control form-control-sm cantidad-mask text-right" style="width:80px" onchange="guarda_datos(<?php echo e($d->id); ?>,<?php echo e($d->id_catalogo); ?>)" value="<?php echo e($d->ctd); ?>">
			</td>
			<td style="text-align: right;"><label id="phc_<?php echo e($d->id_catalogo); ?>"><?php echo e(number_format($d->phc ,2)); ?></label></td>
			<td style="text-align: right;"><label id="lpv_<?php echo e($d->id_catalogo); ?>"><?php echo e(number_format($d->pvc ,2)); ?></label></td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</table>
	<?php endif; ?>
</div><?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/cotizador/tabla_dependencia.blade.php ENDPATH**/ ?>