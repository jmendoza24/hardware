
<?php ($subtotal_dl = 0); ?>
<?php ($subtotal_dl_1 = 0); ?>
<?php ($subtotal_ps = 0); ?>
<?php ($p_unit = 1000); ?>
<style type="text/css">
	.table th, .table td {
     padding: 6px; 
	}
	.color{border: 2px solid white; color: gray; text-align: right;}
</style>
<!---- small row-border-->
	<table class="table table-striped" style="font-size: 11px;" id="" border="0">
		<tr style="border-top: 3px solid white; background:white;">
			<td colspan="<?php echo e($estatus == 1 ? 13:11); ?>">
				<span><span class="badge badge-primary" style="text-align: left;">Cotización <?php echo e($cotizacion->id_hijo != '' ? $cotizacion->id_hijo . '.'. $cotizacion->ver : $cotizacion->id); ?></span>
				<select id="sp" class="form-control select2 pull-right"  onchange="cacha()" style="width: 80%" >
					<option value="0">Buscar productos...</option>
						<?php $__currentLoopData = $filtros_select; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option   value="<?php echo e($s->id_producto); ?>" ><?php echo e($s->item); ?> - <?php echo e($s->sufijo != '' ? ' - ' .$s->sufijo :''); ?> <?php echo e($s->descripcion != '' ? ' - '.$s->descripcion : ''); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>
				</span>
			</td>
			<td colspan="7" style="background: #67A957;" class="text-center white"><b>Producto USD:</b></td>
			<td colspan="3" style="background: #67A957; border-left: 3px solid white;" class="text-center white"><b>Modificación USD:</b></td>
			<td colspan="3" style="background: #67A957; border-left: 3px solid white;" class="text-center white"><b>Instalación MXN:</b></td>
		</tr>
		<tr style=" border:2px solid #67A957;  color: white; background:#67A957; text-align: center; ">
			<td></td>
			<!--<td>Item</td>-->
			<td>Abrev</td>
			<td>SKU</td>
			<td>Posición</td>
			<td>Descripción</td>
			<td>BKS</td>
			<td>FNS</td>
			<td>SFJ</td>
			<td>STL</td>
			<td>HND</td>
			<td>D.T</td>
			<td>LP</td>
			<td>PHC</td>
			<td>PVC</td>
			<td colspan="2">Inv I II</td>
			<td>Ctd</td> 
			<?php if($estatus==1): ?>
			<td></td>
			<td></td>
			<?php endif; ?>
			<td>Total</td> 
			<td style="border-left: 3px solid white;">PU</td>
			<td>Ctd</td>
			<td>Total</td>
			<td  style="border-left: 3px solid white;">PU</td>
			<td>Ctd</td>
			<td>Total</td>
		</tr>
		<?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr>
			<td>
				<div class="btn-group">
                    <button type="button" class="btn btn-icon btn-pure dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
                    <div class="dropdown-menu">
                    	<span class="btn btn-sm btn-outline-danger" style="cursor: pointer;" onclick="elimina_producto(<?php echo e($p->id); ?>)"><i class="fa fa-trash"></i></span> &nbsp;
						<span class="btn btn-sm btn-outline-primary" data-toggle="modal" data-backdrop="false" data-target="#primary" style="cursor: pointer; font-size: 12px;" onclick="agregar_dependencia(<?php echo e($p->idproducto); ?>,<?php echo e($p->id); ?>)"><i class="fa fa-info"></i> <b><?php echo e($p->info); ?></b></span>&nbsp;
						<span class="btn btn-sm btn-outline-success" onclick="agrega_producto(<?php echo e($p->idproducto); ?>)"><i class="fa fa-plus"></i></span>&nbsp;
						<span  class="btn btn-sm btn-outline-success"  data-toggle="modal" data-backdrop="false" data-target="#primary" style="cursor: pointer;" onclick="ver_imagen(<?php echo e($p->id_item); ?>)"><i class="fa fa-camera" aria-hidden="true"></i></span>        
                    </div>
                 </div>

				<!--<span class="btn-group">
					<span class="btn btn-sm btn-outline-danger" style="cursor: pointer;" onclick="elimina_producto(<?php echo e($p->id); ?>)"><i class="fa fa-trash"></i></span> &nbsp;
					<span class="btn btn-sm btn-outline-primary" data-toggle="modal" data-backdrop="false" data-target="#primary" style="cursor: pointer; font-size: 12px;" onclick="agregar_dependencia(<?php echo e($p->idproducto); ?>,<?php echo e($p->id); ?>)"><i class="fa fa-info"></i> <b><?php echo e($p->info); ?></b></span>&nbsp;
					<span class="btn btn-sm btn-outline-success" onclick="agrega_producto(<?php echo e($p->idproducto); ?>)"><i class="fa fa-plus"></i></span>&nbsp;

					<span  class="btn btn-sm btn-outline-success"  data-toggle="modal" data-backdrop="false" data-target="#primary" style="cursor: pointer;" onclick="ver_imagen(<?php echo e($p->id_item); ?>)"><i class="fa fa-camera" aria-hidden="true"></i></span>
				</span>--->
			</td>
			<!--<td style="text-align: left; font-weight: bold;">
				<?php echo e($p->item_nom); ?>

			</td>-->
			<td><?php echo e($p->abrev); ?></td>
			<td>
				<?php echo e(str_replace('xxx', $p->finish, $p->id_fab)); ?>

			</td>
			<td>
				<input type="text" name="posicion_<?php echo e($p->id); ?>" value="<?php echo e($p->posicion); ?>" id="posicion_<?php echo e($p->id); ?>" class="form-control form-control-sm" onchange="guarda_info_cotizacion(<?php echo e($p->id); ?>)">
			</td>
			<td>
				<input type="text" name="descripcion_<?php echo e($p->id); ?>" value="<?php echo e($p->descripcion); ?>" id="descripcion_<?php echo e($p->id); ?>" class="form-control form-control-sm" onchange="guarda_info_cotizacion(<?php echo e($p->id); ?>)">
			</td>
			<td>
				<?php ($selectores = explode(',',$p->list_backset)); ?>
				<select id="bks_<?php echo e($p->id); ?>" class="form-control form-control-sm" style="width: 50px;" onchange="guarda_info_cotizacion(<?php echo e($p->id); ?>)">
					<option value="">...</option>
					<?php $__currentLoopData = $selectores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($s); ?>" <?php echo e($s==$p->bks?'selected':''); ?>><?php echo e($s); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>
			</td>
			<td>
					<?php $finish_1 = $p->finish_1 !='' ? explode(',',($p->finish_1)) : array();
						  $finish_2 = $p->finish_2 !='' ? explode(',',($p->finish_2)) : array();
						  $finish_3 = $p->finish_3 !='' ? explode(',',($p->finish_3)) : array();
						  $finish_4 = $p->finish_4 !='' ? explode(',',($p->finish_4)) : array();
					 ?>
					<select class="form-control form-control-sm" id="det_finish_<?php echo e($p->id); ?>" style="width: 60px;" onchange="guarda_detalle(<?php echo e($p->id); ?>)">
						<option value="">...</option>
							<?php $__currentLoopData = $finish_1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($f1); ?>" <?php echo e($f1==$p->finish?'selected':''); ?>><?php echo e($f1); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php $__currentLoopData = $finish_2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($f2); ?>" <?php echo e($f2==$p->finish?'selected':''); ?>><?php echo e($f2); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php $__currentLoopData = $finish_3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($f3); ?>" <?php echo e($f3==$p->finish?'selected':''); ?>><?php echo e($f3); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php $__currentLoopData = $finish_4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f4): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($f4); ?>" <?php echo e($f4==$p->finish?'selected':''); ?>><?php echo e($f4); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
			</td>
			<td><?php echo e($p->sufijo); ?></td>
			<td>
				<?php if($p->info != 6 and $p->info != 4): ?>
			<?php 
			  $style_1 = $p->style_1 !='' ? explode(',',($p->style_1)) : array();
			  $style_2 = $p->style_2 !='' ? explode(',',($p->style_2)) : array();
			  $style_3 = $p->style_3 !='' ? explode(',',($p->style_3)) : array();

			?>
			<select class="form-control form-control-sm" id="det_style_<?php echo e($p->id); ?>" style="width: 60px;" onchange="guarda_detalle(<?php echo e($p->id); ?>)">
				<option value="">...</option>
				<?php $__currentLoopData = $style_1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($s1); ?>" <?php echo e($s1==$p->style_sel?'selected':''); ?>><?php echo e($s1); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php $__currentLoopData = $style_2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<option value="<?php echo e($s2); ?>" <?php echo e($s2==$p->style_sel?'selected':''); ?>><?php echo e($s2); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php $__currentLoopData = $style_3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<option value="<?php echo e($s3); ?>" <?php echo e($s3==$p->style_sel?'selected':''); ?>><?php echo e($s3); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>
			<?php endif; ?>
 
			</td>
			<td>
				<?php ($selectores_hand = explode(',',$p->list_handing)); ?>
				<select id="handing_<?php echo e($p->id); ?>" class="form-control form-control-sm" style="width: 50px;" onchange="guarda_info_cotizacion(<?php echo e($p->id); ?>)">
					<option value="">...</option>
					<?php if(sizeof($selectores_hand)>0): ?>
						<?php $__currentLoopData = $selectores_hand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="<?php echo e($s); ?>" <?php echo e($s==$p->handing?'selected':''); ?>><?php echo e($s); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>
				</select>
			</td>
			<td>
				<input type="text" name="doort_<?php echo e($p->id); ?>" id="doort_<?php echo e($p->id); ?>"  style="width: 60px;" value="<?php echo e($p->door_t); ?>" class="form-control form-control-sm" min="1" onchange="guarda_info_cotizacion(<?php echo e($p->id); ?>)">
			</td>
			<td class="text-right">$<?php echo e(number_format($p->lp + $p->sum_lp,2)); ?></td>
			<td class="text-right">$<?php echo e(number_format($p->phc + $p->sum_phc,2)); ?></td>
			<?php ($suma_pv = $p->pvc + $p->sum_pvc); ?>
			<td class="text-right">$<?php echo e(number_format($suma_pv,2)); ?></td>
			
			<td ><span class="badge badge-primary"><?php echo e($p->inv1); ?></span></td>
			<td> <span class="badge badge-primary"><?php echo e($p->inv2); ?></span></td>
			<td>
				<input type="text" id="pro_cant_<?php echo e($p->id); ?>" value="<?php echo e($p->cantidad); ?>" class="form-control form-control-sm cantidad-mask text-right"  onchange="guarda_info_cotizacion(<?php echo e($p->id); ?>)" style="width: 50px;">
			</td>
			
			<?php if($p->estatus== 1): ?>
			<td>
				<input type="text" id="pro_cant_<?php echo e($p->id); ?>" value="<?php echo e($p->cantidad); ?>" class="form-control form-control-sm cantidad-mask text-right"  onchange="guarda_info_cotizacion(<?php echo e($p->id); ?>)" style="width: 50px;">
			</td>
			<td><input type="text" id="pro_cant_<?php echo e($p->id); ?>" value="<?php echo e($p->cantidad); ?>" class="form-control form-control-sm cantidad-mask text-right"  onchange="guarda_info_cotizacion(<?php echo e($p->id); ?>)" style="width: 50px;"></td>
			<?php endif; ?> 
			<td class="text-right"> <label > $<?php echo e(number_format($suma_pv * $p->cantidad,2)); ?></label></td>
			<td style="border-left: 3px solid white;"><input type="text" id="mod_pre_unit_<?php echo e($p->id); ?>" value="<?php echo e($p->mod_precio_unit); ?>" class="form-control form-control-sm p_unit-mask text-right" onchange="guarda_info_cotizacion(<?php echo e($p->id); ?>)" style="width: 80px;"></td>
			<td><input type="text" id="mod_cant_<?php echo e($p->id); ?>" class="form-control form-control-sm cantidad-mask text-right" value="<?php echo e($p->mod_cantidad); ?>" onchange="guarda_info_cotizacion(<?php echo e($p->id); ?>)" style="width: 50px;"></td>
			<td class="text-right"><label>$<?php echo e(number_format($p->mod_precio_unit*$p->mod_cantidad,2)); ?></label></td>
			<td  style="border-left: 3px solid white;"> <input type="text" id="inst_pre_unit_<?php echo e($p->id); ?>" class="form-control form-control-sm p_unit-mask" value="<?php echo e($p->inst_precio_unit); ?>" onchange="guarda_info_cotizacion(<?php echo e($p->id); ?>)" style="width: 80px;"></td>
			<td><input type="text" id="inst_cant_<?php echo e($p->id); ?>" class="form-control form-control-sm cantidad-mask text-right" value="<?php echo e($p->inst_cantidad); ?>" onchange="guarda_info_cotizacion(<?php echo e($p->id); ?>)" style="width: 50px;"></td>
			<td class="text-right"><label>$<?php echo e(number_format($p->inst_precio_unit*$p->inst_cantidad,2)); ?></label></td>
		</tr>
		<?php ($subtotal_dl   += $suma_pv * $p->cantidad); ?>
		<?php ($subtotal_dl_1 += $p->mod_precio_unit * $p->mod_cantidad); ?>
		<?php ($subtotal_ps   += $p->inst_precio_unit * $p->inst_cantidad); ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<tr>
			<td colspan="<?php echo e($estatus == 1 ? 16:14); ?>" class="color" rowspan="6"></td>
			<td colspan="2" style="background:#67A957; color: white; ">Subtotal:</td>
			<td colspan="2" class="text-right">$<?php echo e(number_format($subtotal_dl,2)); ?></td>
			<td colspan="3" class="text-right" style="border-left: 3px solid white;">$<?php echo e(number_format($subtotal_dl_1,2)); ?></td>
			<td></td>
			<td colspan="3" class="text-right">$<?php echo e(number_format($subtotal_ps,2)); ?></td>
		</tr>
		<tr>
			<td style="background:#67A957; color: white;" colspan="2">Descuento:</td>
			<td class="text-right" ><input type="text" id="descuento_usa" class="form-control form-control-sm desc-mask" style="width: 55px;" value="<?php echo e($cotizacion->descuento_usa); ?>" onchange="guardar_descuentos()"></td>
			<td class="text-right">
				<span style="color: red;">-$<?php echo e(number_format(($subtotal_dl * $cotizacion->descuento_usa)/100,2)); ?></span><br>
				<?php ($desc_usa = $subtotal_dl - ($subtotal_dl * $cotizacion->descuento_usa)/100); ?>
				$<?php echo e(number_format($desc_usa,2)); ?>

			</td>
			
			<td  colspan="2" style="border-left: 3px solid white;" ><input type="text" id="descuento_mod" class="form-control form-control-sm desc-mask pull-right" style="width: 55px;" value="<?php echo e($cotizacion->descuento_mod); ?>" onchange="guardar_descuentos()"></td>
			<td class="text-right"  >
				<span style="color: red;">-$<?php echo e(number_format(($subtotal_dl_1 * $cotizacion->descuento_mod)/100,2)); ?></span><br>
				<?php ($desc_mod = $subtotal_dl_1 - ($subtotal_dl_1 * $cotizacion->descuento_mod)/100); ?>
				$<?php echo e(number_format($desc_mod,2)); ?>

			</td>
			<td colspan="2"  ><input type="text" id="descuento_mx" class="form-control form-control-sm desc-mask pull-right" value="<?php echo e($cotizacion->descuento_mx); ?>" style="width: 55px;" onchange="guardar_descuentos()"></td>
			<td class="text-right" >
				<span style="color: red;">-$<?php echo e(number_format(($subtotal_ps * $cotizacion->descuento_mx)/100,2)); ?></span><br>
				<?php ($desc_mx = $subtotal_ps - ($subtotal_ps * $cotizacion->descuento_mx)/100); ?>
				$<?php echo e(number_format($desc_mx,2)); ?>

			</td>
		</tr>
		<?php ($fletes = $cotizacion->flete); ?>
		<tr>
			<td class="text-left white" style="background:#67A957;" colspan="2">Flete:</td>
			<td style=" border-left: 3px solid white; text-align: right;"  colspan="2">
				<input type="text" id="flete" class="form-control form-control-sm p_unit-mask text-right" style="width: 100px; float: right;" value="<?php echo e(number_format($cotizacion->flete,2)); ?>" onchange="guardar_descuentos()">
			</td>
			<td style=" border-left: 3px solid white;" class="text-right  white" colspan="6"></td>
		</tr>
		<tr>
			<td style="background:#67A957; color: white; " colspan="2">IVA:</td>
			<td >
				<select class="form-control form-control-sm" id="iva_usa" style="width: 55px;" onchange="guardar_descuentos()">
					<option value="0" <?php echo e($cotizacion->iva_usa==0?'selected':''); ?>>0</option>
					<option value="8" <?php echo e($cotizacion->iva_usa==8?'selected':''); ?>>8</option>
					<option value="16" <?php echo e($cotizacion->iva_usa==16?'selected':''); ?>  >16</option>
				</select>
			</td>
			<?php ($iva_desc = (($desc_usa + $fletes) * $cotizacion->iva_usa)/100); ?>
			<td class="text-right">
				<span >+$<?php echo e(number_format($iva_desc,2)); ?></span>
			</td>
			<td  colspan="2" style="border-left: 3px solid white; border-left: 3px solid white;">
				<select class="form-control form-control-sm pull-right" id="iva_mod" style="width: 55px;" onchange="guardar_descuentos()">
					<option value="0" <?php echo e($cotizacion->iva_mod==0?'selected':''); ?>>0</option>
					<option value="8" <?php echo e($cotizacion->iva_mod==8?'selected':''); ?>>8</option>
					<option value="16" <?php echo e($cotizacion->iva_mod==16?'selected':''); ?>  >16</option>
				</select>
			</td>
			<td class="text-right">
				<span >+$<?php echo e(number_format(($desc_mod * $cotizacion->iva_mod)/100,2)); ?></span>
			</td>
			<td colspan="2"  style="border-left: 3px solid white;">
				<select class="form-control form-control-sm pull-right" id="iva_mx" style="width: 55px;" onchange="guardar_descuentos()">
					<option value="0" <?php echo e($cotizacion->iva_mx==0?'selected':''); ?>>0</option>
					<option value="8" <?php echo e($cotizacion->iva_mx==8?'selected':''); ?>>8</option>
					<option value="16"<?php echo e($cotizacion->iva_mx==16?'selected':''); ?>>16</option>
				</select>
			</td>
			<td class="text-right" colspan="2">
				<span> +$<?php echo e(number_format(($desc_mx * $cotizacion->iva_mx)/100,2)); ?></span>
			</td>
		</tr>
		<tr>
			<td class="text-left white" style="background:#67A957;" colspan="2">Total:</td>
			<td style="background:#67A957;" class="white text-right" colspan="2" > $<?php echo e(number_format($desc_usa + $iva_desc,2)); ?></td>
			<td style="background:#67A957; border-left: 3px solid white;"  class="white text-right" colspan="3"> $<?php echo e(number_format($desc_mod + (($desc_mod * $cotizacion->iva_mod)/100),2)); ?></td>
			<td  style="background:#67A957;border-left: 3px solid white;" class="text-right  white" colspan="3"> $<?php echo e(number_format($desc_mx + (($desc_mx * $cotizacion->iva_mx)/100),2)); ?></td>
		</tr>
		<tr style="background:#5C8293; color: white;" class="text-right">
			<td colspan="4"  >Gran Total:</td>
			<td colspan="3">USD: $<?php echo e(number_format($desc_usa + $iva_desc + $desc_mod + (($desc_mod * $cotizacion->iva_mod)/100) + $cotizacion->flete ,2)); ?></td>
			<td colspan="3" style="border-left: 3px solid white;" >+MXN: $<?php echo e(number_format($desc_mx + (($desc_mx * $cotizacion->iva_mx)/100),2)); ?></td>
		</tr>
	</table><?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/cotizador/table.blade.php ENDPATH**/ ?>