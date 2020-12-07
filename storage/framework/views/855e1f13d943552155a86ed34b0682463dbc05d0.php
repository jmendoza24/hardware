    

<?php $__env->startSection('titulo'); ?> <h4 >Pedidos</h4> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    
    <div class="col-md-12" style="overflow-x: scroll;">

      <table class="table table-striped responsive  table-bordered scroll-vertical" id="tblOcFabs-table2">
        <thead>
            <tr style="background: #5C8293; color: white;">
            <th>ID  Pedido</th>
            <th>Fabricante</th>
            <th>Cantidad</th>
            <th>Total</th>
            <th>Estatus</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedidos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td><span class="badge badge-primary" onclick="ver_pedido(<?php echo e($pedidos->id_pedido); ?>)" data-toggle="modal" data-backdrop="false" data-target="#primary" style="cursor: pointer; font-size: 12px;"><?php echo e($pedidos->id_pedido); ?></span></td>
            <td><?php echo e($pedidos->fabricante); ?></td>
            <td><?php echo e($pedidos->cant); ?></td>
            <td style="text-align: right">$<?php echo e($pedidos->total); ?></td>
            <td><?php if($pedidos->estatus==1): ?> Activo <?php elseif($pedidos->estatus==2): ?> Pendiente <?php elseif($pedidos->estatus==3): ?> Finalizado <?php elseif($pedidos->estatus==4): ?> Cancelado  <?php endif; ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>

    </table>
   
    </div>

<?php $__env->stopSection(); ?>







<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/altermed/public_html/demo.cotiza.tech/no borrar/laravel/resources/views/tbl_oc_fabs/show2.blade.php ENDPATH**/ ?>