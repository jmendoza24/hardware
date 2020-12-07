<style type="text/css">
	.padding-table{
     padding: 6px;
     font-size: 11px;
	}
	.color{border: 2px solid white; color: gray; text-align: right;}

	.gris_tabla{color: #5C8293; }
</style>
<div id="detalle_head">
	<?php echo $__env->make('cotizador.detalle_head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>		
</div>
<?php if(sizeof($dependencias)>0): ?>
	<div class="row" id="tabla_dependencias">
		<?php echo $__env->make('cotizador.tabla_dependencia', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</div>
<?php endif; ?>



<?php /**PATH /home/altermed/public_html/hardwarecollection.mx/laravel/resources/views/cotizador/info_producto.blade.php ENDPATH**/ ?>