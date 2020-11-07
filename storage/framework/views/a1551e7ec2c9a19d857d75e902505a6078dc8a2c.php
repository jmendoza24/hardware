 
<?php $__env->startSection('content'); ?>
<br> 
<style type="text/css">
    .td-2px{padding: 2px;}
</style>
<div class="col-md-12">
    <h3>OC</h3>
    <a class="btn btn-primary pull-right" href="<?php echo route('cotizador.index'); ?>">+ Cotización</a>
</div>
<br><br>
<div class="col-md-12" id="cotiza_table">
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
                    <td><span class="badge badge-primary" onclick="ver_catalogo(16,<?php echo e($c->id); ?>)" data-toggle="modal" data-backdrop="false" data-target="#primary" style="cursor: pointer; font-size: 12px;"><?php echo e($c->id); ?></span></td>
                    <td><?php echo e($c->nombre); ?></td>
                    <td><?php echo e($c->contacto); ?></td>
                    <td><?php echo e($c->telefono); ?></td>
                    <td style="text-align: right">$<?php echo e(number_format($c->total_usa,2)); ?></td>
                    <td style="text-align: right">$<?php echo e(number_format($c->total_mx,2)); ?></td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-sm btn-outline-secundary btn_gris" href="#" onclick="cambia_oc2(<?php echo e($c->id); ?>)"><i class="fa fa-retweet"></i></a> &nbsp;
                            <a class="btn btn-sm btn-outline-primary btn_azul" href="<?php echo e(route('cotizador.revive',['id_cotizacion'=>$c->id])); ?>"><i class="fa fa-window-maximize"></i></a> &nbsp;
                            <span class="btn btn-sm btn-outline-danger btn_rojo" onclick="eliminar_cotizacion(<?php echo e($c->id); ?>)"><i class="fa fa-trash"></i></span>
                        </div>
                    </td>
                    <td><?php echo e($c->correo); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
          
      </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/hardware/resources/views/cotizador/oc.blade.php ENDPATH**/ ?>