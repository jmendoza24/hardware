<table class="table table-bordered table-striped zero-configuration" id="proyectos-table">
    <thead>
        <tr class="gris_tabla">
            <th></th>
            <th>Proyecto</th>
            <th>Nombre Corto</th>
            <th>Dirección</th>
            <th>Tipo de Proyecto</th>
            <th>Comentarios</th>
            <th>Estatus</th>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $proyectos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proyectos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="">
            <td>
                <?php echo Form::open(['route' => ['proyectos.destroy', $proyectos->id], 'method' => 'delete']); ?>

                <div class="btn-group">
                    <button type="button" class="btn btn-icon btn-pure dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
                    <div class="dropdown-menu">
                        <a href="<?php echo route('proyectos.edit', [$proyectos->id]); ?>" class='btn btn-sm btn-success btn_azul ml-1'><i class="fa fa-edit"></i></a>
                        <?php echo Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger btn_rojo', 'onclick' => "return confirm('Estas seguro deseas eliminar este registro?')"]); ?>

                    </div>
                </div>
                <?php echo Form::close(); ?>            
            </td>
            <td><?php echo $proyectos->nombre; ?></td>
            <td><?php echo $proyectos->nombre_corto; ?></td>
            <td><?php echo $proyectos->direccion; ?></td>
            <td></td>
            <td><textarea style="width: 400px; height: 60px;" class="form-control" id="comentario_<?php echo e($proyectos->id); ?>" onchange="guarda_comentarios(<?php echo e($proyectos->id); ?>)" ><?php echo $proyectos->comentarios; ?></textarea> </td>
            <td> <?php echo ($proyectos->estatus==1)?'Activo':'No activo'; ?> </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/proyectos/table.blade.php ENDPATH**/ ?>