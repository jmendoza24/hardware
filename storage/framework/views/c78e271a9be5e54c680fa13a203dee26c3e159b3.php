<table class="table table-striped  table-bordered">
    <thead>
        <tr class="gris_tabla">
            <th>Fabricante</th>
            <th>Factor HC</th>
            <th>L1 Walk <br> in/Showroom </th>
            <th>L2 Carpinteros/<br> Instaladores </th>
            <th>L3 Arq./Diseñadores</th>
            <th>L4 Proy. <br> Grandes/Hoteles</th>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $fabricantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($f->fabricante); ?></td>
            <td>
                <input type="text" class="form-control mask-dec" id="factor_hc_<?php echo e($f->id); ?>" onchange="guarda_costo(<?php echo e($f->id); ?>,'factor_hc')" value="<?php echo e($f->factor_hc); ?>">
            </td>
            <td><input type="text" class="form-control mask-dec" id="lp1_<?php echo e($f->id); ?>" onchange="guarda_costo(<?php echo e($f->id); ?>,'lp1')" value="<?php echo e($f->lp1); ?>"></td>
            <td><input type="text" class="form-control mask-dec" id="lp2_<?php echo e($f->id); ?>" onchange="guarda_costo(<?php echo e($f->id); ?>,'lp2')" value="<?php echo e($f->lp2); ?>"></td>
            <td><input type="text" class="form-control mask-dec" id="lp3_<?php echo e($f->id); ?>" onchange="guarda_costo(<?php echo e($f->id); ?>,'lp3')" value="<?php echo e($f->lp3); ?>"></td>
            <td><input type="text" class="form-control mask-dec" id="lp4_<?php echo e($f->id); ?>" onchange="guarda_costo(<?php echo e($f->id); ?>,'lp4')" value="<?php echo e($f->lp4); ?>"></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/fabricantes/table_costos.blade.php ENDPATH**/ ?>