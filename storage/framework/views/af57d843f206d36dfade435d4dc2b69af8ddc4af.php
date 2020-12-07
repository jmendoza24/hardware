<form id="catalogos_forma" action="">
	<?php echo csrf_field(); ?>
	<input type="hidden" name="id_catalogo" value="9">
	<input type="hidden" name="id" value="<?php echo e($disenios->id); ?>">
	<!-- Fabricante Field -->
	<input type="hidden" class="form-control" id="subcategoria" name="subcategoria" value="<?php echo e($disenios->subcategoria); ?>">
	<!-- Catalogo Field -->
	<div class="form-group col-sm-12">
	    <?php echo Form::label('disenio', 'Diseño:'); ?>

	    <input type="text" required="" name="disenio" class="form-control" id="disenio" value="<?php echo e($disenios->disenio); ?>">
	</div>
	<hr>
	<div class="form-group col-sm-12">
		<span class="btn btn-primary pull-right" onclick="guarda_catalogo(9,<?php echo e($disenios->id); ?>,1,'disenios')">Guardar</span>
	</div>
</form> 
<?php /**PATH /home/altermed/public_html/hardwarecollection.mx/laravel/resources/views/disenios/fields.blade.php ENDPATH**/ ?>