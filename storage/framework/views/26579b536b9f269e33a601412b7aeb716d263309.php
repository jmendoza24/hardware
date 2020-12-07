<table class="table table-striped  table-bordered file-export" id="tipoClientes-table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Tipo Proyecto</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
     <?php $__currentLoopData = $tipoProyectos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipoProyecto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo $tipoProyecto->id; ?></td>
            <td><?php echo $tipoProyecto->tipo_proyecto; ?></td>
            <td>
                <div class='btn-group'>
                    <span class='btn btn-outline-success btn-round' onclick="ver_catalogo(14,<?php echo e($tipoProyecto->id); ?>,2,'tipo_clientes')" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-edit"></i></span>
                    <span class='btn btn-outline-danger btn-round' onclick="elimina_catalogo(14,<?php echo e($tipoProyecto->id); ?>,'tabla_catalogos')" ><i class="fa fa-trash"></i></span>
                </div>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/tipo_proyectos/table.blade.php ENDPATH**/ ?>