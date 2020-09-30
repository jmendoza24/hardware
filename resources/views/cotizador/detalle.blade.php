<div class="row">
	<div class="col-md-12">
	@foreach($items as $i)
		<span class="btn btn-outline-success" onclick="agrega_producto({{$i->id}})" style="cursor: pointer;">{{$i->item_nom}}-{{$i->sufijo}}</span>
	@endforeach
	</div>
	<div class="col-md-12">
		<br>
		{{ $existe }}
		@if($existe==1)
			@foreach($fotos as $fotos)
			https://desarrollos.hardwarecollection.mx/storage/{{ $fotos->foto }}
					<img src="{{ url('https://desarrollos.hardwarecollection.mx/storage/$fotos->foto')}}" style="width: 100%;">		
			@endforeach
		@else
				<img src="{{ url('app-assets/images/carousel/01.jpg')}}" style="width: 100%;">		

		@endif

		

	</div>	
	
	<div class="col-md-12">
		<br>
		<button class="btn btn-primary pull-right" >Agregar</button>		
	</div>
</div>



