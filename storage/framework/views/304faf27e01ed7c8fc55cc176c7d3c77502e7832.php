<?php $__env->startSection('titulo'); ?> Categorias <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-md-12">    
    <h1 class="pull-right">
       <span class="btn btn_azul pull-right" style="margin-top: -10px;margin-bottom: 5px" onclick="ver_catalogo(3,0,1,<?php echo e($catalogo->id_fabricante); ?>,<?php echo e($catalogo->catalogo); ?>,<?php echo e($catalogo->id); ?>)" data-toggle="modal" data-backdrop="false" data-target="#primary">+ Categoria</span>
    </h1>
    </div>
    <br><br><br>
    <div class="col-md-12" id="tabla_catalogos">
     <?php echo $__env->make('categorias.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('submenus'); ?>
<li><a href="<?php echo e(route('catalogos.index')); ?>">Catalogos</a>/<a href="<?php echo e(route('familias.lista',['id_catalogo'=>$catalogo->catalogo])); ?>"><?php echo e($catalogo->nom_catalogo); ?></a></li>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/categorias/index.blade.php ENDPATH**/ ?>