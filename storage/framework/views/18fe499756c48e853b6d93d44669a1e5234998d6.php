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
	<table class="table table-striped table-bordered">
		<tr>
			<td>Proyecto: <?php echo e($cotizacion->nombre_corto); ?></td>
			<td>Cliente: <?php echo e($cotizacion->nombre_cliente); ?></td>
		</tr>
	</table>
	<table class="table table-striped small row-border" style="font-size: 13px;" id="" border="0">
		<tr style="border-top: 2px solid white; background:white;">
			<td colspan="5"><span class="badge badge-primary">Cotización <?php echo e($cotizacion->id); ?></span></td>
			<td colspan="3" style="background: #67A957;" class="text-center white"><b>Producto USD:</b></td>
			<td colspan="2"></td>
			<td colspan="3" style="background: #67A957; border-left: 3px solid white;" class="text-center white"><b>Modificación USD:</b></td>
			<td colspan="3" style="background: #67A957; border-left: 3px solid white;" class="text-center white"><b>Instalación MXN:</b></td>
		</tr>
		<tr style="border:2px solid #67A957; color: white; background:#67A957; text-align: center; ">
			<td>Item</td>
			<td>Posición</td>
			<td>BKS</td>
			<td>Door T.</td>
			<td>Fab</td>
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
			<td style="text-align: left; font-weight: bold;"><?php echo e($p->item_nom); ?></td>
			<td><?php echo e($p->posicion); ?></td>
			<td><?php echo e($p->bks); ?></td>
			<td><?php echo e($p->door_t); ?></td>
			<td><?php echo e(str_replace('xxx', $p->finish, $p->codigo_sistema)); ?></td>
			<td class="text-right">$<?php echo e(number_format($p->lp,2)); ?> <br/> $<?php echo e(number_format($p->sum_lp,2)); ?></td>
			<td class="text-right">$<?php echo e(number_format($p->phc,2)); ?> <br/>$<?php echo e(number_format($p->sum_phc,2)); ?></td>
			<td class="text-right">$<?php echo e(number_format($p->pvc,2)); ?> <br/> $<?php echo e(number_format($p->sum_pvc,2)); ?></td>
			<td><?php echo e(number_format($p->cantidad,0)); ?></td>
			<td class="text-right"> <label > $<?php echo e(number_format(($p->pvc  + $p->sum_pvc) * $p->cantidad,2)); ?></label></td>
			<td style="border-left: 3px solid white;"><?php echo e($p->mod_precio_unit); ?></td>
			<td><?php echo e($p->mod_cantidad); ?></td>
			<td class="text-right"><label>$<?php echo e(number_format($p->mod_precio_unit*$p->mod_cantidad,2)); ?></label></td>
			<td  style="border-left: 3px solid white;"><?php echo e($p->inst_precio_unit); ?></td>
			<td><?php echo e($p->inst_cantidad); ?></td>
			<td class="text-right"><label>$<?php echo e(number_format($p->inst_precio_unit*$p->inst_cantidad,2)); ?></label></td>
		</tr>
		<?php ($subtotal_dl   += ($p->pvc  + $p->sum_pvc)* $p->cantidad); ?>
		<?php ($subtotal_dl_1 += $p->mod_precio_unit * $p->mod_cantidad); ?>
		<?php ($subtotal_ps   += $p->inst_precio_unit * $p->inst_cantidad); ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<tr>
			<td colspan="6" class="color" rowspan="5"></td>
			<td colspan="2" style="background:#67A957; color: white; ">Subtotal:</td>
			<td colspan="2" class="text-right">$<?php echo e(number_format($subtotal_dl,2)); ?></td>
			<td colspan="3" class="text-right" style="border-left: 3px solid white;">$<?php echo e(number_format($subtotal_dl_1,2)); ?></td>
			<td></td>
			<td colspan="3" class="text-right" >$<?php echo e(number_format($subtotal_ps,2)); ?></td>
		</tr>
		<tr>
			<td style="background:#67A957; color: white;" colspan="2">Descuento:</td>
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
			<td colspan="2"  style="border-left: 3px solid white;"></td>
			<td class="text-right" >
				<span style="color: red;">-$<?php echo e(number_format(($subtotal_ps * $cotizacion->descuento_mx)/100,2)); ?></span><br>
				<?php ($desc_mx = $subtotal_ps - ($subtotal_ps * $cotizacion->descuento_mx)/100); ?>
				$<?php echo e(number_format($desc_mx,2)); ?>

			</td>
		</tr>
		<tr>
			<td style="background:#67A957; color: white; " colspan="2">IVA:</td>
			<td ></td>
			<td class="text-right"><span >+$<?php echo e(number_format(($desc_usa * $cotizacion->iva_usa)/100,2)); ?></span></td>
			<td  colspan="2" style="border-left: 3px solid white; border-left: 3px solid white;"></td>
			<td class="text-right">
				<span >+$<?php echo e(number_format(($desc_mod * $cotizacion->iva_mod)/100,2)); ?></span>
			</td>
			<td colspan="2"  style="border-left: 3px solid white;">
			</td>
			<td class="text-right" colspan="2">
				<span> +$<?php echo e(number_format(($desc_mx * $cotizacion->iva_mx)/100,2)); ?></span>
			</td>
		</tr>
		<tr>
			<td class="text-left white" style="background:#67A957;" colspan="2">Total:</td>
			<td style="background:#67A957;" class="white text-right" colspan="2" > $<?php echo e(number_format($desc_usa + (($desc_usa * $cotizacion->iva_usa)/100),2)); ?></td>
			<td style="background:#67A957; border-left: 3px solid white;"  class="white text-right" colspan="3"> $<?php echo e(number_format($desc_mod + (($desc_mod * $cotizacion->iva_mod)/100),2)); ?></td>
			<td  style="background:#67A957;border-left: 3px solid white;" class="text-right  white" colspan="3"> $<?php echo e(number_format($desc_mx + (($desc_mx * $cotizacion->iva_mx)/100),2)); ?></td>
		</tr>
		<tr style="background:#5C8293; color: white;" class="text-right">
			<td colspan="4"  >Gran Total:</td>
			<td colspan="3">USD: $<?php echo e(number_format($desc_usa + (($desc_usa * $cotizacion->iva_usa)/100) + $desc_mod + (($desc_mod * $cotizacion->iva_mod)/100),2)); ?></td>
			<td colspan="3" style="border-left: 3px solid white;" >+MXN: $<?php echo e(number_format($desc_mx + (($desc_mx * $cotizacion->iva_mx)/100),2)); ?></td>
		</tr>
	</table><?php /**PATH /home/altermed/public_html/demo.cotiza.tech/laravel/resources/views/cotizador/cotizacion_detalle.blade.php ENDPATH**/ ?>