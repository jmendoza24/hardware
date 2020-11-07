<table class="table table-striped  table-bordered setting-defaults" id="productos-table">
        <thead>
            <tr class="gris_tabla">
                <th>Fabricante</th>
                <th>Catalogo</th>
                <th>Pagina</th>
                <th>Familia</th>
                <th>Categoria</th>
                <th>Subcategoria</th>
                <th>Disenio</th>
                <th>Item</th>
                <th>Sufijo</th>
                <th>Grupo Sufijo</th>
                <th>Descripcion</th>
                <th>Descripcion Mtk</th> 
                <th>Especificacion</th>
                <th>Selector Mtk</th>
                <th>Mortise</th>
                <th>Fmm1</th>
                <th>Stem</th>
                <th>Fmm2</th>
                <th>Handle</th>
                <th>Fmm3</th>
                <th>Wheel</th>
                <th>Fastener</th>
                <th>Style</th>
                <th>Finish</th>
                <th>Style 1</th>
                <th>Style 2</th>
                <th>Style 3</th>
                <th>Latch</th>
                <th>Strike</th>
                <th>Cylinder</th>
                <th>Keyling</th>
                <th>Finish Det 1</th>
                <th>Finish Det 2</th>
                <th>Finish Det 3</th>
                <th>Finish Det 4</th>
                <th>Dependencias</th>
                <th>Handing</th>
                <th>Door Thickness</th>
                <th>Backset</th>
                <th>Costo 1</th>
                <th>Costo 2</th>
                <th>Costo 3</th>
                <th>Costo 4</th>
                <th>Calculo Codigo</th>
                <th>Codigo Sistema</th>
                <th>Notas</th>
                <th>Exterior Tim Dep 1</th>
                <th>Exterior Tim 1 Accion</th>
                <th>Int Escutcheon Dep 2</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo $productos->fabricante; ?></td>
                <td><?php echo $productos->catalogo; ?></td>
                <td><?php echo $productos->pagina; ?></td>
                <td><?php echo $productos->familia; ?></td>
                <td><?php echo $productos->categoria; ?></td>
                <td><?php echo $productos->subcategoria; ?></td>
                <td><?php echo $productos->disenio; ?></td>
                <td><?php echo $productos->item; ?></td>
                <td><?php echo $productos->sufijo; ?></td>
                <td><?php echo $productos->grupo_sufijo; ?></td>
                <td><?php echo $productos->descripcion; ?></td>
                <td><?php echo $productos->descripcion_mtk; ?></td>
                <td><?php echo $productos->especificacion; ?></td>
                <td><?php echo $productos->selector_mtk; ?></td>
                <td><?php echo $productos->mortise; ?></td>
                <td><?php echo $productos->fmm1; ?></td>
                <td><?php echo $productos->stem; ?></td>
                <td><?php echo $productos->fmm2; ?></td>
                <td><?php echo $productos->handle; ?></td>
                <td><?php echo $productos->fmm3; ?></td>
                <td><?php echo $productos->wheel; ?></td>
                <td><?php echo $productos->fastener; ?></td>
                <td><?php echo $productos->style; ?></td>
                <td><?php echo $productos->finish; ?></td>
                <td><?php echo $productos->style_1; ?></td>
                <td><?php echo $productos->style_2; ?></td>
                <td><?php echo $productos->style_3; ?></td>
                <td><?php echo $productos->latch; ?></td>
                <td><?php echo $productos->strike; ?></td>
                <td><?php echo $productos->cylinder; ?></td>
                <td><?php echo $productos->keyling; ?></td>
                <td><?php echo $productos->finish_det_1; ?></td>
                <td><?php echo $productos->finish_det_2; ?></td>
                <td><?php echo $productos->finish_det_3; ?></td>
                <td><?php echo $productos->finish_det_4; ?></td>
                <td><?php echo $productos->dependencias; ?></td>
                <td><?php echo $productos->handing; ?></td>
                <td><?php echo $productos->door_thickness; ?></td>
                <td><?php echo $productos->backset; ?></td>
                <td><?php echo $productos->costo_1; ?></td>
                <td><?php echo $productos->costo_2; ?></td>
                <td><?php echo $productos->costo_3; ?></td>
                <td><?php echo $productos->costo_4; ?></td>
                <td><?php echo $productos->calculo_codigo; ?></td>
                <td><?php echo $productos->codigo_sistema; ?></td>
                <td><?php echo $productos->notas; ?></td>
                <td><?php echo $productos->exterior_tim_dep_1; ?></td>
                <td><?php echo $productos->exterior_tim_1_accion; ?></td>
                <td><?php echo $productos->int_escutcheon_dep_2; ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php /**PATH /var/www/html/_hardware/resources/views/productos/table_masivo.blade.php ENDPATH**/ ?>