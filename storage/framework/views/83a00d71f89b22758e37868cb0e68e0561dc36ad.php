<table  class="table table-striped table-bordered file-export small" id="formulas-table">
    <thead>
        <tr class="gris_tabla">
            <th>Id</th>
            <th>Catálogo</th>
            <th>Formula</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $formulas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formulas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($formulas->id); ?></td>
            <td><?php echo $formulas->nom_catalogo; ?></td>
            <td><?php echo $formulas->formula; ?></td>
            <td></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/formulas/table.blade.php ENDPATH**/ ?>