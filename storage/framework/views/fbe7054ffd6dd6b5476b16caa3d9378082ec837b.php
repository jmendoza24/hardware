<?php $__env->startSection('titulo'); ?> Catalogos <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row" style="text-align: center; display: none;" id="tablas_catalogos">
    	<div class="col-md-2">
    		<label>Catalogos</label>
    		<table class="table table-striped table-bordered file-export2" id="items-table">
			    <thead>
			        <tr class="gris_tabla">
			            <th>Fabricante</th>
			            <th>IdFabricante</th>
			            <th>Catalogos</th>
			            <th>IdCatalogos</th>
			            <th>Familia</th>
			            <th>IdFamilia</th>
			            <th>Categoria</th>
			            <th>IdCategoria</th>
			            <th>Subategoria</th>
			            <th>IdSubcategoria</th>
			            <th>Diseño</th>
			            <th>IdDiseño</th>
			            <th>Item</th>
			            <th>IdItem</th>
			        </tr>
			    </thead>
			    <tbody>
			    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		            <tr>
		            	<td><?php echo e($item->fabricante); ?></td>
		                <td><?php echo e($item->id_fabricante); ?></td>
		                <td><?php echo e($item->catalogo); ?></td>
		                <td><?php echo e($item->id_catalogos); ?></td>
		                <td><?php echo e($item->familia); ?></td>
		                <td><?php echo e($item->id_familia); ?></td>
		                <td><?php echo e($item->categoria); ?></td>
		                <td><?php echo e($item->id_categoria); ?></td>
		                <td><?php echo e($item->subcategoria); ?></td>
		                <td><?php echo e($item->id_subcategoria); ?></td>
		                <td><?php echo e($item->disenio); ?></td>
		                <td><?php echo e($item->id_disenio); ?></td>
		                <td><?php echo e($item->item); ?></td>
		                <td><?php echo e($item->id_item); ?></td>
			        </tr>
			    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
			    </tbody>
			</table>
    	</div>
    	
    	<div class="col-md-2">
    		<label>Grupos</label>
    		<table class="table table-striped table-bordered file-export2" id="items-table">
			    <thead>
			        <tr class="gris_tabla">
			            <th>Fabricantes</th>
			            <th>Varibale</th>
			            <th>Grupos</th>
			            <th>Opciones</th>
			            <th>Idgrupo</th>
			        </tr>
			    </thead>
			    <tbody>
			    <?php $__currentLoopData = $sub_baldwins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grupo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		            <tr>
		            	<td><?php echo e($grupo->fabricante); ?></td>
		            	<td>
		                	<?php if($grupo->id_fabricante==77): ?>
		                		<?php $__currentLoopData = $variable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
				                    <?php echo e($key== $grupo->variable?$value:''); ?>

				                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				             <?php elseif($grupo->id_fabricante==76): ?>
				             	<?php $__currentLoopData = $variable2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $value2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
				                    <?php echo e($key2== $grupo->variable?$value2:''); ?>

				                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				            <?php endif; ?>
				        </td>
		            	<td><?php echo $grupo->grupo; ?></td>
						<td><?php echo $grupo->opciones; ?></td>
		            	<td><?php echo e($grupo->id_grupo); ?></td>
			        </tr>
			    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
			    </tbody>
			</table>
    	</div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
	<script type="text/javascript">
		$( document ).ready(function() {
			$.blockUI({message: '<h5>Generando exceles espere...</h5>'});
		   $('.file-export2').DataTable({
		        dom: 'Bfrtip',
		        "paging": false,
		        buttons: ['excelHtml5']
		    });
    
    	$('.buttons-excel').addClass('btn btn-outline-primary');

		   $(".dataTables_filter").hide();
		   $(".file-export2").hide();
		   $(".dataTables_info").hide();
		    setTimeout(
			  function() {
			    $("#tablas_catalogos").show();
			    $.unblockUI();
			  }, 5000);
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/productos/download_catalogos.blade.php ENDPATH**/ ?>