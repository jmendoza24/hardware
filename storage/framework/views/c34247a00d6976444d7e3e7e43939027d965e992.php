<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<td>Imagenes</td>
			<td></td>
		</tr>
	</thead>
	<tbody>
		 <?php $__currentLoopData = $imagenes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td><?php echo e($f->foto); ?></td>
                <td style="text-align: right">
                    <div class='btn-group'>
                        <span  class='btn btn_azul btn-xs' onclick="ver_catalogo(17,<?php echo e($f->id); ?>,2)" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-eye"></i></span>
                        <span onclick="elimina_catalogo(17,<?php echo e($f->id); ?>,'imagenes_productos',<?php echo e($f->id_producto); ?>)" class='btn btn-danger btn_rojo btn-xs'><i class="fa fa-trash"></i></span>
                    </div>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</tbody>
</table><?php /**PATH /home/altermed/public_html/hardwarecollection.mx/laravel/resources/views/productos/imagenes.blade.php ENDPATH**/ ?>