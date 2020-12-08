<?php 
$a[1] = "Enero"; 
$a[2] = "Febrero"; 
$a[3] = "Marzo"; 
$a[4] = "Abril"; 
$a[5] = "Mayo"; 
$a[6] = "Junio"; 
$a[7] = "Julio"; 
$a[8] = "Agosto";
$a[9] = "Septiembre";
$a[10] = "Octubre";
$a[11] = "Noviembre";
$a[12] = "Diciembre";
?>
<table   style="width: 100%; font-family: sans-serif; color:white; border-collapse: collapse;">
     <tr style="width: 100%;" >
        <td style="background-color: #000000; text-align: center; "><img src="<?php echo e(url('app-assets/images/logo_completo.jpg')); ?>" style="width: 150px;"></td>
        <td style="background-color: #5C8293; "><label style="font-family:sans-serif; font-size: 11px; ">Calzada San Pedro # 108<br>San Pedro Garza García, NL, México, 66220<br>+52 (81) 8378 0601 <br/> info@hardwarecollection.mx</label></td>
        <td style="background-color: #5C8293; font-size: 14px; text-align: right; "><?php echo e(date("d",strtotime(substr($cotizacion->created_at,0,10))) . ' de '. $a[date("m",strtotime(substr($cotizacion->created_at,0,10)))] . ' de '.date("Y",strtotime(substr($cotizacion->created_at,0,10)))); ?><br> <label style=""> cotizacionización #<?php echo e($cotizacion->id); ?></label><br>  <h4><?php echo e($tipo_doc); ?></h4></td>
     </tr>
     <tr style="background: #D2D2D2; color:#5C8293; font-size: 11px; padding-top: 3px;">
        <td>Proyecto: <?php echo e($cotizacion->proyecto); ?><br> Participante: <?php echo e($cotizacion->contacto); ?><br>Empresa: <?php echo e($cotizacion->empresa); ?></td>
        <td>Correo:  <?php echo e(str_replace(';', ' ',  $cotizacion->correo)); ?><br>Teléfono: <?php echo e($cotizacion->telefono); ?><br></td>
        <td style="text-align: right;">Cotización válida  hasta <br/> <?php echo e(date("d",strtotime($cotizacion->created_at)). ' de '); ?> <?php if(date("m",strtotime($cotizacion->created_at)) == 12): ?> <?php echo e($a[1]); ?> <?php else: ?> <?php echo e($a[date("m",strtotime($cotizacion->created_at))+1]); ?> <?php endif; ?>  <?php echo e(' de '); ?> <?php if(date("m",strtotime($cotizacion->created_at))==12): ?> <?php echo e(date("Y",strtotime($cotizacion->created_at)) +1); ?> <?php else: ?> <?php echo e(date("Y",strtotime($cotizacion->created_at))); ?> <?php endif; ?>
        </td> 
     </tr> 
