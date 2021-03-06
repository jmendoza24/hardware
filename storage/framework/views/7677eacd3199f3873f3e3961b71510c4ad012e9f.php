<ul class="nav nav-tabs nav-underline no-hover-bg nav-justified">
  <li class="nav-item">
    <a class="nav-link active" id="baseIcon-tab11" data-toggle="tab" aria-controls="tabIcon11"
    href="#tabIcon11" aria-expanded="true"> General</a>
  </li>
  <?php if($editar == 1): ?>
  <li class="nav-item">
    <a class="nav-link" id="baseIcon-tab12" data-toggle="tab" aria-controls="tabIcon12"
    href="#tabIcon12" aria-expanded="false"> Involucrados</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="baseIcon-tab13" data-toggle="tab" aria-controls="tabIcon13"
    href="#tabIcon13" aria-expanded="false">Documentos</a>
  </li>
  <?php endif; ?>
</ul>

<div class="tab-content px-1 pt-1">
    <div role="tabpanel" class="tab-pane active" id="tabIcon11" aria-expanded="true" aria-labelledby="baseIcon-tab11">
        <div class="row">
            <div class="form-group col-sm-6">
                <?php echo Form::label('nombre', 'Proyecto:'); ?>

                <?php echo Form::text('nombre', null, ['class' => 'form-control','required']); ?>

            </div>

            <!-- Nombre Corto Field -->
            <div class="form-group col-sm-6">
                <?php echo Form::label('nombre_corto', 'Nombre Corto:'); ?>

                <?php echo Form::text('nombre_corto', null, ['class' => 'form-control','required']); ?>

            </div>

            <!-- Direccion Field -->
            <div class="form-group col-sm-6">
                <?php echo Form::label('direccion', 'Dirección:'); ?>

                <?php echo Form::text('direccion', null, ['class' => 'form-control']); ?>

            </div>

            <!-- Geolocalizacion Field -->
            <div class="form-group col-sm-6">
                <?php echo Form::label('geolocalizacion', 'Geolocalización:'); ?>

                <?php echo Form::text('geolocalizacion', null, ['class' => 'form-control']); ?>

            </div>

            <!-- Rfc Field -->
            <div class="form-group col-sm-6">
                <?php echo Form::label('rfc', 'Proyectos relacionados:'); ?>

                <?php echo Form::text('rfc', null, ['class' => 'form-control']); ?>

            </div>

            <!-- Cp Field -->
            <div class="form-group col-sm-6">
                <?php echo Form::label('cp', 'CP:'); ?>

                <?php echo Form::text('cp', null, ['class' => 'form-control']); ?>

            </div>

            <div class="form-group col-sm-6">
                <?php echo Form::label('estado', 'País:'); ?>

                <select class="form-control" id="pais" name="pais" onchange="busca_estado('estado_select')">
                    <option value="">Seleccione...</option>
                    <?php $__currentLoopData = $paises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($ps->id); ?>" <?php echo e(($proyectos->pais==$ps->id)?'selected':''); ?>><?php echo e($ps->Pais); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="form-group col-sm-6">
                <?php echo Form::label('estado', 'Estado:'); ?>

                <select class="form-control" id="estado_select" name="estado" style="<?php if($proyectos->pais ==126 ||$proyectos->pais=='' ): ?> display: none; <?php endif; ?>" onchange="get_municipios('estado_select','municipio_select')">
                    <option value="">Seleccione...</option>
                    <?php $__currentLoopData = $estados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $edo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($edo->id); ?>" <?php echo e(($proyectos->estado==$edo->id)?'selected':''); ?>><?php echo e($edo->estado); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($proyectos->pais != 126 && $proyectos->pais=='' ): ?> 
                    <input type="text" name="estado" id="estado_text" class="form-control" value="<?php echo e($proyectos->estado); ?>">
                <?php endif; ?>
            </div>

            <div class="form-group col-sm-6">
                <?php echo Form::label('municipio', 'Municipio:'); ?>

                <select class="form-control" id="municipio_select" name="municipio" style="<?php if($proyectos->pais ==126 ||$proyectos->pais=='' ): ?> display: none; <?php endif; ?>" >
                    <option value="">Seleccione...</option>
                    <?php $__currentLoopData = $municipios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($mun->id); ?>" <?php echo e(($proyectos->municipio==$mun->id)?'selected':''); ?>><?php echo e($mun->municipio); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($proyectos->pais != 126 && $proyectos->pais=='' ): ?> 
                    <input type="text" name="municipio" id="municipio_text" class="form-control" value="<?php echo e($proyectos->municipio); ?>">
                <?php endif; ?>
            </div>
            
        </div>
        <hr>
        <br><h2 style=" color: #5C8293"><strong>Contactos Principales</strong></h2><br><br>

        <div class="row">
            <!-- Correo Due O Field -->
            <div class="form-group col-sm-4">
                <?php echo Form::label('nombre_duenio', 'Dueño:'); ?>

                <?php echo Form::text('nombre_duenio', null, ['class' => 'form-control mail']); ?>

            </div>
            <div class="form-group col-sm-4">
                <?php echo Form::label('correo_duenio', 'Email:'); ?>

                <?php echo Form::text('correo_duenio', null, ['class' => 'form-control mail']); ?>

            </div>

            <!-- Telefono Field -->
            <div class="form-group col-sm-4">
                <?php echo Form::label('telefono', 'Teléfono:'); ?>

                <?php echo Form::text('telefono', null, ['class' => 'form-control']); ?>

            </div>

            <!-- Arquitecto Correo Field -->
        </div>
        <div class="row"> 
            <div class="form-group col-sm-4">
                <?php echo Form::label('nombre_arq', 'Arquitecto:'); ?>

                <?php echo Form::text('nombre_arq', null, ['class' => 'form-control mail']); ?>

            </div>
            <div class="form-group col-sm-4">
                <?php echo Form::label('arquitecto_correo', 'Email:'); ?>

                <?php echo Form::text('arquitecto_correo', null, ['class' => 'form-control']); ?>

            </div>

            <!-- Tel Arq Field -->
            <div class="form-group col-sm-4">
                <?php echo Form::label('tel_arq', 'Teléfono:'); ?>

                <?php echo Form::text('tel_arq', null, ['class' => 'form-control']); ?>

            </div>
        </div>
        <div class="row">
            <!-- Comprador Correo Field -->
            <div class="form-group col-sm-4">
                <?php echo Form::label('nombre_firma', 'Firma:'); ?>

                <?php echo Form::text('nombre_firma', null, ['class' => 'form-control mail']); ?>

            </div>

            <div class="form-group col-sm-4">
                <?php echo Form::label('comprador_firma', 'Email:'); ?>

                <?php echo Form::text('comprador_firma', null, ['class' => 'form-control']); ?>

            </div>

            <!-- Tel Comprador Field -->
            <div class="form-group col-sm-4">
                <?php echo Form::label('tel_firma', 'Teléfono:'); ?>

                <?php echo Form::text('tel_firma', null, ['class' => 'form-control']); ?>

            </div>
        </div>
        <div class="row">
            <!-- Comprador Correo Field -->
            <div class="form-group col-sm-4">
                <?php echo Form::label('nombre_comprador', 'Comprador:'); ?>

                <?php echo Form::text('nombre_comprador', null, ['class' => 'form-control mail']); ?>

            </div>

            <div class="form-group col-sm-4">
                <?php echo Form::label('comprador_correo', 'Email:'); ?>

                <?php echo Form::text('comprador_correo', null, ['class' => 'form-control']); ?>

            </div>

            <!-- Tel Comprador Field -->
            <div class="form-group col-sm-4">
                <?php echo Form::label('tel_comprador', 'Teléfono:'); ?>

                <?php echo Form::text('tel_comprador', null, ['class' => 'form-control']); ?>

            </div>
        </div>
                <div class="row">
            <!-- Comprador Correo Field -->
            <div class="form-group col-sm-4">
                <?php echo Form::label('nombre_comprador', 'Residente principal:'); ?>

                <?php echo Form::text('residente', null, ['class' => 'form-control mail']); ?>

            </div>

            <div class="form-group col-sm-4">
                <?php echo Form::label('residente_correo', 'Email:'); ?>

                <?php echo Form::text('residente_correo', null, ['class' => 'form-control']); ?>

            </div>

            <!-- Tel Comprador Field -->
            <div class="form-group col-sm-4">
                <?php echo Form::label('tel_residente', 'Teléfono:'); ?>

                <?php echo Form::text('residente_tel', null, ['class' => 'form-control']); ?>

            </div>
        </div>

        <hr>
        <div class="row">
            
            <div class="form-group col-sm-6">
                <?php echo Form::label('tipo', 'Tipo de Proyecto:'); ?>

                <select class="form-control" name="tipo">
                <option value="">Seleccione..</option>
                <?php $__currentLoopData = $tipo_proyecto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($t->id); ?>" <?php echo e($t->id == $proyectos->tipo?'selected':''); ?>><?php echo e($t->tipo_proyecto); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <!-- Comentarios Field -->
            <div class="form-group col-sm-6">
                <?php echo Form::label('comentarios', 'Comentarios:'); ?>

                <?php echo Form::text('comentarios', null, ['class' => 'form-control']); ?>

            </div>

            <!-- Estatus Field -->
            <div class="form-group col-sm-6">
                <?php echo Form::label('estatus', 'Estatus:'); ?>

                <select class="form-control" name="estatus">
                    <option value="">Seleccione...</option>
                    <option value="1" <?php echo e($proyectos->estatus ==1 ? 'selected':''); ?>>Activo</option>
                    <option value="2" <?php echo e($proyectos->estatus ==2 ? 'selected':''); ?>>No activo</option>
                </select>
            </div>

            <!-- Submit Field -->
        </div>
        <hr>
        <div class="row">
            <div class="form-group col-sm-12" style="text-align: right;">
                <?php echo Form::submit('Guardar', ['class' => 'btn azul']); ?>

                <a href="<?php echo route('proyectos.index'); ?>" class="btn btn_rojo">Cancelar</a>
            </div>
        </div>
    </div>
    <?php if($editar == 1): ?>
    <div class="tab-pane" id="tabIcon12" aria-labelledby="baseIcon-tab12">
        <?php echo $__env->make('proyectos.clientes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="tab-pane" id="tabIcon13" aria-labelledby="baseIcon-tab3">
        <div class="col-md-12 text-left">
            <span class="btn btn-outline-success" data-toggle="modal" data-target="#primary"  onclick="ver_catalogo(18,0,1,'',<?php echo e($proyectos->id); ?>,1)"><i class="fa fa-plus"></i> Nuevo Documento</span>
        </div>
        <br>
        <div class="row" id="tabla_catalogos">
           <?php echo $__env->make('proyectos.archivos', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <?php endif; ?>
</div><?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/proyectos/fields.blade.php ENDPATH**/ ?>