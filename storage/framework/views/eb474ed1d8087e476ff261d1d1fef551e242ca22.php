<table class="table table-striped  table-bordered file-export">
    <thead>
        <tr class="gris_tabla">
            <th class="hide">Id</th>
            <th>Fabricante</th>
            <th>Contacto</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $fabricantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fabricantes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($fabricantes->id_fabricante); ?></td>
            <td><?php echo $fabricantes->abrev; ?></td>
            <td><?php echo $fabricantes->contacto; ?></td>
            <td><?php echo $fabricantes->correo; ?></td>
            <td><?php echo $fabricantes->telefono_dir; ?></td>
            <td>
                <?php echo Form::open(['route' => ['fabricantes.destroy', $fabricantes->id_fabricante], 'method' => 'delete']); ?>

                <div class='btn-group'>
                    <a href="<?php echo route('fabricantes.edit', [$fabricantes->id_fabricante]); ?>" class='btn btn-float btn-outline-success btn_azul btn-round'><i class="fa fa-edit"></i></a>
                    <?php echo Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn_rojo btn-outline-danger btn-round', 'onclick' => "return confirm('Estas seguro deseas eliminar este fabricante?')"]); ?>

                </div>
                <?php echo Form::close(); ?>

            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/fabricantes/table.blade.php ENDPATH**/ ?>