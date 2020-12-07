<table class="table table-bordered table-striped zero-configuration" id="proyectos-table">
    <thead>
        <tr class="gris_tabla">
            <th>Proyecto</th>
            <th>Nombre Corto</th>
            <th>Dirección</th>
            <th>Tipo de Proyecto</th>
            <th>Comentarios</th>
            <th>Estatus</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $proyectos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proyectos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="">
            <td><?php echo $proyectos->nombre; ?></td>
            <td><?php echo $proyectos->nombre_corto; ?></td>
            <td><?php echo $proyectos->direccion; ?></td>
            <td></td>
            <td><textarea style="width: 400px; height: 60px;" class="form-control" id="comentario_<?php echo e($proyectos->id); ?>" onchange="guarda_comentarios(<?php echo e($proyectos->id); ?>)" ><?php echo $proyectos->comentarios; ?></textarea> </td>
            <td> <?php echo ($proyectos->estatus==1)?'Activo':'No activo'; ?> </td>
            <td>
                <?php echo Form::open(['route' => ['proyectos.destroy', $proyectos->id], 'method' => 'delete']); ?>

                <div class='btn-group'>
                    <a href="<?php echo route('proyectos.edit', [$proyectos->id]); ?>" class='btn btn-float btn-outline-success btn_azul btn-round'><i class="fa fa-edit"></i></a>
                    <?php echo Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn_rojo btn-round', 'onclick' => "return confirm('Are you sure?')"]); ?>

                </div>
                <?php echo Form::close(); ?>

            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/proyectos/table.blade.php ENDPATH**/ ?>