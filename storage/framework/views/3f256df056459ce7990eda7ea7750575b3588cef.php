
<table class="table table-striped table-bordered cotizaciones responsive" style="font-size: 14px;" id="tablac">
    <thead>
        <tr style="background: #5C8293; color: white;">
            <th>Cotización</th>
            <th>Proyecto</th>
            <th>Cliente</th>
            <th>Teléfono</th>
            <th>Total USD</th>
            <th>Total MXN</th>
            <th></th>
            <!--<th>Correo</th>--->
            <td></td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $cotizaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <div class="btn-group mr-1 mb-1">
                        <button type="button" class="btn btn-outline-primary dropdown-toggle btn-sm" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><b style="font-size: 14px;"><?php if($c->id_hijo != ''): ?> <?php echo e($c->id_hijo . '.'.$c->ver); ?> <?php else: ?> <?php echo e($c->id .'.'); ?> <?php endif; ?></b></button>
                        <div class="dropdown-menu">
                          <!--<a class="dropdown-item" href="#" onclick="ver_catalogo(16,<?php echo e($c->id); ?>)" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-pencil-square-o primary" aria-hidden="true"></i> Detalle</a>-->
                          <a class="dropdown-item" href="<?php echo e(route('cotizador.revive',['id_cotizacion'=>$c->id])); ?>"><i class="fa fa-file-text-o warning" aria-hidden="true"></i> Modificar</a>
                          <a class="dropdown-item" href="#" onclick="duplica_cotizacion(<?php echo e($c->id_hijo); ?>)" ><i class="fa fa-plus" aria-hidden="true"></i> Duplicar</a>
                          <a class="dropdown-item" href="#" onclick="baja_cotiza_pdf(<?php echo e($c->id); ?>,3)" ><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Producto + Modificación</a>
                          <a class="dropdown-item" href="#" onclick="baja_cotiza_pdf(<?php echo e($c->id); ?>,2)"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Instalación</a>
                          <a class="dropdown-item" href="#" onclick="cambia_oc(<?php echo e($c->id); ?>)" ><i class="fa fa-calendar-minus-o secondary" aria-hidden="true"></i> OCC</a>
                          <a class="dropdown-item" href="#" onclick="configura_abatimiento(<?php echo e($c->id); ?>)" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-thumb-tack primary" aria-hidden="true"></i> Abatimiento</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#" onclick="eliminar_cotizacion(<?php echo e($c->id); ?>)"><i class="fa fa-trash danger"></i> Eliminar</a>
                        </div>
                    </div>

                    <!--<span class="badge badge-primary" onclick="ver_catalogo(16,<?php echo e($c->id); ?>)" data-toggle="modal" data-backdrop="false" data-target="#primary" style="cursor: pointer; font-size: 12px;"><?php if($c->id_hijo != ''): ?> <?php echo e($c->id_hijo . '.'.$c->ver); ?> <?php else: ?> <?php echo e($c->id .'.'); ?> <?php endif; ?></span>-->
                </td>
                <td><?php echo e($c->nombre); ?></td>
                <td><?php echo e($c->contacto); ?></td>
                <td><?php echo e($c->telefono); ?></td>
                <td style="text-align: right">$<?php echo e(number_format($c->total_producto,2)); ?></td>
                <td style="text-align: right">$<?php echo e(number_format($c->total_mx,2)); ?></td>
                <td></td>
                <!--<td>
                    <div class="btn-group">
                        <a class="btn btn-sm  btn_gris" onclick="cambia_oc(<?php echo e($c->id); ?>)"><i class="fa fa-window-maximize"></i></a> &nbsp;

                        <a class="btn btn-sm btn-outline-primary btn_azul" href="<?php echo e(route('cotizador.revive',['id_cotizacion'=>$c->id])); ?>"><i class="fa fa-window-maximize"></i></a> &nbsp;
                        <span class="btn btn-sm btn-outline-danger btn_rojo" onclick="eliminar_cotizacion(<?php echo e($c->id); ?>)"><i class="fa fa-trash"></i></span>&nbsp;
                        <span class="btn btn-sm btn-outline-success" onclick="duplica_cotizacion(<?php echo e($c->id_hijo); ?>)"><i class="fa fa-plus"></i></span>
                    </div>
                </td>-->
                <!--<td><?php echo e($c->correo); ?></td>--->
                <td><?php if($c->id_hijo != ''): ?> <?php echo e($c->id_hijo); ?> <?php else: ?> <?php echo e($c->id); ?> <?php endif; ?></td>
                <td><?php echo e($c->ver); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
      
  </table>










<?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/cotizador/cotizaciones.blade.php ENDPATH**/ ?>