<form id="catalogos_forma" action="">
	<?php echo csrf_field(); ?>
	<input type="hidden" name="id_catalogo" value="2">
	<input type="hidden" name="id" value="<?php echo e($familias->id); ?>">
    <input type="hidden"  name="catalogo" id="catalogo" value="<?php echo e($familias->catalogo); ?>">
    
    <div class="form-group col-sm-12">
        <?php echo Form::label('familia', 'Familia:'); ?>

        <input type="text" class="form-control" name="familia" id="familia" value="<?php echo e($familias->familia); ?>">
    </div>

    <hr>
    <div class="form-group col-sm-12">
        <span class="btn btn_azul pull-right" onclick="guarda_catalogo(2,<?php echo e($familias->id); ?>,1,'familias')">Guardar</span>
    </div>
<?php /**PATH /home/altermed/public_html/hardwarecollection.mx/laravel/resources/views/familias/fields.blade.php ENDPATH**/ ?>