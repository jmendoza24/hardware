    

<?php $__env->startSection('titulo'); ?> <h4 >OC Fabricantes</h4> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
     <table>
            <div class="col-md-12">  

            <div class="col text-right" style="margin-top: 10px;">
                <span style="color: white" class=" btn btn-outline-primary btn_azul " onclick="finaliza_pedido()">Finalizar Pedido</span>
                <span style="color: white" class="btn btn-outline-primary btn_azul " onclick="regresar()">Regresar</span>

            </div>
            </div>
         <tr>
            <td colspan="4"></td>
            
            <td style="text-align: right"><h2 id="tot">Total:</h2></td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <div class="col-md-12" style="overflow-x: scroll;">
        <table class="table table-bordered file-export" id="tblOcFabs-table">

        <thead>
            <tr style="background: #5C8293; color: white;">
            <th>Fabricante</th>
            <th>Producto</th>
            <th>Handing</th>
            <th>Finish</th>
            <th>Style</th>
            <th>Cantidad</th>
            <th>Cant. Pedido</th>
            <th>Inv 1</th>
            <th>Inv 2</th>
            <th>LP</th>
            <th>Total</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $tblOcFabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tblOcFab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td><?php echo e($tblOcFab->fabricante); ?></td>
            <td><?php echo e($tblOcFab->id_fab); ?></td>
            <td><?php echo e($tblOcFab->handing); ?></td>
            <td><?php echo e($tblOcFab->finish); ?></td>
            <td><?php echo e($tblOcFab->style); ?></td>
            <td><?php echo e($tblOcFab->cant); ?></td>
            <td><input type="text" id="cpedido<?php echo e($tblOcFab->id_dc); ?>" onchange="agrega_producto_oc(<?php echo e($tblOcFab->idf); ?>,'<?php echo e($tblOcFab->id_fab); ?>','<?php echo e($tblOcFab->fabricante); ?>',<?php echo e($tblOcFab->cant); ?>,'<?php echo e($tblOcFab->lp); ?>','<?php echo e($tblOcFab->lp); ?>',<?php echo e($tblOcFab->id_dc); ?>)" name="cpedido<?php echo e($tblOcFab->id_dc); ?>" class="form-control"></td>
            <td><?php echo e($tblOcFab->inv1); ?></td>
            <td><?php echo e($tblOcFab->inv2); ?></td>
            <td style="text-align: right">$<?php echo e(number_format($tblOcFab->lp,2)); ?></td>
            <td style="text-align: right">$<?php echo e(number_format($tblOcFab->lp*$tblOcFab->cant,2)); ?></td>
            
                
                </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>

    </table>
   
    </div>
<?php $__env->stopSection(); ?>









<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/hardware/resources/views/tbl_oc_fabs/show.blade.php ENDPATH**/ ?>