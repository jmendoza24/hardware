<?php $__env->startSection('titulo'); ?> <h4 >Pedidos Fabricantes</h4> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    
    <div class="col-md-12">

      <table class="table table-striped responsive  table-bordered scroll-vertical padding-table" id="tblOcFabs-table2">
        <thead class="gris_tabla">
            <tr >
                <th>Pedido</th>
                <th>Fabricante</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Estatus</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedidos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td class="text-center"><span class="badge badge-primary" onclick="ver_pedido(<?php echo e($pedidos->id); ?>)" data-toggle="modal" data-backdrop="false" data-target="#primary" style="cursor: pointer; font-size: 12px;"><?php echo e($pedidos->id); ?></span></td>
            <td><?php echo e($pedidos->fabricante); ?></td>
            <td class="text-center"><?php echo e($pedidos->cantidad); ?></td>
            <td style="text-align: right">$<?php echo e($pedidos->total); ?></td>
            <td class="text-center"><?php if($pedidos->estatus==1): ?> Activo <?php elseif($pedidos->estatus==2): ?> Pendiente <?php elseif($pedidos->estatus==3): ?> Finalizado <?php elseif($pedidos->estatus==4): ?> Cancelado  <?php endif; ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>

    </table>
   
    </div>

<?php $__env->stopSection(); ?>







<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/tbl_oc_fabs/listado_pedidos.blade.php ENDPATH**/ ?>