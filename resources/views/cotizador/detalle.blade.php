<div class="row">
	<div class="col-md-12">
	@foreach($items as $i)
		<span class="btn btn-outline-success" onclick="agrega_producto({{$i->id}})" style="cursor: pointer;">{{$i->item_nom}}-{{$i->sufijo}}</span>
	@endforeach
	</div>
	<div class="col-md-12">
		<img src="/storage/{{ $fotos->foto}}" style="width: 100%;">		
	</div>	
	
	<div class="col-md-12">
		<br>
		<button class="btn btn-primary pull-right" >Agregar</button>		
	</div>
</div>



