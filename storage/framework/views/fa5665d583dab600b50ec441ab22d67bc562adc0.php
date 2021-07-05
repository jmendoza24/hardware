<?php ($total = 0); ?>
<div class="row" id="agrega_producto" style="display:none;">
    <div class="col-md-5">
        <label>Producto:</label>
        <select class="form-control select2" style="width:100%;">
            <option value="0">Agrega producto...</option>
        </select>
    </div>
    <div class="col-md-2">
        <label>Cantidad:</label>
        <input type="text" name="cantidad" class="form-control cantidad-mask" placeholder="LP">
    </div>
    <div class="col-md-2">
        <label>LP:</label>
        <input type="text" name="lp" class="form-control mask-dec" placeholder="LP">
    </div>
    <div class="col-md-2" style="margin-top: 25px;">
        <span class="btn btn-outline-primary " >Agregar</span>
    </div>
    
</div>
<hr>
<div class="col-md-12" style="overflow-x: scroll; max-height: 600px;">
<input type="hidden" id="id_fabricante" value="<?php echo e($id_fabricante); ?>">

<table class="table table-bordered padding-table" id="tblOcFabs-table">
        <thead class="gris_tabla ">
            <tr>
            <th>Fab</th>
            <th>Proyecto</th>
            <th>Producto</th>
            <th>Handing</th>
            <th>Finish</th>
            <th>Style</th>
            <th>OCF</th>
            <th>Pedido</th>
            <th>Inv 1</th>
            <th>Inv 2</th>
            <th>LP</th> 
            <th>Total</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $tblOcFabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tblOcFab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($tblOcFab->abrev); ?></td>
                <td><?php echo e($tblOcFab->nombre); ?></td>
                <td><?php echo e($tblOcFab->id_fab); ?></td>
                <td><?php echo e($tblOcFab->handing); ?></td>
                <td><?php echo e($tblOcFab->finish); ?></td>
                <td><?php echo e($tblOcFab->style); ?></td>
                <td class="text-center"><?php echo e(number_format($tblOcFab->cantidad,0)); ?></td>
                <td><input type="text" id="cpedido<?php echo e($tblOcFab->id); ?>_<?php echo e($tblOcFab->tipo); ?>" onchange="guarda_pedido(<?php echo e($tblOcFab->tipo); ?>,<?php echo e($tblOcFab->id); ?>,<?php echo e($tblOcFab->lp); ?>)"  class="form-control form-control-sm cantidad-mask" value="<?php echo e($tblOcFab->cant_ac); ?>"></td>
                <td><?php echo e($tblOcFab->inv1); ?></td>
                <td><?php echo e($tblOcFab->inv2); ?></td>
                <td style="text-align: right">$<?php echo e(number_format($tblOcFab->lp,2)); ?></td>
                <td style="text-align: right">$<?php echo e(number_format($tblOcFab->lp * $tblOcFab->cant_ac,2)); ?></td>
            </tr>
            <?php ($total += $tblOcFab->cant_ac * $tblOcFab->lp); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>

    </table>
</div>
<div class="col-md-12">
    <h4 class="<?php echo e($total > 10000 ? 'red':'blue'); ?>"> Total: $ <?php echo e(number_format($total,2)); ?></h4>
</div><?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/tbl_oc_fabs/pedidos.blade.php ENDPATH**/ ?>