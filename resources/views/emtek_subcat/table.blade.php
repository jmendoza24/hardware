@if($tipo==1)
@php($i = 1)
 <div class="card collapse-icon accordion-icon-rotate left">
  	@foreach($subcategorias as $s)

    <div id="headingCollapse{{$s->id}}" class="card-header">
      <a data-toggle="collapse" href="#collapse{{ $s->id}}" aria-expanded="true" aria-controls="collapse{{$s->id}}"
      class="card-title lead">{{ $s->subcategoria}}</a>
    </div>
    <div id="collapse{{$s->id}}" role="tabpanel" aria-labelledby="headingCollapse{{$s->id}}" class="collapse {{ $i==1 ? 'show':''}}">
      <div class="card-content">
        <div class="card-body" id="catalogo_{{$s->id}}">
          	<table class="table table-bordered table-striped" style="width: 100%;">
				<thead>
					<tr>
						<th>Subcategoria</th>
						<th>Color</th>
						<td>Costo</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					@foreach($colores as $c)
						@if($c->subcategoria == $s->id)
						<tr>
							<td>{{ $c->nombre_sub}}</td>
							<td><span class="badge badge-info" onclick="ver_catalogo(18,{{ $c->id}},2)" data-toggle="modal" data-backdrop="false" data-target="#primary">{{ $c->color}}</span></td>
							<td>$ {{ number_format($c->costo,2)}}</td>
							<td>
								<span class="btn btn-sm btn-outline-danger"  onclick="elimina_catalogo(18,{{$c->id}},'colores',{{ $c->subcategoria}})"><i class="fa fa-trash"></i></span>
							</td>
						</tr>
						@endif
					@endforeach
				</tbody>
			</table>
        </div>
      </div>
    </div>
    @php($i += 1)
    @endforeach
</div>

@elseif($tipo==2)
<table class="table table-bordered table-striped" style="width: 100%;">
	<thead>
		<tr>
			<th>Subcategoria</th>
			<th>Color</th>
			<td>Costo</td>
			<td></td>
		</tr>
	</thead>
	<tbody>
		@foreach($colores as $c)
			<tr>
				<td>{{ $c->nombre_sub}}</td>
				<td><span class="badge badge-info" onclick="ver_catalogo(18,{{ $c->id}},2)" data-toggle="modal" data-backdrop="false" data-target="#primary">{{ $c->color}}</span></td>
				<td>$ {{ number_format($c->costo,2)}}</td>
				<td>
					<span class="btn btn-sm btn-outline-danger"  onclick="elimina_catalogo(18,{{$c->id}},'colores',{{ $c->subcategoria}})"><i class="fa fa-trash"></i></span>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endif