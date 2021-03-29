 
<?php $__env->startSection('titulo'); ?> OC Clientes <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<br> 
<style type="text/css">
    .td-2px{padding: 2px;}
</style>
<div class="col-md-12" style="overflow-x: scroll;">
    <table class="table table-striped table-bordered zero-configuration" style="font-size: 14px;" id="tablac">
        <thead>
            <tr style="background: #5C8293; color: white;">
                <th style="background: #43536cff; ">OCC</th>
                <th>Fecha</th>
                <th>Cotización</th>
                <th>Proyecto</th>
                <th>País</th>
                <th>Participante <br/> Comprador</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Total USD</th> 
                <th>Total MXN</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $cotizaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <div class="btn-group mr-1 mb-1">
                            <button type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" style="background: #43536cff !important; "><b style="font-size: 14px;"><?php echo e($c->id_occ); ?></b></button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="#" onclick="ver_catalogo(16,<?php echo e($c->id); ?>)" data-toggle="modal" data-backdrop="false" data-target="#primary" ><i class="fa fa-file-text-o warning" aria-hidden="true"></i> Consultar</a>
                              <a class="dropdown-item" href="#" onclick="configura_abatimiento(<?php echo e($c->id); ?>)" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-archive success" aria-hidden="true"></i> Asignación</a>
                              <a class="dropdown-item" href="#" onclick="baja_cotiza_pdf(<?php echo e($c->id); ?>,1)" ><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Producto</a>
                              <a class="dropdown-item" href="#" onclick="baja_cotiza_pdf(<?php echo e($c->id); ?>,3)" ><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Producto + Modificación</a>
                              <a class="dropdown-item" href="#" onclick="baja_cotiza_pdf(<?php echo e($c->id); ?>,2)"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Instalación</a>
                              <a class="dropdown-item" href="#" onclick="configura_abatimiento(<?php echo e($c->id); ?>)" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-thumb-tack primary" aria-hidden="true"></i> Abatimiento</a>
                              <a class="dropdown-item" href="<?php echo e(route('cotizador.regresar',['id_cotizacion'=>$c->id])); ?>"><i class="fa fa-retweet primary" aria-hidden="true"></i> A cotización</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#" onclick="eliminar_cotizacion(<?php echo e($c->id); ?>)"><i class="fa fa-trash danger"></i> Eliminar</a>
                            </div>
                        </div>
                    </td>
                    <td><label><?php echo e(substr($c->fecha,0,10)); ?></label></td>
                    <td><?php if($c->id_hijo != ''): ?> <?php echo e($c->id_hijo . '.'.$c->ver); ?> <?php else: ?> <?php echo e($c->id .'.'); ?> <?php endif; ?></td>
                    <td><?php echo e($c->nombre); ?></td>
                    <td><?php echo e($c->pais); ?></td>
                    <td><?php echo e($c->contacto); ?></td>
                    <td><?php echo e($c->correo); ?></td>
                    <td><?php echo e($c->telefono); ?></td>
                    <td style="text-align: right">$<?php echo e(number_format($c->total_producto,2)); ?></td>
                    <td style="text-align: right">$<?php echo e(number_format($c->total_mx,2)); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/cotizador/oc.blade.php ENDPATH**/ ?>