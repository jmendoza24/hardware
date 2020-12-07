<table  class="table table-striped table-bordered file-export" id="familias-table">
    <thead>
        <tr class="gris_tabla">
            <th>Id</th>
            <th>Catalogo</th>
            <th>Familia</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
            <?php $__currentLoopData = $familias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $familia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($familia->id); ?></td>
                    <td><?php echo $familia->catalogo; ?></td>
                    <td><a href="<?php echo e(route('categorias.lista',['id_familia'=>$familia->id])); ?>"><b><?php echo $familia->familia; ?></b></a></td>
                    <td>
                        <div class='btn-group'>
                            <span onclick="ver_catalogo(2,<?php echo e($familia->id); ?>,2)" class='btn btn-float btn_azul btn-outline-success btn-round' data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-edit"></i></span>
                            <span onclick="elimina_catalogo(2,<?php echo e($familia->id); ?>,'familias',<?php echo e($familia->id_fabricante); ?>,<?php echo e($familia->id_catalogo); ?>)" class='btn btn-float btn_rojo btn-outline-danger btn-round'><i class="fa fa-trash"></i></span>    
                        </div>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH /home/altermed/public_html/hardwarecollection.mx/laravel/resources/views/familias/table.blade.php ENDPATH**/ ?>