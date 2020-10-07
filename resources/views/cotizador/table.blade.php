@php($subtotal_dl = 0)
@php($subtotal_dl_1 = 0)
@php($subtotal_ps = 0)
@php($p_unit = 1000)
<style type="text/css">
	.table th, .table td {
     padding: 6px;
	}
	.color{border: 2px solid white; color: gray; text-align: right;}
</style>
	<table class="table table-striped small row-border" style="font-size: 13px;" id="" border="0">
		<tr style="border-top: 2px solid white; background:white;">
			<td colspan="11"><span class="badge badge-primary">Cotización {{ $num_cotizacion}}</span></td>
			<td colspan="3">Modificación</td>
			<td colspan="3">Instalación</td>
		</tr>
		<tr style="border:2px solid #67A957; color: white; background:#67A957; ">
			<td></td>
			<td>Item</td>
			<td>Posición</td>
			<td>BKS</td>
			<td>Door T.</td>
			<td>Fab</td>
			<td>LP</td>
			<td>PHC</td>
			<td>PVC</td>
			<td>Ctd</td>
			<td>Total</td> 
			<td>PU</td>
			<td>Ctd</td>
			<td>Total</td>
			<td>PU</td>
			<td>Ctd</td>
			<td>Total</td>
		</tr>
		@foreach($productos as $p)
		<tr>
			<td>
				<span class="btn btn-sm btn-outline-danger" style="cursor: pointer;" onclick="elimina_producto({{$p->id}})">
				<i class="fa fa-trash"></i></span>
			</td>
			<td style="text-align: left; font-weight: bold;">
				{{$p->item_nom}}
			</td>
			<td>
				<input type="text" name="posicion_{{$p->id}}" value="{{ $p->posicion}}" id="posicion_{{$p->id}}" class="form-control form-control-sm" onchange="guarda_info_cotizacion({{$p->id}})">
			</td>
			<td>
				@php($selectores = explode(',',$p->selector))
				<select id="bks_{{$p->id}}" class="form-control form-control-sm" style="width: 50px;" onchange="guarda_info_cotizacion({{$p->id}})">
					<option value="">...</option>
					@foreach($selectores as $s)
					<option value="{{$s}}" {{$s==$p->bks?'selected':''}}>{{$s}}</option>
					@endforeach
				</select>
			</td>
			<td>
				<input type="text" name="doort_{{$p->id}}" id="doort_{{$p->id}}" value="{{$p->door_t}}" class="form-control form-control-sm" min="1" onchange="guarda_info_cotizacion({{$p->id}})">
			</td>
			<td>
				{{ str_replace('xxx', $p->finish, $p->codigo_sistema)}}
				<span class="pull-right btn-group">
					<span class="btn btn-sm btn-outline-primary" data-toggle="modal" data-backdrop="false" data-target="#primary" style="cursor: pointer; font-size: 12px;" onclick="agregar_dependencia({{$p->idproducto}},{{$p->id}})"><i class="fa fa-info"></i></span>
					<span class="btn btn-sm btn-outline-success" onclick="agrega_producto({{ $p->idproducto}})"><i class="fa fa-plus"></i></span>
				</span>
			</td>
			<td>{{ number_format($p->lp + $p->sum_lp,2)}}</td>
			<td>{{ number_format($p->phc + $p->sum_phc,2)}}</td>
			<td>{{ number_format($p->pvc + $p->sum_pvc,2)}}</td>
			<td>
				<input type="text" id="pro_cant_{{$p->id}}" value="{{$p->cantidad}}" class="form-control form-control-sm cantidad-mask text-right"  onchange="guarda_info_cotizacion({{$p->id}})" style="width: 50px;">
			</td>
			<td class="text-right"> <label > ${{ number_format(($p->pvc * $p->cantidad) + $p->sum_pvc,2)}}</label></td>
			<td><input type="text" id="mod_pre_unit_{{$p->id}}" value="{{$p->mod_precio_unit}}" class="form-control form-control-sm p_unit-mask text-right" onchange="guarda_info_cotizacion({{$p->id}})" style="width: 90px;"></td>
			<td><input type="text" id="mod_cant_{{$p->id}}" class="form-control form-control-sm cantidad-mask text-right" value="{{$p->mod_cantidad}}" onchange="guarda_info_cotizacion({{$p->id}})" style="width: 50px;"></td>
			<td class="text-right"><label>${{ number_format($p->mod_precio_unit*$p->mod_cantidad,2)}}</label></td>
			<td><input type="text" id="inst_pre_unit_{{$p->id}}" class="form-control form-control-sm p_unit-mask" value="{{$p->inst_precio_unit}}" onchange="guarda_info_cotizacion({{$p->id}})" style="width: 90px;"></td>
			<td><input type="text" id="inst_cant_{{$p->id}}" class="form-control form-control-sm cantidad-mask text-right" value="{{$p->inst_cantidad}}" onchange="guarda_info_cotizacion({{$p->id}})" style="width: 50px;"></td>
			<td class="text-right"><label>${{ number_format($p->inst_precio_unit*$p->inst_cantidad,2)}}</label></td>
		</tr>
		@php($subtotal_dl   += ($p->pvc * $p->cantidad) + $p->sum_pvc)
		@php($subtotal_dl_1 += $p->mod_precio_unit * $p->mod_cantidad)
		@php($subtotal_ps   += $p->inst_precio_unit * $p->inst_cantidad)
		@endforeach
		<tr>
			<td colspan="7" class="color"></td>
			<td style="background:#67A957; color: white; ">Total:</td>
			<td colspan="3" class="text-right">${{number_format($subtotal_dl,2)}}</td>
			<td colspan="3" class="text-right">${{number_format($subtotal_dl_1,2)}}</td>
			<td colspan="3" class="text-right">${{number_format($subtotal_ps,2)}}</td>
		</tr>
		<tr>
			<td  colspan="11" rowspan="4" style="background: white; border:2px solid white;" ></td>
			<td  style="background:#67A957; color: white;">Subtotal:</td>
			@php($subtotal_dolares = $subtotal_dl + $subtotal_dl_1)
			<td colspan="2" class="text-right">${{number_format($subtotal_dolares,2)}}</td>
			<td colspan="2"></td>
			<td colspan="" class="text-right">${{number_format($subtotal_ps,2)}}</td>
		</tr>
		<tr>
			<td style="background:#67A957; color: white; ">Descuento:</td>
			<td ><input type="text" id="descuento_usa" class="form-control form-control-sm desc-mask" style="width: 55px;" value="{{$cotizacion->descuento_usa}}" onchange="guardar_descuentos()"></td>
			<td class="text-right" >
				<span style="color: red;">-${{number_format(($subtotal_dolares * $cotizacion->descuento_usa)/100,2)}}</span><br>
				@php($desc_usa = $subtotal_dolares - ($subtotal_dolares * $cotizacion->descuento_usa)/100)
				${{number_format($desc_usa,2)}}</td>
			<td colspan="2"><input type="text" id="descuento_mx" class="form-control form-control-sm desc-mask pull-right" value="{{$cotizacion->descuento_mx}}" style="width: 55px;" onchange="guardar_descuentos()"></td>
			<td class="text-right" >
				<span style="color: red;">-${{number_format(($subtotal_ps * $cotizacion->descuento_mx)/100,2)}}</span><br>
				@php($desc_mx = $subtotal_ps - ($subtotal_ps * $cotizacion->descuento_mx)/100)
				${{number_format($desc_mx,2)}}</td>
		</tr>
		<tr>
			<td style="background:#67A957; color: white; ">IVA:</td>
			<td >
				<select class="form-control form-control-sm" id="iva_usa" style="width: 55px;" onchange="guardar_descuentos()">
					<option value="0" {{$cotizacion->iva_usa==0?'selected':''}}>0</option>
					<option value="8" {{$cotizacion->iva_usa==8?'selected':''}}>8</option>
					<option value="16" {{$cotizacion->iva_usa==16?'selected':''}}  >16</option>
				</select>
			</td>
			<td class="text-right">
				<span style="color: #67A957;">+${{number_format(($desc_usa * $cotizacion->iva_usa)/100,2)}}</span>
			</td>
			<td colspan="2">
				<select class="form-control form-control-sm pull-right" id="iva_mx" style="width: 55px;" onchange="guardar_descuentos()">
					<option value="0" {{$cotizacion->iva_mx==0?'selected':''}}>0</option>
					<option value="8" {{$cotizacion->iva_mx==8?'selected':''}}>8</option>
					<option value="16"{{$cotizacion->iva_mx==16?'selected':''}}>16</option>
				</select>
			</td>
			<td class="text-right">
				<span style="color: #67A957;">+${{number_format(($desc_mx * $cotizacion->iva_mx)/100,2)}}</span>
			</td>
		</tr>
		<tr>
			<td style="background:#67A957; color: white; ">Total:</td>
			<td ></td>
			<td class="text-right">${{number_format($desc_usa + (($desc_usa * $cotizacion->iva_usa)/100),2)}}</td>
			<td colspan="2" ></td>
			<td class="text-right">${{number_format($desc_mx + (($desc_mx * $cotizacion->iva_mx)/100),2)}}</td>
		</tr>
	</table>