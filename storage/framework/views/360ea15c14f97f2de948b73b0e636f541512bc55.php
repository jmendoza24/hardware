<?php ($total = 0); ?>
<table class="table table-bordered padding-table" id="tblOcFabs-table">
        <thead class="gris_tabla ">
            <tr>
            <th>Fab</th>
            <th>Proyecto</th>
            <th>OCC</th>
            <th>Producto</th>
            <th>Handing</th>
            <th>Finish</th>
            <th>Style</th>
            <th>Pedido</th>
            <th>LP</th> 
            <th>Total</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $tblOcFabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tblOcFab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($tblOcFab->abrev); ?></td>
                <td><?php echo e($tblOcFab->nombre); ?></td>
                <td class="text-center"><?php echo e($tblOcFab->id_occ); ?></td>
                <td><?php echo e($tblOcFab->id_fab); ?></td>
                <td><?php echo e($tblOcFab->handing); ?></td>
                <td><?php echo e($tblOcFab->finish); ?></td>
                <td><?php echo e($tblOcFab->style); ?></td>
                <td class="text-center"><?php echo e($tblOcFab->cantidad); ?></td>
                <td style="text-align: right">$<?php echo e(number_format($tblOcFab->lp,2)); ?></td>
                <td style="text-align: right">$<?php echo e(number_format($tblOcFab->lp * $tblOcFab->cantidad,2)); ?></td>
            </tr>
            <?php ($total += $tblOcFab->cantidad * $tblOcFab->lp); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>

    </table>
</div>
<div class="col-md-12">
    <h4 class="<?php echo e($total > 10000 ? 'red':'blue'); ?>"> Total: $ <?php echo e(number_format($total,2)); ?></h4>
</div><?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/tbl_oc_fabs/vista_pedido.blade.php ENDPATH**/ ?>