<table class="table table-striped table-bordered file-export" id="subcategorias-table">
    <thead>
        <tr class="gris_tabla">
            <th>Id</th>
            <th>Categoria</th>
            <th>Subcategoria</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $subcategorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($subcategoria->id); ?></td>
            <td><?php echo $subcategoria->nom_categoria; ?></td>
            <td><a href="<?php echo e(route('disenios.lista',['subcategoria'=>$subcategoria->id])); ?>"><b><?php echo $subcategoria->subcategoria; ?></b></a></td>
            <td>
                <div class='btn-group'>
                    <span onclick="ver_catalogo(4,<?php echo e($subcategoria->id); ?>,2)" class='btn btn-float btn-outline-success btn_azul btn-round' data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-edit"></i></span>
                    <span onclick="elimina_catalogo(4,<?php echo e($subcategoria->id); ?>,'subcategorias',<?php echo e($subcategoria->id_fabricante); ?>,<?php echo e($subcategoria->catalogo); ?>,<?php echo e($subcategoria->id_familia); ?>,<?php echo e($subcategoria->categoria); ?>)" class='btn btn-float btn-outline-danger btn_rojo btn-round'><i class="fa fa-trash"></i></span>    
                </div>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
    </tbody>
</table>
 <?php /**PATH /home/altermed/public_html/hardwarecollection.mx/laravel/resources/views/subcategorias/table.blade.php ENDPATH**/ ?>