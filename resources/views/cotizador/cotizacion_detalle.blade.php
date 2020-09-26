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
			<td colspan="9"></td>
			<td colspan="3">Modificación</td>
			<td colspan="3">Instalación</td>
		</tr>
		<tr style="border:2px solid #67A957; color: white; background:#67A957; ">
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
			<td style="text-align: left; font-weight: bold;">
				{{$p->item_nom}}
			</td>
			<td>{{ $p->posicion}}</td>
			<td>{{$p->bks}}</td>
			<td>{{$p->door_t}}</td>
			<td>{{ str_replace('xxx', $p->finish, $p->codigo_sistema)}}</td>
			<td>{{ number_format($p->lp + $p->sum_lp,2)}}</td>
			<td>{{ number_format($p->phc + $p->sum_phc,2)}}</td>
			<td>{{ number_format($p->pvc + $p->sum_pvc,2)}}</td>
			<td>{{$p->cantidad}}</td>
			<td class="text-right"> <label > ${{ number_format(($p->pvc * $p->cantidad) + $p->sum_pvc,2)}}</label></td>
			<td>{{$p->mod_precio_unit}}</td>
			<td>{{$p->mod_cantidad}}</td>
			<td class="text-right"><label>${{ number_format($p->mod_precio_unit*$p->mod_cantidad,2)}}</label></td>
			<td>{{$p->inst_precio_unit}}</td>
			<td>{{$p->inst_cantidad}}</td>
			<td class="text-right"><label>${{ number_format($p->inst_precio_unit*$p->inst_cantidad,2)}}</label></td>
		</tr>
		@php($subtotal_dl   += ($p->pvc * $p->cantidad) + $p->sum_pvc)
		@php($subtotal_dl_1 += $p->mod_precio_unit * $p->mod_cantidad)
		@php($subtotal_ps   += $p->inst_precio_unit * $p->inst_cantidad)
		@endforeach
		<tr>
			<td colspan="6" class="color"></td>
			<td style="background:#67A957; color: white; ">Total:</td>
			<td colspan="3" class="text-right">${{number_format($subtotal_dl,2)}}</td>
			<td colspan="3" class="text-right">${{number_format($subtotal_dl_1,2)}}</td>
			<td colspan="3" class="text-right">${{number_format($subtotal_ps,2)}}</td>
		</tr>
		<tr>
			<td  colspan="10" rowspan="4" style="background: white; border:2px solid white;" ></td>
			<td  style="background:#67A957; color: white;">Subtotal:</td>
			@php($subtotal_dolares = $subtotal_dl + $subtotal_dl_1)
			<td colspan="2" class="text-right">${{number_format($subtotal_dolares,2)}}</td>
			<td colspan="2"></td>
			<td colspan="" class="text-right">${{number_format($subtotal_ps,2)}}</td>
		</tr>
		<tr>
			<td style="background:#67A957; color: white; ">Descuento:</td>
			<td >{{$cotizacion->descuento_usa}}</td>
			<td class="text-right" >
				<span style="color: red;">-${{number_format(($subtotal_dolares * $cotizacion->descuento_usa)/100,2)}}</span><br>
				@php($desc_usa = $subtotal_dolares - ($subtotal_dolares * $cotizacion->descuento_usa)/100)
				${{number_format($desc_usa,2)}}</td>
			<td colspan="2">{{$cotizacion->descuento_mx}}</td>
			<td class="text-right" >
				<span style="color: red;">-${{number_format(($subtotal_ps * $cotizacion->descuento_mx)/100,2)}}</span><br>
				@php($desc_mx = $subtotal_ps - ($subtotal_ps * $cotizacion->descuento_mx)/100)
				${{number_format($desc_mx,2)}}</td>
		</tr>
		<tr>
			<td style="background:#67A957; color: white; ">Iva:</td>
			<td >
				{{$cotizacion->iva_usa}}
			</td>
			<td class="text-right">
				<span style="color: #67A957;">+${{number_format(($desc_usa * $cotizacion->iva_usa)/100,2)}}</span>
			</td>
			<td colspan="2">
				{{$cotizacion->iva_mx}}
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