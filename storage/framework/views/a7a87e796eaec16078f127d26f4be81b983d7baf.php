<ul class="nav nav-tabs nav-underline no-hover-bg nav-justified">
  <li class="nav-item">
    <a class="nav-link active" id="baseIcon-tab11" data-toggle="tab" aria-controls="tabIcon11"
    href="#tabIcon11" aria-expanded="true"> General</a>
  </li>
  <?php if($editar == 1): ?>
  <li class="nav-item">
    <a class="nav-link" id="baseIcon-tab13" data-toggle="tab" aria-controls="tabIcon13" href="#tabIcon12" aria-expanded="false"> Contactos adicionales</a>
  </li>
  <?php endif; ?>
</ul>
<div class="tab-content px-1 pt-1">
  <div role="tabpanel" class="tab-pane active" id="tabIcon11" aria-expanded="true" aria-labelledby="baseIcon-tab11">
    <div class="row">
        <div class="form-group col-sm-6">
            <?php echo Form::label('fabricante', 'Fabricante:'); ?>

            <?php echo Form::text('fabricante', null, ['class' => 'form-control']); ?>

        </div>
        <div class="form-group col-sm-6">
            <?php echo Form::label('abrev', 'Abrev:'); ?>

            <?php echo Form::text('abrev', null, ['class' => 'form-control']); ?>

        </div>
        <div class="form-group col-sm-6">
            <?php echo Form::label('direccion', 'Direccion:'); ?>

            <?php echo Form::textarea('direccion', null, ['class' => 'form-control']); ?>

        </div>
        <div class="form-group col-sm-6">
            <?php echo Form::label('pais', 'Pais:'); ?>

            <select class="form-control" id="pais" name="pais">
                <option value="">Seleccione...</option>
                <?php $__currentLoopData = $pais; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($ps->id); ?>" <?php echo e(($fabricantes->pais==$ps->id)?'selected':''); ?>><?php echo e($ps->Pais); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="form-group col-sm-6">
            <?php echo Form::label('estado', 'Estado:'); ?>

            <?php echo Form::text('estado', null, ['class' => 'form-control']); ?>

        </div>
        <div class="form-group col-sm-6">
            <?php echo Form::label('cp', 'Cp:'); ?>

            <?php echo Form::number('cp', null, ['class' => 'form-control']); ?>

        </div>
        <div class="form-group col-sm-6">
            <?php echo Form::label('contacto', 'Contacto:'); ?>

            <?php echo Form::text('contacto', null, ['class' => 'form-control']); ?>

        </div>
        <div class="form-group col-sm-6">
            <?php echo Form::label('telefono_dir', 'Teléfono Directo:'); ?>

            <?php echo Form::text('telefono_dir', null, ['class' => 'form-control phone-inputmask']); ?>

        </div>
        <div class="form-group col-sm-6">
            <?php echo Form::label('telefono_gen', 'Teléfono General:'); ?>

            <?php echo Form::text('telefono_gen', null, ['class' => 'form-control phone-inputmask']); ?>

        </div>
        <div class="form-group col-sm-6">
            <?php echo Form::label('telefono_fax', 'Teléfono Fax:'); ?>

            <?php echo Form::text('telefono_fax', null, ['class' => 'form-control phone-inputmask']); ?>

        </div>
        <div class="form-group col-sm-6">
            <?php echo Form::label('datos_bancarios', 'Datos Bancarios:'); ?>

            <?php echo Form::textarea('datos_bancarios', null, ['class' => 'form-control']); ?>

        </div>
        <div class="form-group col-sm-6">
            <?php echo Form::label('web', 'Web:'); ?>

            <?php echo Form::text('web', null, ['class' => 'form-control']); ?>

        </div>
        <div class="form-group col-sm-6">
            <?php echo Form::label('correo', 'Correo:'); ?>

            <?php echo Form::text('correo', null, ['class' => 'form-control email-inputmask']); ?>

        </div>
        <div class="form-group col-sm-6">
            <?php echo Form::label('correo_gen', 'Correo General:'); ?>

            <?php echo Form::text('correo_gen', null, ['class' => 'form-control email-inputmask']); ?>

        </div>
        <div class="form-group col-sm-6">
            <?php echo Form::label('condiciones', 'Condiciones:'); ?>

            <?php echo Form::text('condiciones', null, ['class' => 'form-control']); ?>

        </div>
        <div class="form-group col-sm-6">
            <?php echo Form::label('descripcion', 'Descripción:'); ?>

            <?php echo Form::text('descripcion', null, ['class' => 'form-control']); ?>

        </div>
        <div class="form-group col-sm-6">
            <?php echo Form::label('gama', 'Gama:'); ?>

            <select class="form-control" name="gama">
                <option value="">Seleccione...</option>
                <?php $__currentLoopData = $gama; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($g->id); ?>" <?php echo e(($g->id==$fabricantes->gama)?'selected':''); ?>><?php echo e($g->tipo); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="form-group col-sm-6">
            <?php echo Form::label('modalidad', 'Modalidad:'); ?>

            <select class="form-control" name="modalidad">
                <option value="">Seleccione...</option>
                <?php $__currentLoopData = $modalidad; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($m->id); ?>" <?php echo e(($m->id==$fabricantes->modalidad)?'selected':''); ?>><?php echo e($m->tipo); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="form-group col-sm-6">
            <?php echo Form::label('activo', 'Activo:'); ?>

            <select class="form-control" name="activo">
                <option value=""></option>
                <option value="1" <?php echo e(($fabricantes->activo==1?'selected':'')); ?>>SI</option>
                <option value="0" <?php echo e(($fabricantes->activo==0?'selected':'')); ?>>NO</option>
            </select>
        </div>        
    </div>
  </div>
  <div class="tab-pane" id="tabIcon12" aria-labelledby="baseIcon-tab12">
    <span class="btn btn-primary pull-right" data-toggle="modal" data-backdrop="false" data-target="#primary" style="margin-top: -10px;margin-bottom: 5px" onclick="agrega_contacto(<?php echo e($fabricantes->id_fabricante); ?>,0)">+ Contacto</span>
    <br><br>
    <div class="row" id="contactos_fab">
        <?php echo $__env->make('fabricantes.contacto', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
  </div>
</div>

<div class="form-group col-sm-12" style="text-align: right;">
    <hr>
    <?php echo Form::submit('Guardar', ['class' => 'btn btn_azul']); ?>

    <a href="<?php echo route('fabricantes.index'); ?>" class="btn btn_rojo">Cancelar</a>
</div>
<?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/fabricantes/fields.blade.php ENDPATH**/ ?>