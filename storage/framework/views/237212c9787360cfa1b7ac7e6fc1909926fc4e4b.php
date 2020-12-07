

<?php $__env->startSection('titulo'); ?> Diseños <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-md-12">    
    <h1 class="pull-right">
       <span class="btn btn-primary btn_azul pull-right" style="margin-top: -10px;margin-bottom: 5px" onclick="ver_catalogo(9,0,1,<?php echo e($catalogo->id_fabricante); ?>,<?php echo e($catalogo->catalogo); ?>,<?php echo e($catalogo->familia); ?>,<?php echo e($catalogo->categoria); ?>,<?php echo e($catalogo->id); ?>)" data-toggle="modal" data-backdrop="false" data-target="#primary">+ Diseño</span>
    </h1>
    </div>
    <br><br><br>
    <div class="col-md-12" id="tabla_catalogos">
     <?php echo $__env->make('disenios.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('submenus'); ?>
<li><a href="<?php echo e(route('catalogos.index')); ?>">Catalogos</a>
	/<a href="<?php echo e(route('familias.lista',['id_catalogo'=>$catalogo->catalogo])); ?>"><?php echo e($catalogo->nom_catalogo); ?></a>
	/<a href="<?php echo e(route('categorias.lista',['id_familia'=>$catalogo->familia])); ?>"><?php echo e($catalogo->nom_familia); ?></a>
	/<a href="<?php echo e(route('subcategorias.lista',['id_categoria'=>$catalogo->categoria])); ?>"><?php echo e($catalogo->nom_categoria); ?></a>
</li>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/altermed/public_html/hardwarecollection.mx/laravel/resources/views/disenios/index.blade.php ENDPATH**/ ?>