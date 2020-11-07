    

<?php $__env->startSection('titulo'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-md-12">    
    <h1 class="pull-right">
    </h1>
    </div>OC Fabricantes  Desgloce
    <br><br><br>
    <div class="col-md-12" style="overflow-x: scroll;">
            
        <table class="table table-striped responsive  table-bordered scroll-vertical" id="tblOcFabs-table2">
        <thead>
            <tr style="background: #5C8293; color: white;">
            <th>Fabricante</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Sub Total</th>
            <th>Total</th>
            <th></th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $tblOcFabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tblOcFab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td><?php echo e($tblOcFab->fabricante); ?></td>
            <td><?php echo e($tblOcFab->id_fab); ?></td>
            <td><?php echo e($tblOcFab->cant); ?></td>
            <td style="text-align: right">$<?php echo e(number_format($tblOcFab->subtotal,2)); ?></td>
            <td style="text-align: right">$<?php echo e(number_format($tblOcFab->total,2)); ?></td>
            <td>


                <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox"   onchange="agrega_producto(<?php echo e($tblOcFab->idf); ?>)">
                  <span class="form-check-sign">
                    <span class="check"></span>
                  </span>
                </label>
              </div>
                </td>
                
                </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>

         <tr>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: right">Total:</td>
            <td></td>
            <td></td>
            </tr>
    </table>
    </div>
<?php $__env->stopSection(); ?>







<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/hardware/resources/views/tbl_oc_fabs/show.blade.php ENDPATH**/ ?>