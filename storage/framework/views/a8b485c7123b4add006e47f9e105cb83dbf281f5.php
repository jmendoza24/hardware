<table class="table table-striped table-bordered file-export" id="categorias-table">
    <thead>
        <tr class="gris_tabla">
            <th>Id</th>
            <th>Familia</th>
            <th>Categoria</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($categoria->id); ?></td>
            <td><?php echo $categoria->familia; ?></td>
            <td><a href="<?php echo e(route('subcategorias.lista',['id_categoria'=>$categoria->id])); ?>"><b><?php echo $categoria->categoria; ?></b></a></td>
            <td>
                <div class='btn-group'>
                    <span onclick="ver_catalogo(3,<?php echo e($categoria->id); ?>,2,<?php echo e($categoria->id_fabricante); ?>,<?php echo e($categoria->catalogo); ?>,<?php echo e($categoria->id_familia); ?>)" class='btn btn-float btn_azul btn-outline-success btn-round' data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-edit"></i></span>
                    <span onclick="elimina_catalogo(3,<?php echo e($categoria->id); ?>,'categorias',<?php echo e($categoria->id_fabricante); ?>,<?php echo e($categoria->catalogo); ?>,<?php echo e($categoria->id_familia); ?>)" class='btn btn-float btn_rojo btn-outline-danger btn-round'><i class="fa fa-trash"></i></span>    
                </div>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
    </tbody>
</table>
<?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/categorias/table.blade.php ENDPATH**/ ?>