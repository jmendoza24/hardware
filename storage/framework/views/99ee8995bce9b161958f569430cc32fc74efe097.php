<table class="table table-striped table-bordered file-export" id="baldwins-table">
    <thead>
        <tr class="gris_tabla">
            <th>Id</th>
            <th>Variable</th>
            <th>Grupo</th>
            <th>Opciones</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $subBaldwins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subBaldwin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($subBaldwin->id); ?></td>
            <td> 
                <?php $__currentLoopData = $variable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <?php echo e($key== $subBaldwin->variable?$value:''); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </td>
            <td><?php echo $subBaldwin->subcatalogo; ?></td>
            <td><?php echo substr($subBaldwin->selector,0,50); ?>...</td>
            <td>
                <div class='btn-group'>
                    <span onclick="ver_catalogo(6,<?php echo e($subBaldwin->id); ?>,2)" class='btn btn-float btn-outline-success btn_azul btn-round' data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-edit"></i></span>
                    <span onclick="elimina_catalogo(6,<?php echo e($subBaldwin->id); ?>,'baldwins')" class='btn btn-float btn-outline-danger btn_rojo btn-round'><i class="fa fa-trash"></i></span>    
                </div>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
    </tbody>
</table>
<?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/sub_baldwins/table.blade.php ENDPATH**/ ?>