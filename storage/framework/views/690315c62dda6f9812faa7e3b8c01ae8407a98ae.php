<table class="table" id="tblFotosProductos-table">
        <thead>
            <tr>
                <th>Foto</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $tblFotosProductos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tblFotosProductos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td><?php echo e($tblFotosProductos->foto); ?></td>
                <td style="text-align: right">
                    <?php echo Form::open(['route' => ['tblFotosProductos.destroy', $tblFotosProductos->id], 'method' => 'delete']); ?>

                    <div class='btn-group'>
                        <a href="<?php echo e(route('tblFotosProductos.show', [$tblFotosProductos->id])); ?>" class='btn btn-primary btn-xs'><i class="fa fa-eye"></i></a>
                        <a href="#" onclick="borra_foto(<?php echo e($tblFotosProductos->id); ?>)" class='btn btn-danger btn-xs'><i class="fa fa-trash"></i></a>

                    </div>
                    <?php echo Form::close(); ?>    
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table><?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/tbl_fotos_productos/table.blade.php ENDPATH**/ ?>