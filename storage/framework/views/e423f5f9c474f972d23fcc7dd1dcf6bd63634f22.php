<table class="table table-striped table-bordered file-export" id="disenios-table">
    <thead>
        <tr class="gris_tabla">
            <th>Id</th>
            <th>Subcategoria</th>
            <th>Diseño</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $disenios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $disenio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($disenio->id); ?></td>
            <td><?php echo $disenio->subcategoria; ?></td>
            <td><a href="<?php echo e(route('items.lista',['disenio'=>$disenio->id])); ?>"><b><?php echo $disenio->disenio; ?></b></a></td>
            <td>
                <div class='btn-group'>
                    <span onclick="ver_catalogo(9,<?php echo e($disenio->id); ?>,2)" class='btn btn-float btn_azul btn-outline-success btn-round' data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-edit"></i></span>
                    <span onclick="elimina_catalogo(9,<?php echo e($disenio->id); ?>,'disenios',<?php echo e($disenio->id_fabricante); ?>,<?php echo e($disenio->catalogo); ?>,<?php echo e($disenio->id_familia); ?>,<?php echo e($disenio->categoria); ?>,<?php echo e($disenio->idsubcategoria); ?>)" class='btn btn-float btn-outline-danger btn_rojo btn-round'><i class="fa fa-trash"></i></span>    
                </div>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
    </tbody>
</table><?php /**PATH /home/altermed/public_html/hardwarecollection.mx/laravel/resources/views/disenios/table.blade.php ENDPATH**/ ?>