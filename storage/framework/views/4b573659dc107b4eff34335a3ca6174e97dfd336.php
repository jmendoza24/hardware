<div class="col-md-12 form-row" style="padding-top: 5px;">
    <div class="form-row col-md-4">
        <span class="col-md-1 btn-group">
            <button type="button" class="btn btn-icon btn-pure" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="<?php echo e(route('proyectos.create')); ?>" target="_blank">Nuevo</a>
                <a class="dropdown-item" onclick="buscar_cliente_proyecto(0)">Refrescar</a>
            </div>
        </span>
        <label class="col-md-3" style="padding-top: 8px;">Proyectos:</label>
        <select class="form-control select2 select2-size-xs col-md-7" id="proyectos" onchange="<?php if($tipo==1 || $tipo==0): ?> buscar_cliente_proyecto(1) <?php else: ?> actualiza_cliente_proyecto(1) <?php endif; ?>" >
            <option value="">Seleccione...</option>
            <?php $__currentLoopData = $proyectos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($p->id); ?>" <?php echo e($cotizacion->proyecto==$p->id?'selected':''); ?>><?php echo e($p->nombre_corto); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="form-row col-md-4">
        <span class="col-md-1 btn-group">
            <button type="button" class="btn btn-icon btn-pure" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="<?php echo e(route('clientes.create')); ?>" target="_blank">Nuevo</a>
                <a class="dropdown-item" onclick="buscar_cliente_proyecto(0)">Refrescar</a>
            </div>
        </span>
        <label class="col-md-3" style="padding-top: 8px;">Participante:</label>
        <select class="col-md-8 form-control select2 select2-size-xs" id="clientes" onchange="<?php if($tipo==2 || $tipo==0): ?> buscar_cliente_proyecto(2) <?php else: ?> actualiza_cliente_proyecto(1) <?php endif; ?>">
            <option value="">Seleccione...</option>
            <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($c->id); ?>" <?php echo e($cotizacion->cliente==$c->id?'selected':''); ?>><?php echo e($c->contacto); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select> 
    </div>
    <div class="col-md-2 form-row">
        <label class="col-md-3" style="padding-top: 4px;">Tipo:</label>
        <select class="form-control form-control-sm col-md-8" id="id_tipo" style="margin-top: 4px;">
            <option value="">Seleccione...</option>
            
            <option value="1">PDF Producto</option>
            <option value="2">PDF Completo</option>
            <option value="3">PDF Instalación</option>
            <option value="4">PDF Modificación</option>
            <option value="5">PDF Producto y Modificación</option>

        </select>
    </div>
    <div class="col text-right" style="margin-top: 10px;">
        <span style="color: white" class=" btn btn-outline-primary btn_azul btn-sm" onclick="baja_cotiza_pdf(<?php echo e($cotizacion->id); ?>)">PDF</span>
        <!--<span class="btn btn-outline-primary btn-sm">XLS</span>--->
        <span style="color: white"  class="btn btn-outline-primary btn_azul btn-sm" onclick="enviar_cotizacion(1)">Guardar</span>
        <span style="color: white" class="btn btn-outline-primary btn_azul btn-sm" onclick="enviar_cotizacion(2)">Enviar</span>

    </div>
</div><?php /**PATH /var/www/html/hardware/resources/views/cotizador/cliente_proyecto.blade.php ENDPATH**/ ?>