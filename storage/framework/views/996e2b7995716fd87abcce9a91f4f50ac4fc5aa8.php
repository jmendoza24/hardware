<table class="table table-striped  table-bordered zero-configuration">
    <thead>
        <tr class="gris_tabla">
            <th>Nombre</th>
            <th>Teléfono 1</th>
            <th>Teléfono 2</th>
            <th>Correo</th>
            <th>Comentarios</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
   <?php $__currentLoopData = $fab_contactos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contacto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($contacto->contacto); ?></td>
            <td><?php echo e($contacto->telefono); ?></td>
            <td><?php echo e($contacto->telefono_2); ?></td>
            <td><?php echo e($contacto->correo); ?></td>
            <td><?php echo e($contacto->comentarios); ?></td>
            <td>
                <div class='btn-group'>
                    <span data-toggle="modal" data-backdrop="false" data-target="#primary" onclick="agrega_contacto(<?php echo e($contacto->id_fabricante); ?>,<?php echo e($contacto->id_contacto); ?>)" class='btn btn-float btn_azul btn-outline-success btn-round' ><i class="fa fa-edit"></i></span>
                    <a onclick="delete_contacto(<?php echo e($contacto->id_fabricante); ?>,<?php echo e($contacto->id_contacto); ?>)" class='btn btn-float btn-outline-danger btn_rojo btn-round'><i class="fa fa-trash"></i></a>
                </div>
            </td>
        </tr>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/fabricantes/contacto.blade.php ENDPATH**/ ?>