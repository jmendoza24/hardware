<form id="catalogos_forma" action="">
	<?php echo csrf_field(); ?>
	<input type="hidden" name="id_catalogo" value="10">
	<input type="hidden" name="id" value="<?php echo e($items->id); ?>">
	<!-- Fabricante Field -->
	<input type="hidden" class="form-control" id="disenio" name="disenio" value="<?php echo e($items->disenio); ?>">
	<!-- Catalogo Field -->
	<div class="form-group col-sm-12">
	    <?php echo Form::label('item', 'Item:'); ?>

	    <input type="text" name="item" id="item" class="form-control" value="<?php echo e($items->item); ?>">
	</div>
	<hr>
	<div class="form-group col-sm-12">
		<span class="btn btn_azul pull-right" onclick="guarda_catalogo(10,<?php echo e($items->id); ?>,1,'items')">Guardar</span>
	</div>
</form> 

<?php /**PATH /home/altermed/public_html/hardwarecollection.mx/laravel/resources/views/items/fields.blade.php ENDPATH**/ ?>