<table class="table table-striped table-bordered zero-configuration responsive" id="tablac">
    <thead>
        <tr style="background: #5C8293; color: white;">
            <th>Cotización</th>
            <th>Proyecto</th>
            <th>Cliente</th>
            <th>Teléfono</th>
            <th>Total USD</th>
            <th>Total MXN</th>
            <th></th>
            <th>Correo</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $cotizaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><span class="badge badge-primary" onclick="ver_catalogo(16,<?php echo e($c->id); ?>)" data-toggle="modal" data-backdrop="false" data-target="#primary" style="cursor: pointer; font-size: 12px;"><?php if($c->id_hijo != ''): ?> <?php echo e($c->id_hijo . '.'.$c->ver); ?> <?php else: ?> <?php echo e($c->id .'.'); ?> <?php endif; ?></span></td>
                <td><?php echo e($c->nombre); ?></td>
                <td><?php echo e($c->contacto); ?></td>
                <td><?php echo e($c->telefono); ?></td>
                <td style="text-align: right">$<?php echo e(number_format($c->total_usa,2)); ?></td>
                <td style="text-align: right">$<?php echo e(number_format($c->total_mx,2)); ?></td>
                <td>
                    <div class="btn-group">
                        <a class="btn btn-sm btn-outline-primary btn_azul" href="<?php echo e(route('cotizador.revive',['id_cotizacion'=>$c->id])); ?>"><i class="fa fa-window-maximize"></i></a> &nbsp;
                        <span class="btn btn-sm btn-outline-danger btn_rojo" onclick="eliminar_cotizacion(<?php echo e($c->id); ?>)"><i class="fa fa-trash"></i></span>&nbsp;
                        <span class="btn btn-sm btn-outline-success" onclick="duplica_cotizacion(<?php echo e($c->id); ?>)"><i class="fa fa-plus"></i></span>
                    </div>
                </td>
                <td><?php echo e($c->correo); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
      
  </table><?php /**PATH /var/www/html/hardware/resources/views/cotizador/cotizaciones.blade.php ENDPATH**/ ?>