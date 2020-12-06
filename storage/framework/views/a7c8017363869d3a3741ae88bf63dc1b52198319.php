<form id="catalogos_forma" action="">
	<?php echo csrf_field(); ?>
	<input type="hidden" name="id_catalogo" value="3">
	<input type="hidden" name="id" value="<?php echo e($categorias->id); ?>">
	<input type="hidden" name="familia" id="familia" value="<?php echo e($categorias->familia); ?>">
	<!-- Catalogo Field -->
	<div class="form-group col-sm-12">
	    <?php echo Form::label('categoria', 'Categoria:'); ?>

	    <input type="text" required="" name="categoria" class="form-control" id="categoria" value="<?php echo e($categorias->categoria); ?>">
	</div>
	<hr>
	<div class="form-group col-sm-12">
		<span class="btn btn_azul pull-right" onclick="guarda_catalogo(3,<?php echo e($categorias->id); ?>,1,'categorias')">Guardar</span>
	</div>
</form> 
<?php /**PATH /home/altermed/public_html/hardwarecollection.mx/laravel/resources/views/categorias/fields.blade.php ENDPATH**/ ?>