<style type="text/css">
    #tabla-asi{padding: 2px;}
</style>
<table class="table table-striped  table-bordered " id="tabla-asi">
    <thead >
        <tr class="gris_tabla">
            <th>Contacto</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Puesto</th>
            <th>Activo</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $participantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><span class="btn_azul" onclick="ver_catalogo(15,<?php echo e($p->id); ?>,2,<?php echo e($clientes->id_cliente); ?>)" data-toggle="modal" data-backdrop="false" data-target="#primary" style="cursor: pointer;"><b><?php echo e($p->contacto); ?></b></span></td>
            <td><?php echo e($p->correo); ?></td>
            <td><?php echo e($p->telefono); ?></td>
            <td><?php echo e($p->puesto); ?></td>
            <td><?php echo e($p->activo==1?'Activo':'Inactivo'); ?></td>
            <td><button class="btn  btn_rojo btn-sm" type="button" onclick="elimina_catalogo(15,<?php echo e($p->id); ?>,'tabla_catalogos',<?php echo e($p->id_cliente); ?>)"><i class="fa fa-trash"></i></button></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table><?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/clientes/asignacion.blade.php ENDPATH**/ ?>