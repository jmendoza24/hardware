        <table class="table table-bordered file-export" id="tblOcFabs-table">

        <thead>
            <tr class="gris_tabla">
            <th>Fabricante</th>
            <th>Teléfono</th>
            <th>Contacto</th>
            <th>Cantidad</th>
            <th></th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $tblOcFabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tblOcFab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($tblOcFab->cant > 0): ?>
            <tr>
                <td><?php echo e($tblOcFab->fabricante); ?></td>
                <td><?php echo e($tblOcFab->telefono_dir); ?></td>
                <td><?php echo e($tblOcFab->contacto); ?></td>
                <td><?php echo e($tblOcFab->cant); ?></td>
                <td>
                    <div class="btn-group">
                        <a class="btn btn-sm btn-danger" href="<?php echo e(route('tblOcFabs.show', [$tblOcFab->id_fabricante])); ?>"><i class="fa fa-window-maximize"></i></a> &nbsp;
                    </div>
                </td>
            </tr>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

<?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/tbl_oc_fabs/table.blade.php ENDPATH**/ ?>