</table>
<?php if($tipo==1): ?> 
  
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
  <table class="table table-striped" style="font-size: 11px; width: 100%;font-family: sans-serif;" id="" border="0">
    
    <tr style=" border:2px solid #67A957;  color: white; background:#67A957; text-align: center; ">
      <!--<td>Item</td>-->
      <td>LN</td>
      <td>Posición</td>
      <td>ID HC</td>
      <td>FSH</td>
      <td>D.T</td>
      <td>Descripción MKT</td>
      <td>Ctd</td> 
      <td>PU</td>
      <td>Subtotal</td> 
    </tr>
    <?php ($i=1); ?>
    <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <tr>
      <!--<td style="text-align: left; font-weight: bold;">
        <?php echo e($p->item_nom); ?>

      </td>-->
      <td style="text-align: center;"><?php echo e($i); ?></td>
      <td>
        <?php echo e($p->posicion); ?>

      </td>
      <td>
        <?php echo e(substr(str_replace('xxx', $p->finish, $p->id_fab),0,6)); ?>

      </td>
      <td style="text-align: center;">
       <?php echo e($p->finish); ?>

      </td>
      <td>
        <?php echo e($p->door_t); ?>

      </td>
      <td>
        <?php echo e($p->descripcion); ?>

      </td>
      <td style="text-align: center;">
        <?php echo e($p->cantidad); ?>

      </td>
      <?php ($suma_pv = $p->pvc + $p->sum_pvc); ?>
      <td class="text-right">$<?php echo e(number_format($suma_pv,2)); ?></td>
      <td class="text-right"> <label > $<?php echo e(number_format($suma_pv * $p->cantidad,2)); ?></label></td>

    </tr>
    <?php ($subtotal_dl   += $suma_pv * $p->cantidad); ?>   
    <?php ($subtotal_dl_1 += $p->mod_precio_unit * $p->mod_cantidad); ?>
    <?php ($subtotal_ps   += $p->inst_precio_unit * $p->inst_cantidad); ?>
    <?php ($i++); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td colspan="7" class="color" rowspan="6"></td>
      <td colspan="" style="background:#67A957; color: white; ">Subtotal:</td>
      <td colspan="" class="text-right">$<?php echo e(number_format($subtotal_dl,2)); ?></td>
    </tr>
    <tr>
      <td style="background:#67A957; color: white;" colspan="">Descuento:</td>
      <td class="text-right">
        <?php ($desc_usa = $subtotal_dl - ($subtotal_dl * $cotizacion->descuento_usa)/100); ?>
        $<?php echo e(number_format($desc_usa,2)); ?>

      </td>
      
      
     
    </tr>
    <tr>
      <td style="background:#67A957; color: white; " colspan="">IVA:</td>
      
      <td class="text-right">
        <span >+$<?php echo e(number_format(($desc_usa * $cotizacion->iva_usa)/100,2)); ?></span>
      </td>
      

    </tr>
    <tr>
      <td class="text-left white" style="background:#67A957;" colspan="">Total:</td>
      <td style="background:#67A957;" class="white text-right" colspan="" > $<?php echo e(number_format($desc_usa + (($desc_usa * $cotizacion->iva_usa)/100),2)); ?></td>
    </tr>
    <tr>
      <td class="text-left white" style="background:#67A957;" colspan="">Flete:</td>
      <td style=" border-left: 3px solid white; text-align: right;"  colspan="">
        <?php echo e(number_format($cotizacion->flete,2)); ?>

      </td>
    </tr>
    <tr style="background:#5C8293; color: white;" class="text-right">
      <td colspan=""  >Gran Total:</td>
      <td colspan="">USD: $<?php echo e(number_format($desc_usa + (($desc_usa * $cotizacion->iva_usa)/100)  + $cotizacion->flete ,2)); ?></td>
    </tr>
  </table>



  <?php elseif($tipo==4): ?>
   

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
  <table class="table table-striped" style="font-size: 11px; width: 100%;font-family: sans-serif;" id="" border="0">
    
    <tr style=" border:2px solid #67A957;  color: white; background:#67A957; text-align: center; ">
      <!--<td>Item</td>-->
      <td>LN</td>
      <td>Posición</td>
      <td>ID HC</td>
      <td>FSH</td>
      <td>D.T</td>
      <td>Descripción MKT</td>
      <td>Ctd</td> 
      <td>PU</td>
      <td>Subtotal</td> 
    </tr>
    <?php ($i=1); ?>
    <?php ($j=1); ?>
    <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <tr>
      <!--<td style="text-align: left; font-weight: bold;">
        <?php echo e($p->item_nom); ?>

      </td>-->
      <td style="text-align: center;"><?php echo e($i); ?></td>
      <td>
        <?php echo e($p->posicion); ?>

      </td>
      <td>
        <?php echo e(substr(str_replace('xxx', $p->finish, $p->id_fab),0,6)); ?>

      </td>
      
      
      <td style="text-align: center;">
       <?php echo e($p->finish); ?>

      </td>
      <td>
        <?php echo e($p->door_t); ?>

      </td>
      <td>
        <?php echo e($p->descripcion); ?>

      </td>
      <td>
        <?php echo e($p->cantidad); ?>

      </td>
      <?php ($suma_pv = $p->pvc + $p->sum_pvc); ?>
      <td class="text-right">$<?php echo e(number_format($suma_pv,2)); ?></td>
      <td class="text-right"> <label > $<?php echo e(number_format($suma_pv * $p->cantidad,2)); ?></label></td>

    </tr>
    <?php if($p->mod_cantidad>0): ?>
    <tr>
      <td style="text-align: center;"><?php echo e($i+$j); ?></td>
      <td></td>
      <td style="color: red">MOD<?php echo e(substr(str_replace('xxx', $p->finish, $p->id_fab),0,6)); ?></td>
       <td>
       <?php echo e($p->finish); ?>

      </td>
      <td>
        <?php echo e($p->door_t); ?>

      </td>
      <td></td>
      <td style=""><?php echo e($p->mod_cantidad); ?></td>
      <td><?php echo e($p->mod_precio_unit); ?></td>
      <td><?php echo e($p->mod_precio_unit * $p->mod_cantidad); ?></td>
     <?php ($i++); ?>
  
    </tr>
    <?php endif; ?>
    <?php ($subtotal_dl   += $suma_pv * $p->cantidad); ?>   
    <?php ($subtotal_dl_1 += $p->mod_precio_unit * $p->mod_cantidad); ?>
    <?php ($subtotal_ps   += $p->inst_precio_unit * $p->inst_cantidad); ?>
    <?php ($i++); ?>
  
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td colspan="7" class="color" rowspan="6"></td>
      <td colspan="" style="background:#67A957; color: white; ">Subtotal:</td>
      <td colspan="" class="text-right">$<?php echo e(number_format($subtotal_dl+$subtotal_dl_1,2)); ?> </td>
    </tr>
    <tr>
      <td style="background:#67A957; color: white;" colspan="">Descuento:</td>
      <td class="text-right">
        <?php ($desc_mod = $subtotal_dl_1 - ($subtotal_dl_1 * $cotizacion->descuento_mod)/100); ?>
  
        <?php ($desc_usa = $subtotal_dl - ($subtotal_dl * $cotizacion->descuento_usa)/100); ?>
        $<?php echo e(number_format($desc_usa + $desc_mod,2)); ?>


      </td>
      
      
     
    </tr>
    <tr>
      <td style="background:#67A957; color: white; " colspan="">IVA:</td>
      
      <td class="text-right">
        <span >+$<?php echo e(number_format(( ($desc_usa * $cotizacion->iva_usa)/100  ) +   (($desc_mod * $cotizacion->iva_mod/100))  ,2)); ?></span>
      </td>
      

    </tr>
    <tr>
      <td class="text-left white" style="background:#67A957;" colspan="">Total:</td>
      <td style="background:#67A957;" class="white text-right" colspan="" > $<?php echo e(number_format($desc_usa + (($desc_usa * $cotizacion->iva_usa)/100),2)); ?></td>
    </tr>
    <tr>
      <td class="text-left white" style="background:#67A957;" colspan="">Flete:</td>
      <td style=" border-left: 3px solid white; text-align: right;"  colspan="">
        <?php echo e(number_format($cotizacion->flete,2)); ?>

      </td>
    </tr>
    <tr style="background:#5C8293; color: white;" class="text-right">
      <td colspan="" >Gran Total:</td>
      <td colspan="">USD: $<?php echo e(number_format($desc_usa + (($desc_usa * $cotizacion->iva_usa)/100) + $desc_mod + (($desc_mod * $cotizacion->iva_mod)/100) + $cotizacion->flete ,2)); ?></td>
    </tr>
  </table>

  <?php elseif($tipo==2): ?>





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
<!---- small row-border   instalacion-->
  <table class="table table-striped" style="font-size: 11px; width: 100%;font-family: sans-serif;" id="" border="0">
    
    <tr style=" border:2px solid #67A957;  color: white; background:#67A957; text-align: center; ">
      <!--<td>Item</td>-->
      <td>LN</td>
      <td>Posición</td>
      <td>ID HC</td>
      <td>FSH</td>
      <td>D.T</td>
      <td>Descripción MKT</td>
      <td>Ctd</td> 
      <td>PU</td>
      <td>Subtotal</td> 
    </tr>
    <?php ($i=1); ?>
    <?php ($j=1); ?>
    <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <tr>
      <!--<td style="text-align: left; font-weight: bold;">
        <?php echo e($p->item_nom); ?>

      </td>-->
      <td style="text-align: center;"><?php echo e($i); ?></td>
      <td>
        <?php echo e($p->posicion); ?>

      </td>
      <td>
        <?php echo e(substr(str_replace('xxx', $p->finish, $p->id_fab),0,6)); ?>

      </td>
      
      
      <td style="text-align: center;">
       <?php echo e($p->finish); ?>

      </td>
      <td>
        <?php echo e($p->door_t); ?>

      </td>
      <td>
        <?php echo e($p->descripcion); ?>

      </td>
      <td>
        <?php echo e($p->cantidad); ?>

      </td>
      <?php ($suma_pv = $p->pvc + $p->sum_pvc); ?>
      <td class="text-right">$<?php echo e(number_format($suma_pv,2)); ?></td>
      <td class="text-right"> <label > $<?php echo e(number_format($suma_pv * $p->cantidad,2)); ?></label></td>

    </tr>
    <?php if($p->mod_cantidad>0): ?>
    <tr>
      <td style="text-align: center;"><?php echo e($i+$j); ?></td>
      <td></td>
      <td style="color: red">INST<?php echo e(substr(str_replace('xxx', $p->finish, $p->id_fab),0,6)); ?></td>
       <td>
       <?php echo e($p->finish); ?>

      </td>
      <td>
        <?php echo e($p->door_t); ?>

      </td>
      <td></td>
      <td style=""><?php echo e($p->mod_cantidad); ?></td>
      <td><?php echo e($p->mod_precio_unit); ?></td>
      <td><?php echo e($p->mod_precio_unit * $p->mod_cantidad); ?></td>
     <?php ($i++); ?>
  
    </tr>
    <?php endif; ?>
    <?php ($subtotal_dl   += $suma_pv * $p->cantidad); ?>   
    <?php ($subtotal_dl_1 += $p->mod_precio_unit * $p->mod_cantidad); ?>
    <?php ($subtotal_ps   += $p->inst_precio_unit * $p->inst_cantidad); ?>
    <?php ($i++); ?>
  
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td colspan="7" class="color" rowspan="6"></td>
      <td colspan="" style="background:#67A957; color: white; ">Subtotal:</td>
      <td colspan="" class="text-right">$<?php echo e(number_format($subtotal_dl+$subtotal_ps,2)); ?> </td>
    </tr>
    <tr>
      <td style="background:#67A957; color: white;" colspan="">Descuento:</td>
      <td class="text-right">
        <?php ($desc_mod = $subtotal_dl_1 - ($subtotal_dl_1 * $cotizacion->descuento_mod)/100); ?>
        <?php ($desc_usa = $subtotal_dl - ($subtotal_dl * $cotizacion->descuento_usa)/100); ?>
        <?php ($desc_mx = $subtotal_ps - ($subtotal_ps * $cotizacion->descuento_mx)/100); ?>
        $<?php echo e(number_format($desc_mx,2)); ?>

   

      </td>
      
      
     
    </tr>
    <tr>
      <td style="background:#67A957; color: white; " colspan="">IVA:</td>
      
      <td class="text-right" colspan="2">
        <span> +$<?php echo e(number_format(($desc_mx * $cotizacion->iva_mx)/100,2)); ?></span>
      </td>
      

    </tr>
    <tr>
      <td class="text-left white" style="background:#67A957;" colspan="">Total:</td>
      <td style="background:#67A957;" class="white text-right" colspan="" > $<?php echo e(number_format($desc_mx + (($desc_mx * $cotizacion->iva_mx)/100),2)); ?></td>
    </tr>
    <tr>
      <td class="text-left white" style="background:#67A957;" colspan="">Flete:</td>
      <td style=" border-left: 3px solid white; text-align: right;"  colspan="">
        <?php echo e(number_format($cotizacion->flete,2)); ?>

      </td>
    </tr>
    <tr style="background:#5C8293; color: white;" class="text-right">
      <td colspan="" >Gran Total:</td>
      <td colspan="">MX: $<?php echo e(number_format($desc_mx + (($desc_mx * $cotizacion->iva_mx)/100) + $desc_mod + (($desc_mod * $cotizacion->iva_mod)/100) + $cotizacion->flete ,2)); ?></td>
    </tr>
  </table>



  <?php else: ?>
  <?php endif; ?>
  <br><br>
<table   style="width: 100%; font-family: sans-serif; text-align: justify; font-size: 11px; color:#5C8293;">
   <tr style="" >
      <td valign="top"> <?php echo nl2br($data->condiciones); ?></td>
      <td valign="top" style="color: black;"><b> <?php echo nl2br($cotizacion->notas); ?></b></td>
      <td valign="top" style="display: none;"> <?php echo nl2br($data->cuentas); ?></td>
   </tr>
</table>

<?php /**PATH /var/www/html/hardware/resources/views/cotizador/pdf.blade.php ENDPATH**/ ?>