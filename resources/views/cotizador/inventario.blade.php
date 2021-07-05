<div class="col-md-12">
	<table class="table table-bordered table-striped padding-table" > 
		<tr>
			<td class="gris_tabla" style="font-size:13px !important;">OCC</td>
			<td><span style="font-size:14px; font-weight: bold;">{{ $cotizacion->id_occ}}</span> ({{ substr($cotizacion->fecha,0,10)}})</td>
			<td class="gris_tabla" style="font-size:13px !important;">Cliente</td>
			<td>{{ $cotizacion->contacto}}</td>
		</tr> 
		<tr>
			<td class="gris_tabla" style="font-size:13px !important;">Cotización</td>
			<td><span style="font-size:14px; font-weight: bold;">{{ $cotizacion->id_hijo != '' ? $cotizacion->id_hijo . '.'. $cotizacion->ver : $cotizacion->id}} </span> ({{ substr($cotizacion->created_at,0,10)}})</td>
			<td class="gris_tabla" style="font-size:13px !important;">Proyecto</td>
			<td>{{ $cotizacion->nombre}}</td>
		</tr>
	</table>
</div>
<div class="col-md-12" >
	<table class="table table-bordered padding-table" id="table-inv" border="1">
		<tr class="" style="text-align:center; background: #5C8293; color: white; font-size: 12px;">
			<td></td>
			<td>SKU</td>
			<td>Fabricante</td>
			<td>Mod</td>
			<td>Finish</td>
			<td>DT</td>
			<td>BKS</td>
			<td>HND</td>
			<td>LP</td>
			<td>CTD</td>
			<td>I1</td>
			<td>CTD1</td>
			<td>I2</td>
			<td>CTD2</td>
			<td>OCF</td>
		</tr>
		@php($conte = 0)
		@php($cant_1 = 0)
		@php($cant_2 = 0)
		@php($cant_ocf = 0)
		@foreach($detalle as $d) 
		<tr>
			<td>{{ $d->id}}</td>
			<td>{{ str_replace('xxx', $d->finish, $d->id_fab)}}</td>
			<td>{{ $d->abrev}}</td>
			<td>{{ $d->mod_cantidad >  0 ? 'Si':'No'}}</td>
			<td>{{ $d->finish}}</td>
			<td>{{ $d->door_t}}</td>
			<td>{{ $d->bks}}</td>
			<td>{{ $d->handing}}</td>
			<td class="text-right">${{ number_format($d->lp + $d->sum_lp,2)}}</td>
			<td class="text-center">{{ $d->cantidad}}</td>
			<td class="text-center" style="background:#d2d2d2;">0</td>
			<td class="text-center"><input type="text" class="form-control form-control-sm cantidad-mask" onchange="guarda_inventario({{$d->id}},1)" style="margin: auto; width: 60px;" id="cant1_i1_{{$d->id}}" value="{{ isset($d->inv1)?$d->inv1:0}}"></td>
			<td class="text-center" style="background:#d2d2d2;">0</td>
			<td class="text-center"><input type="text" class="form-control form-control-sm cantidad-mask" onchange="guarda_inventario({{$d->id}},1)" style="margin: auto; width: 60px;" id="cant1_i2_{{$d->id}}" value="{{ isset($d->inv2)?$d->inv2:0}}"></td>
			<td class="text-center"><input type="text" class="form-control form-control-sm cantidad-mask" onchange="guarda_inventario({{$d->id}},1)" style="margin: auto; width: 60px;" id="cant1_ocf_{{$d->id}}" value="{{ isset($d->ocf)?$d->ocf:0}}"></td>
		</tr>
		@php($conte +=  $d->cantidad)
		@php($cant_1 += $d->inv1)
		@php($cant_2 += $d->inv2)
		@php($cant_ocf += $d->ocf)
		@endforeach
		<tr><td colspan="14" class="bg-secondary"></td></tr>
		@foreach($dependencias as $d) 
		<tr>
			<td>{{ $d->id_detalle}}</td>
			<td>{{ $d->codigo_sistema}}</td>
			<td>{{ $d->abrev}}</td>
			<td>-</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td class="text-right">${{ number_format($d->lp,2)}}</td>
			<td class="text-center">{{ $d->ctd}}</td>
			<td class="text-center" style="background:#d2d2d2;">0</td>
			<td class="text-center"><input type="text" class="form-control form-control-sm cantidad-mask" onchange="guarda_inventario({{$d->id}},2)" style="margin: auto; width: 60px;" id="cant2_i1_{{$d->id}}" value="{{ isset($d->inv1)?$d->inv1:0}}"></td>
			<td class="text-center" style="background:#d2d2d2;">0</td>
			<td class="text-center"><input type="text" class="form-control form-control-sm cantidad-mask" onchange="guarda_inventario({{$d->id}},2)" style="margin: auto; width: 60px;" id="cant2_i2_{{$d->id}}" value="{{ isset($d->inv2)?$d->inv2:0}}"></td>
			<td class="text-center"><input type="text" class="form-control form-control-sm cantidad-mask" onchange="guarda_inventario({{$d->id}},2)" style="margin: auto; width: 60px;" id="cant2_ocf_{{$d->id}}" value="{{ isset($d->ocf)?$d->ocf:0}}"></td>
		</tr>
		@php($conte +=  $d->ctd)
		@php($cant_1 += $d->inv1)
		@php($cant_2 += $d->inv2)
		@php($cant_ocf += $d->ocf)
		@endforeach

		<tr style="text-align:center; background: #5C8293; color: white; font-size: 12px;">
			<td colspan="7"></td>
			<td>Total:</td>
			<td class="text-center">{{ $conte}}</td>
			<td colspan="3" class="text-center">{{ number_format($cant_1)}}</td>
			<td class="text-center">{{ number_format($cant_2)}}</td>
			<td class="text-center">{{ number_format($cant_ocf)}}</td>
		</tr>
	</table>
</div>
<hr>
<div class="col-md-12 text-right">
	<span class="btn btn-secondary" data-dismiss="modal">Regresar</span>
	<span class="btn btn-primary" onclick="configura_inventario({{$cotizacion->id}})">Asignar</span>
</div>