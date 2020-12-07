<table class="table table-striped responsive  table-bordered scroll-vertical" id="productos-table">
        <thead>
            <tr class="gris_tabla">
                <th></th>
                <th>Página</th>
                <th>Descripción</th>
                <th>Fabricante</th>
                <th>Catálogo</th>
                <th>Familia</th>
                <th>Categoría</th>
                <th>Subcategoría</th>
                <th>Item</th>
                <th>Sufijo</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <div class="btn-group mr-1 mb-1">
                        <button type="button" class="btn btn-icon btn-pure dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
                        <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?php echo route('productos.edit', [$productos->id]); ?>" >Editar</a>
                                <a class="dropdown-item" href="javascript:{}" onclick="confirmar_eliminar(<?php echo e($productos->id); ?>)" >Elimniar</a>
                        </div>
                      </div>
                </td>
                <td><?php echo e($productos->pagina); ?></td>
                <td><?php echo e($productos->descripcion); ?></td>
                <td><?php echo $productos->abrev; ?></td>
                <td><?php echo $productos->catalogo; ?></td>
                <td><?php echo $productos->familia; ?></td>
                <td><?php echo $productos->categoria; ?></td>
                <td><?php echo $productos->subcategoria; ?></td>
                <td><?php echo $productos->item; ?></td>
                <td><?php echo $productos->sufijo; ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php /**PATH /home/altermed/public_html/demo.cotiza.tech/laravel/resources/views/productos/table.blade.php ENDPATH**/ ?>