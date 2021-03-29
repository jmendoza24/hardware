<div class="col-md-6">
    <table class="table table-bordered table-striped">
        <thead class="gris_tabla">
            <tr>
                <td>Imágenes</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $proyectos_files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($p->tipo_file==1): ?>
            <tr>
                <td><a target="_blank" href="<?php echo e($p->file); ?>"><?php echo e($p->descripcion); ?></a></td>
                <td><span class="btn btn-danger btn-sm" onclick="elimina_catalogo(18,<?php echo e($p->id); ?>,'',<?php echo e($p->id_proyecto); ?>)"><i class="fa fa-trash"></i></span></td>
            </tr>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<div class="col-md-6">
    <table class="table table-bordered table-striped">
        <thead class="gris_tabla">
            <tr>
                <td>Archivos</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $proyectos_files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($p->tipo_file==2): ?>
            <tr>
                <td><a target="_blank" href="<?php echo e($p->file); ?>"><?php echo e($p->descripcion); ?></a></td>
                <td><span class="btn btn-danger btn-sm" onclick="elimina_catalogo(18,<?php echo e($p->id); ?>,'',<?php echo e($p->id_proyecto); ?>)"><i class="fa fa-trash"></i></span></td>
            </tr>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div><?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/proyectos/archivos.blade.php ENDPATH**/ ?>