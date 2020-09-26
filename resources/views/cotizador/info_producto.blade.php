<style type="text/css">
	.padding-table{
     padding: 6px;
     font-size: 11px;
	}
	.color{border: 2px solid white; color: gray; text-align: right;}
</style>
<div id="detalle_head">
	@include('cotizador.detalle_head')		
</div>
@if(sizeof($dependencias)>0)
	<div class="row" id="tabla_dependencias">
		@include('cotizador.tabla_dependencia')
	</div>
@endif
