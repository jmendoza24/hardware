<?php if($tipo==1): ?>
<?php ($i = 1); ?>
 <div class="card collapse-icon accordion-icon-rotate left">
  	<?php $__currentLoopData = $subcategorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <div id="headingCollapse<?php echo e($s->id); ?>" class="card-header">
      <a data-toggle="collapse" href="#collapse<?php echo e($s->id); ?>" aria-expanded="true" aria-controls="collapse<?php echo e($s->id); ?>"
      class="card-title lead"><?php echo e($s->subcategoria); ?></a>
    </div>
    <div id="collapse<?php echo e($s->id); ?>" role="tabpanel" aria-labelledby="headingCollapse<?php echo e($s->id); ?>" class="collapse <?php echo e($i==1 ? 'show':''); ?>">
      <div class="card-content">
        <div class="card-body" id="catalogo_<?php echo e($s->id); ?>">
          	<table class="table table-bordered table-striped" style="width: 100%;">
				<thead>
					<tr>
						<th>Subcategoria</th>
						<th>Color</th>
						<td>Costo</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $colores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($c->subcategoria == $s->id): ?>
						<tr>
							<td><?php echo e($c->nombre_sub); ?></td>
							<td><span class="badge badge-info" onclick="ver_catalogo(18,<?php echo e($c->id); ?>,2)" data-toggle="modal" data-backdrop="false" data-target="#primary"><?php echo e($c->color); ?></span></td>
							<td>$ <?php echo e(number_format($c->costo,2)); ?></td>
							<td>
								<span class="btn btn-sm btn-outline-danger"  onclick="elimina_catalogo(18,<?php echo e($c->id); ?>,'colores',<?php echo e($c->subcategoria); ?>)"><i class="fa fa-trash"></i></span>
							</td>
						</tr>
						<?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
        </div>
      </div>
    </div>
    <?php ($i += 1); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php elseif($tipo==2): ?>
<table class="table table-bordered table-striped" style="width: 100%;">
	<thead>
		<tr>
			<th>Subcategoria</th>
			<th>Color</th>
			<td>Costo</td>
			<td></td>
		</tr>
	</thead>
	<tbody>
		<?php $__currentLoopData = $colores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($c->nombre_sub); ?></td>
				<td><span class="badge badge-info" onclick="ver_catalogo(18,<?php echo e($c->id); ?>,2)" data-toggle="modal" data-backdrop="false" data-target="#primary"><?php echo e($c->color); ?></span></td>
				<td>$ <?php echo e(number_format($c->costo,2)); ?></td>
				<td>
					<span class="btn btn-sm btn-outline-danger"  onclick="elimina_catalogo(18,<?php echo e($c->id); ?>,'colores',<?php echo e($c->subcategoria); ?>)"><i class="fa fa-trash"></i></span>
				</td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</tbody>
</table>
<?php endif; ?><?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/emtek_subcat/table.blade.php ENDPATH**/ ?>