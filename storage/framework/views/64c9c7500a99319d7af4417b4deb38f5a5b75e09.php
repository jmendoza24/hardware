<form id="catalogos_forma" action="" enctype="multipart/form-data">
<?php echo csrf_field(); ?>
<input type="hidden" name="id_catalogo" value="11">
<div class="form-group col-sm-12">
    <?php echo Form::label('familia', 'Archivo a cargar:'); ?>

    <input type="file" class="form-control" name="file_upload">
</div>

<hr>
<div class="form-group col-sm-12">
    <span class="btn btn_azul pull-right" onclick="guarda_catalogo(11,0,1,'productos')">Cargar</span>
</div>
<?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/productos/show.blade.php ENDPATH**/ ?>