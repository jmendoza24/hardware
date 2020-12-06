<form id="catalogos_forma" action="">
	<?php echo csrf_field(); ?>
	<input type="hidden" name="id_catalogo" value="4">
	<input type="hidden" name="id" value="<?php echo e($subcategorias->id); ?>">
	<input type="hidden" name="categoria" id="categoria" value="<?php echo e($subcategorias->categoria); ?>">

	<!-- Catalogo Field -->
	<div class="form-group col-sm-12">
	    <?php echo Form::label('subcategoria', 'subcategoria:'); ?>

	    <input type="text" required="" name="subcategoria" class="form-control" id="subcategoria" value="<?php echo e($subcategorias->subcategoria); ?>">
	</div>
	<hr>
	<div class="form-group col-sm-12">
		<span class="btn btn_azul pull-right" onclick="guarda_catalogo(4,<?php echo e($subcategorias->id); ?>,1,'subcategorias')">Guardar</span>
	</div>
</form> 
<?php /**PATH /home/altermed/public_html/hardwarecollection.mx/laravel/resources/views/subcategorias/fields.blade.php ENDPATH**/ ?>