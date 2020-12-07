    <div class="modal-footer" id="footer_primary">
        <select class="form-control" id="cpedido"  style="width: 30%" onchange="estatus_pedido2()">
            <option value="0">Selecciona un estatus</option>
            <option value="1">Activo</option>
            <option value="2">Pendiente</option>
            <option value="3">Finalizado</option>
            <option value="4">Cancelado</option>
            
            
        </select>
      </div>
      <table class="table table-striped responsive  table-bordered scroll-vertical" id="tblOcFabs-table2">
        <thead>
            <tr style="background: #5C8293; color: white;">
            <th>ID  Pedido</th>
            <th>Fabricante</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Total</th>
            </tr>
        </thead>
        <tbody>
        <?php ($sum=0); ?>
        <?php $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedidos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td><?php echo e($pedidos->id_pedido); ?></td>
            <td><?php echo e($pedidos->fabricante); ?></td>
            <td><?php echo e($pedidos->id_fab); ?></td>
            <td><?php echo e($pedidos->cant); ?></td>
            <td style="text-align: right">$<?php echo e($pedidos->total); ?></td>
            
            </tr>
            <?php ($sum=$pedidos->total+$sum); ?>
            <input type="hidden" name="" id="pedido" value="<?php echo e($pedidos->id_pedido); ?>">
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td colspan="4"></td>
            <td style="text-align: right">$<?php echo e($sum); ?></td>
            </tr>

        </tbody>

    </table>


   <?php /**PATH /var/www/html/hardware/resources/views/tbl_oc_fabs/vista_pedido.blade.php ENDPATH**/ ?>