<table class="table table-striped  table-bordered file-export"> 
    <thead>
        <tr class="gris_tabla">
            
            <th>ID</th>
            <th>Empresa</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Puesto</th>
            <th>Activo</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clientes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($clientes->id_cliente); ?></td>
            <td><?php echo $clientes->empresa; ?></td>
            <td><?php echo $clientes->contacto; ?></td>
            <td><?php echo $clientes->telefono; ?></td>
            <td><?php echo $clientes->correo; ?></td>
            <td><?php echo $clientes->puesto; ?></td>
            <td><?php echo ($clientes->activo==1)?'SI':'NO'; ?></td>
        
            <td>
                <?php echo Form::open(['route' => ['clientes.destroy', $clientes->id_cliente], 'method' => 'delete']); ?>

                <div class='btn-group text-center'>
                    <!--<a href="<?php echo route('clientes.show', [$clientes->id_cliente]); ?>" class='btn btn-float btn-outline-secondary btn-round'><i class="fa fa-eye"></i></a>--->
                    <a href="<?php echo route('clientes.edit', [$clientes->id_cliente]); ?>" class='btn btn-float btn-outline-success btn_azul btn-round'><i class="fa fa-edit"></i></a>
                    <?php echo Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn_rojo btn-round', 'onclick' => "return confirm('Estas seguro deseas eliminar este cliente?')"]); ?>

                </div>
                <?php echo Form::close(); ?>

            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
 <?php /**PATH /var/www/html/hardware/resources/views/clientes/table.blade.php ENDPATH**/ ?>