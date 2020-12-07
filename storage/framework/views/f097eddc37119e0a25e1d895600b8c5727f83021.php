<div class="row">
    <div class="form-group col-sm-6">
        <?php echo Form::label('nombre', 'P. Física o Moral:'); ?>

        <?php echo Form::text('nombre', null, ['class' => 'form-control','required']); ?>

    </div>

    <div class="form-group col-sm-6">
        <?php echo Form::label('empresa', 'Empresa:'); ?>

        <?php echo Form::text('empresa', null, ['class' => 'form-control']); ?>

    </div>
    <div class="form-group col-sm-6">
        <?php echo Form::label('dir_facturacion', 'Dirección Facturación:'); ?>

        <?php echo Form::text('dir_facturacion', null, ['class' => 'form-control']); ?>

    </div>
    <div class="form-group col-sm-6">
        <?php echo Form::label('rfc', 'RFC:'); ?>

        <?php echo Form::text('rfc', null, ['class' => 'form-control']); ?>

    </div>
    <div class="form-group col-sm-6">
        <?php echo Form::label('pais', 'Pais:'); ?>

        <select class="form-control" id="pais" name="pais">
            <option value="">Seleccione...</option>
            <?php $__currentLoopData = $pais; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($ps->id); ?>" <?php echo e(($clientes->pais==$ps->id)?'selected':''); ?>><?php echo e($ps->Pais); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
        <!-- Estado Field -->
    <div class="form-group col-sm-6">
        <?php echo Form::label('estado', 'Estado:'); ?>

        <select class="form-control" id="estado" name="estado" onchange="get_municipios('estado','municipio')">
            <option value="">Seleccione...</option>
            <?php $__currentLoopData = $estados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $edo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($edo->id); ?>" <?php echo e(($clientes->estado==$edo->id)?'selected':''); ?>><?php echo e($edo->estado); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <!-- Municipio Field -->
    <div class="form-group col-sm-6">
        <?php echo Form::label('municipio', 'Municipio:'); ?>

        <select class="form-control" id="municipio" name="municipio">
            <option value="">Seleccione...</option>
            <?php $__currentLoopData = $municipios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($mun->municipios_id); ?>" <?php echo e(($clientes->municipio==$mun->municipios_id)?'selected':''); ?>><?php echo e($mun->municipio); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="form-group col-sm-6">
        <?php echo Form::label('cp', 'CP:'); ?>

        <?php echo Form::text('cp', null, ['class' => 'form-control']); ?>

    </div>
    <div class="form-group col-sm-6">
        <?php echo Form::label('correo', 'Correo:'); ?>

        <textarea style="width: 500px;" id="correo" name="correo" class="form-control" ></textarea>

    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        <?php echo Form::label('telefono', 'Teléfono:'); ?>

        <?php echo Form::text('telefono1', null, ['class' => 'form-control']); ?>

    </div>
    <div class="form-group col-sm-6">
        <?php echo Form::label('telefono2', 'Teléfono:'); ?>

        <?php echo Form::text('telefono2', null, ['class' => 'form-control']); ?>

    </div>  
    <div class="form-group col-sm-6">
        <?php echo Form::label('id_precio', 'Lista Precio:'); ?>

        <select class="form-control" name="id_precio" id="id_precio" required="">
            <option value="">Seleccione...</option>
                <option value="1" <?php echo e(1==$clientes->id_precio?'selected':''); ?>>L1 Walkin/Showroom</option>
                <option value="2" <?php echo e(2==$clientes->id_precio?'selected':''); ?>>L2 Carpinteros/Instaladores</option>
                <option value="3" <?php echo e(3==$clientes->id_precio?'selected':''); ?>>L3 Arq./Diseñadores</option>
                <option value="4" <?php echo e(4==$clientes->id_precio?'selected':''); ?>>L4 Proy.Grandes/Hoteles</option>


        </select>
    </div>
    <div class="form-group col-sm-6">
        <?php echo Form::label('id_tipo1', 'Tipo de Participante:'); ?>

        <select class="form-control" id="id_tipo1" name="id_tipo1">
            <option value="">Seleccione...</option>
            <?php $__currentLoopData = $tipo_cliente; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($t->id); ?>" <?php echo e(($clientes->id_tipo1==$t->id)?'selected':''); ?>><?php echo e($t->tipo_cliente); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    
            <!-- Cp Field -->
            

</div>
<?php if($editar ==1): ?>
<hr>
<div class="row">
    <div class="col-md-12">
        <span class="btn btn-outline-primary btn_azul pull-right" onclick="ver_catalogo(15,0,1,<?php echo e($clientes->id_cliente); ?>)" data-toggle="modal" data-backdrop="false" data-target="#primary">+ Contacto</span>
    </div>
    <br><br><br>
    <div class="col-md-12" id="tabla_catalogos">
        <?php echo $__env->make('clientes.asignacion', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<?php endif; ?>
<div class="form-group col-sm-12" style="text-align: right;">
    <hr>
    <?php echo Form::submit('Guardar', ['class' => 'btn btn_azul']); ?>

    <a href="<?php echo route('clientes.index'); ?>" class="btn btn_rojo">Cancelar</a>
</div><?php /**PATH /home/altermed/public_html/hardwarecollection.mx/laravel/resources/views/clientes/fields.blade.php ENDPATH**/ ?>