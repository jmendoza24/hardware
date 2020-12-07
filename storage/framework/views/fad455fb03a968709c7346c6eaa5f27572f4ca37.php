<table class="table table-striped  table-bordered file-export" id="tipoClientes-table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Tipo Cliente</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $tipoClientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipoCliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo $tipoCliente->id; ?></td>
            <td><?php echo $tipoCliente->tipo_cliente; ?></td>
            <td>
                <?php echo Form::open(['route' => ['tipoClientes.destroy', $tipoCliente->id], 'method' => 'delete']); ?>

                <div class='btn-group'>
                    <span class='btn btn-outline-success btn-round' onclick="ver_catalogo(13,<?php echo e($tipoCliente->id); ?>,2,'tipo_clientes')" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-edit"></i></span>
                    <span class='btn btn-outline-danger btn-round' onclick="elimina_catalogo(13,<?php echo e($tipoCliente->id); ?>,'tabla_catalogos')" ><i class="fa fa-trash"></i></span>
                </div>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/tipo_clientes/table.blade.php ENDPATH**/ ?>