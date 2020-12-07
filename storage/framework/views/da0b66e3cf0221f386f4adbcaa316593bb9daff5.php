<style type="text/css">
    .table th, .table td {
     padding: 6px;
    }
</style>
<div class="row">
    <div class="col-md-12 form-inline">
            <label class="mr-1">Selecciona participantes:</label>
            <select class="form-control select2" id="cliente_proyecto" style="width: 200px;">
                <option class="">Seleccione...</option>
                <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($c->id_cliente); ?>"><?php echo e($c->nombre); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            &nbsp;
            <input type="text" name="cliente_comentarios" id="cliente_comentarios"  class="form-control mr-1" style="width: 300px" placeholder="Comentarios">
            <span class="btn btn-outline-primary" onclick="agrega_clientes(<?php echo e($proyectos_id); ?>)">Agregar</span>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12" >
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <td>Empresa</td>
                    <td>Nombre</td>
                    <td>Teléfono</td>
                    <td>Correo</td>
                    <td>Puesto</td>
                    <!--<td>Tipo cliente</td>
                    <td>Lista precio</td>-->
                    <td>Comentario</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $proyectos_clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($p->empresa); ?></td>
                    <td><?php echo e($p->contacto); ?></td>
                    <td><?php echo e($p->telefono); ?></td>
                    <td><?php echo e($p->correo); ?></td>
                    <td><?php echo e($p->puesto); ?></td>
                    <td><?php echo e($p->comentario); ?></td>
                    <td style="text-align: center;"><span class="btn btn-outline-danger btn-sm" onclick="eliminar_clientes(<?php echo e($p->id_proyecto); ?>,<?php echo e($p->id_cp); ?>)"><i class="fa fa-trash"></i></span></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>    
    </div>
</div>

<?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/proyectos/clientes.blade.php ENDPATH**/ ?>