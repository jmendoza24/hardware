<table class="table table-striped table-bordered file-export" id="catalogos-table">
    <thead>
        <tr class="gris_tabla">
            <th>Id</th>
            <th>Fabricante</th>
            <th>Catálogo</th>
            <th>Abrev</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $catalogos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catalogos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($catalogos->id); ?></td>
            <td><?php echo $catalogos->fabricante; ?></td>
            <td> <a href="<?php echo e(route('familias.lista',['id_catalogo'=>$catalogos->id])); ?>"><b><?php echo $catalogos->catalogo; ?></b></a></td>
            <td><?php echo e($catalogos->abrev); ?></td>
            <td>
                <div class='btn-group'>
                    <span onclick="ver_catalogo(1,<?php echo e($catalogos->id); ?>,2,<?php echo e($catalogos->id_fabricante); ?>)" class='btn btn-float btn_azul btn-outline-success btn-round' data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-edit"></i></span>
                    <span onclick="elimina_catalogo(1,<?php echo e($catalogos->id); ?>,'catalogos',<?php echo e($catalogos->id_fabricante); ?>)" class='btn btn_rojo btn-float btn-outline-danger btn-round'><i class="fa fa-trash"></i></span>    
                </div>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
    </tbody>
</table>
<?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/catalogos/table.blade.php ENDPATH**/ ?>