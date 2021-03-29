
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
	<table class="table table-striped mr-1" style="font-size: 11px;" id="" border="0">
		<tr style="border-top: 3px solid white; background:white;">
			<td colspan="8">
				OC Cliente: <b><?php echo e($cotizacion->id_occ); ?></b>
			</td>
			<td colspan="7" class="text-center gris_tabla"><b>Producto USD:</b></td>
			<td colspan="3" style="border-left: 3px solid white;" class="text-center gris_tabla"><b>Modificación USD:</b></td>
			<td colspan="3" style="border-left: 3px solid white;" class="text-center gris_tabla"><b>Instalación MXN:</b></td>
		</tr>
		<tr style=" border:2px solid #D2D2D2; text-align: center; " class="gris_tabla">
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
			<td>Ctd</td> 
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
			<td><?php echo e($p->abrev); ?></td>
			<td>
				<?php echo e(str_replace('xxx', $p->finish, $p->id_fab)); ?>

			</td>
			<td><?php echo e($p->posicion); ?></td>
			<td><?php echo e($p->descripcion); ?></td>
			<td><?php echo e($p->bks); ?></td>
			<td><?php echo e($p->finish); ?></td>
			<td><?php echo e($p->sufijo); ?></td>
			<td><?php echo e($p->style_sel); ?></td>
			<td><?php echo e($p->handing); ?></td>
			<td><?php echo e($p->door_t); ?></td>
			<td class="text-right">$<?php echo e(number_format($p->lp + $p->sum_lp,2)); ?></td>
			<td class="text-right">$<?php echo e(number_format($p->phc + $p->sum_phc,2)); ?></td>
			<?php ($suma_pv = $p->pvc + $p->sum_pvc); ?>
			<td class="text-right">$<?php echo e(number_format($suma_pv,2)); ?></td>
			<td class="text-center"><?php echo e($p->cantidad); ?></td>
			<td class="text-center"> <label > $<?php echo e(number_format($suma_pv * $p->cantidad,2)); ?></label></td>
			<td style="border-left: 3px solid white;"><?php echo e(number_format($p->mod_precio_unit,2)); ?></td>
			<td><?php echo e($p->mod_cantidad); ?></td>
			<td class="text-center"><label>$<?php echo e(number_format($p->mod_precio_unit*$p->mod_cantidad,2)); ?></label></td>
			<td  style="border-left: 3px solid white;"><?php echo e(number_format($p->inst_precio_unit,2)); ?></td>
			<td><?php echo e($p->inst_cantidad); ?></td>
			<td class="text-right"><label>$<?php echo e(number_format($p->inst_precio_unit*$p->inst_cantidad,2)); ?></label></td>
		</tr>
		<?php ($subtotal_dl   += $suma_pv * $p->cantidad); ?>
		<?php ($subtotal_dl_1 += $p->mod_precio_unit * $p->mod_cantidad); ?>
		<?php ($subtotal_ps   += $p->inst_precio_unit * $p->inst_cantidad); ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<tr>
			<td colspan="11" class="color" rowspan="7"></td>
			<td colspan="2" class="gris_tabla">Subtotal:</td>
			<td colspan="2" class="text-right">$<?php echo e(number_format($subtotal_dl,2)); ?></td>
			<td colspan="3" class="text-right" style="border-left: 3px solid white;">$<?php echo e(number_format($subtotal_dl_1,2)); ?></td>
			<td></td>
			<td colspan="3" class="text-right">$<?php echo e(number_format($subtotal_ps,2)); ?></td>
		</tr>
		<tr>
			<td class="gris_tabla" colspan="2">Descuento:</td>
			<td class="text-right" ></td>
			<td class="text-right">
				<span style="color: red;">-$<?php echo e(number_format(($subtotal_dl * $cotizacion->descuento_usa)/100,2)); ?></span><br>
				<?php ($desc_usa = $subtotal_dl - ($subtotal_dl * $cotizacion->descuento_usa)/100); ?>
				$<?php echo e(number_format($desc_usa,2)); ?>

			</td>
			
			<td  colspan="2" style="border-left: 3px solid white;" ></td>
			<td class="text-right"  >
				<span style="color: red;">-$<?php echo e(number_format(($subtotal_dl_1 * $cotizacion->descuento_mod)/100,2)); ?></span><br>
				<?php ($desc_mod = $subtotal_dl_1 - ($subtotal_dl_1 * $cotizacion->descuento_mod)/100); ?>
				$<?php echo e(number_format($desc_mod,2)); ?>

			</td>
			<td colspan="2"  ></td>
			<td class="text-right" >
				<span style="color: red;">-$<?php echo e(number_format(($subtotal_ps * $cotizacion->descuento_mx)/100,2)); ?></span><br>
				<?php ($desc_mx = $subtotal_ps - ($subtotal_ps * $cotizacion->descuento_mx)/100); ?>
				$<?php echo e(number_format($desc_mx,2)); ?>

			</td>
		</tr>
		<?php ($fletes = $cotizacion->flete); ?>
		<tr>
			<td class="text-left gris_tabla"  colspan="2">Flete:</td>
			<td style=" border-left: 3px solid white; text-align: right;"  colspan="2">
				<?php echo e(number_format($cotizacion->flete,2)); ?>

			</td>
			<td style=" border-left: 3px solid white;" class="text-right  white" colspan="6"></td>
		</tr>
		<tr>
			<td class="gris_tabla" colspan="2">IVA:</td>
			<td ></td>
			<?php ($iva_desc = (($desc_usa + $fletes) * $cotizacion->iva_usa)/100); ?>
			<td class="text-right">
				<span >+$<?php echo e(number_format($iva_desc,2)); ?></span>
			</td>
			<td  colspan="2" style="border-left: 3px solid white; border-left: 3px solid white;"></td>
			<td class="text-right">
				<span >+$<?php echo e(number_format(($desc_mod * $cotizacion->iva_mod)/100,2)); ?></span>
			</td>
			<td colspan="2"  style="border-left: 3px solid white;"></td>
			<td class="text-right" colspan="2">
				<span> +$<?php echo e(number_format(($desc_mx * $cotizacion->iva_mx)/100,2)); ?></span>
			</td>
		</tr>
		<tr>
			<td class="text-left gris_tabla"  colspan="2">Total:</td>
			<td class="text-right" colspan="2" > $<?php echo e(number_format($desc_usa + $iva_desc,2)); ?></td>
			<td style="border-left: 3px solid white;"  class=" text-right" colspan="3"> $<?php echo e(number_format($desc_mod + (($desc_mod * $cotizacion->iva_mod)/100),2)); ?></td>
			<td  style="border-left: 3px solid white;" class="text-right  " colspan="3"> $<?php echo e(number_format($desc_mx + (($desc_mx * $cotizacion->iva_mx)/100),2)); ?></td>
		</tr>
		<tr  style="background:#5C8293; color: white;" class="text-right">
			<td colspan="4">Gran Total:</td>
			<td colspan="3">USD: $<?php echo e(number_format($desc_usa + $iva_desc + $desc_mod + (($desc_mod * $cotizacion->iva_mod)/100) + $cotizacion->flete ,2)); ?></td>
			<td colspan="3" style="border-left: 3px solid white;" >+MXN: $<?php echo e(number_format($desc_mx + (($desc_mx * $cotizacion->iva_mx)/100),2)); ?></td>
		</tr>
	</table><?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/cotizador/cotizacion_detalle.blade.php ENDPATH**/ ?>