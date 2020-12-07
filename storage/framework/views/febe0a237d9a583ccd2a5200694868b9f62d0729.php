<table class="table table-striped table-bordered file-export" id="items-table">
    <thead>
        <tr class="gris_tabla">
            <th>ID</th>
            <th>Diseño</th>
            <th>Item</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo $item->id; ?></td>
                <td><?php echo $item->nom_disenio; ?></td>
                <td><?php echo $item->item; ?></td>
            <td>
                <div class='btn-group'>
                    <span onclick="ver_catalogo(10,<?php echo e($item->id); ?>,2)" class='btn btn-float btn-outline-success btn_azul btn-round' data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-edit"></i></span>
                    <span onclick="elimina_catalogo(10,<?php echo e($item->id); ?>,'items',<?php echo e($item->id_fabricante); ?>,<?php echo e($item->catalogo); ?>,<?php echo e($item->id_familia); ?>,<?php echo e($item->categoria); ?>,<?php echo e($item->idsubcategoria); ?>,<?php echo e($item->disenio); ?>)" class='btn btn-float btn_rojo btn-outline-danger btn-round'><i class="fa fa-trash"></i></span>    
                </div>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
    </tbody>
</table><?php /**PATH /home/altermed/public_html/hardwarecollection.mx/laravel/resources/views/items/table.blade.php ENDPATH**/ ?>