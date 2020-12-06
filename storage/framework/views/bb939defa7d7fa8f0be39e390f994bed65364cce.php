        <table class="table table-bordered file-export" id="tblOcFabs-table">

        <thead>
            <tr style="background: #5C8293; color: white;">
            <th>Fabricante</th>
            <th>Fabricante</th>
            <th>Teléfono</th>
            <th>Contacto</th>
            <th>Cantidad</th>
            <th></th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $tblOcFabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tblOcFab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td><?php echo e($tblOcFab->fabricante); ?></td>

            <td><?php echo e($tblOcFab->fabricante); ?></td>
            <td><?php echo e($tblOcFab->telefono_dir); ?></td>
            <td><?php echo e($tblOcFab->contacto); ?></td>
            <td><?php echo e($tblOcFab->can_total); ?></td>
            <td>
                    <div class="btn-group">
                        <a class="btn btn-sm btn-outline-primary btn_azul" href="<?php echo e(route('tblOcFabs.show', [$tblOcFab->idf])); ?>"><i class="fa fa-window-maximize"></i></a> &nbsp;
                    </div>
                </td>
                
                </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

<?php /**PATH /home/altermed/public_html/demo.cotiza.tech/laravel/resources/views/tbl_oc_fabs/table.blade.php ENDPATH**/ ?>