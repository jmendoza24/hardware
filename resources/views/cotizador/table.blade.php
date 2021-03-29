
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
<!---- small row-border-->
	<table class="table table-striped mr-1" style="font-size: 11px;" id="" border="0">
		<tr style="border-top: 3px solid white; background:white;">
			<td colspan="9">
				<span class="row">
					<div class="col-md-2">
						<span class="badge badge-primary" style="text-align: left; font-size: 14px;">{{ $cotizacion->id_hijo != '' ? $cotizacion->id_hijo . '.'. $cotizacion->ver : $cotizacion->id}}</span>
					</div>
					<div class="col-md-10">
					<input type="text" id="sp" class="form-control" onkeyup="buscar_productos()">
					<span id="resultado" style="display: none; z-index: 1; position: absolute; width: 100%; font-size: 14px; color: #84807F; padding:20px; max-height: 300px; overflow-y: scroll;"></span>
					</div>
				</span>
			</td>
			<td colspan="7" class="text-center gris_tabla"><b>Producto USD:</b></td>
			<td colspan="3" style="border-left: 3px solid white;" class="text-center gris_tabla"><b>Modificación USD:</b></td>
			<td colspan="3" style="border-left: 3px solid white;" class="text-center gris_tabla"><b>Instalación MXN:</b></td>
		</tr>
		<tr style=" border:2px solid #D2D2D2; text-align: center; " class="gris_tabla">
			<td></td>
			<!--<td>Item</td>-->
			<td>Abrev</td>
			<td>SKU</td>
			<td>Posición</td>
			<td>Descripción</td>
			<td>BKS</td>
			<td>FNS</td>
			<td>SFJ</td>
			<td>STL</td>
			<td>HND</td>
			<td>D.T</td>
			<td>LP</td>
			<td>PHC</td>
			<td>PVC</td>
			<!--<td colspan="2">Inv I II</td>-->
			<td>Ctd</td> 
			{{-- @if($estatus==1)
			<td></td>
			<td></td>
			@endif --}}
			<td>Total</td> 
			<td style="border-left: 3px solid white;">PU</td>
			<td>Ctd</td>
			<td>Total</td>
			<td  style="border-left: 3px solid white;">PU</td>
			<td>Ctd</td>
			<td>Total</td>
		</tr>
		@foreach($productos as $p)
		<tr>
			<td>
				<div class="btn-group mr-1 mb-1">
                    <button type="button" class="btn btn-icon btn-pure dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
                    <div class="dropdown-menu">
                    	<a class="dropdown-item" href="#" data-toggle="modal" onclick="agregar_dependencia({{$p->idproducto}},{{$p->id}})" data-backdrop="false" data-target="#primary" ><i class="fa fa-info info"></i> <b>Info {{$p->info}}</b></a>
                    	<a class="dropdown-item" href="#" onclick="agrega_producto({{ $p->idproducto}})" ><i class="fa fa-plus primary"></i> Duplicar</a>
                    	<a class="dropdown-item" href="#" data-toggle="modal" onclick="ver_imagen({{$p->id_item}})" data-backdrop="false" data-target="#primary" ><i class="fa fa-camera success"></i> Foto</a>
                      	<div class="dropdown-divider"></div>
                      	<a class="dropdown-item" href="#" data-toggle="modal" data-target="#primary"  onclick="configura_inventario({{$p->id}})" ><i class="fa fa-th secondary"></i> Inventario</a>
                      	<a class="dropdown-item" href="#" onclick="elimina_producto({{$p->id}})" ><i class="fa fa-trash danger"></i> Eliminar</a>
                    </div>
                </div>
{{-- 
				<div class="btn-group">
                    <button type="button" class="btn btn-icon btn-pure dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
                    <div class="dropdown-menu">
                    	<ul>
                    	<li  class="dropdown-item"  onclick="elimina_producto({{$p->id}})"><span class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></span></li>
						<li   class="dropdown-item" data-toggle="modal" data-backdrop="false" data-target="#primary" style="cursor: pointer; font-size: 12px;" onclick="agregar_dependencia({{$p->idproducto}},{{$p->id}})"><span class="btn btn-sm btn-outline-primary"><i class="fa fa-info"></i> <b>{{$p->info}}</b></span></li>
						<li   class="dropdown-item" onclick="agrega_producto({{ $p->idproducto}})"><span class="btn btn-sm btn-outline-success"><i class="fa fa-plus"></i></span></li>
						<li    class="dropdown-item"  data-toggle="modal" data-backdrop="false" data-target="#primary" style="cursor: pointer;" onclick="ver_imagen({{$p->id_item}})"><span class="btn btn-sm btn-outline-success"><i class="fa fa-camera" aria-hidden="true"></i></li>        
						</ul>
                    </div>
                 </div> --}}
			</td>
			<!--<td style="text-align: left; font-weight: bold;">
				{{$p->item_nom}}
			</td>-->
			<td>{{$p->abrev}}</td>
			<td>
				{{ str_replace('xxx', $p->finish, $p->id_fab)}}
			</td>
			<td>
				<input type="text" name="posicion_{{$p->id}}" value="{{ $p->posicion}}" id="posicion_{{$p->id}}" class="form-control form-control-sm" onchange="guarda_info_cotizacion({{$p->id}})">
			</td>
			<td>
				<input type="text" name="descripcion_{{$p->id}}" value="{{ $p->descripcion}}" id="descripcion_{{$p->id}}" class="form-control form-control-sm" onchange="guarda_info_cotizacion({{$p->id}})">
			</td>
			<td>
				@php($selectores = explode(',',$p->list_backset))
				<select id="bks_{{$p->id}}" class="form-control form-control-sm" style="width: 70px;" onchange="guarda_info_cotizacion({{$p->id}})">
					<option value="">...</option>
					@foreach($selectores as $s)
					<option value="{{$s}}" {{$s==$p->bks?'selected':''}}>{{$s}}</option>
					@endforeach
				</select>
			</td>
			<td>
					<?php $finish_1 = $p->finish_1 !='' ? explode(',',($p->finish_1)) : array();
						  $finish_2 = $p->finish_2 !='' ? explode(',',($p->finish_2)) : array();
						  $finish_3 = $p->finish_3 !='' ? explode(',',($p->finish_3)) : array();
						  $finish_4 = $p->finish_4 !='' ? explode(',',($p->finish_4)) : array();
					 ?>
					 @if($p->info != 4)
					<select class="form-control form-control-sm" id="det_finish_{{$p->id}}" style="width: 80px;" onchange="guarda_detalle({{$p->id}})">
						<option value="">...</option>
							@foreach($finish_1 as $f1)
								<option value="{{$f1}}" {{$f1==$p->finish?'selected':''}}>{{$f1}}</option>
							@endforeach
								@foreach($finish_2 as $f2)
								<option value="{{$f2}}" {{$f2==$p->finish?'selected':''}}>{{$f2}}</option>
								@endforeach
								@foreach($finish_3 as $f3)
								<option value="{{$f3}}" {{$f3==$p->finish?'selected':''}}>{{$f3}}</option>
								@endforeach
							@foreach($finish_4 as $f4)
							<option value="{{$f4}}" {{$f4==$p->finish?'selected':''}}>{{$f4}}</option>
							@endforeach 
					</select>
					@endif
			</td>
			<td>{{ $p->sufijo}}</td>
			<td>
				@if($p->info != 6 and $p->info != 4)
			<?php 
			  $style_1 = $p->style_1 !='' ? explode(',',($p->style_1)) : array();
			  $style_2 = $p->style_2 !='' ? explode(',',($p->style_2)) : array();
			  $style_3 = $p->style_3 !='' ? explode(',',($p->style_3)) : array();

			?>
			<select class="form-control form-control-sm" id="det_style_{{$p->id}}" style="width: 80px;" onchange="guarda_info_cotizacion({{$p->id}})">
				<option value="">...</option>
				@foreach($style_1 as $s1)
					<option value="{{$s1}}" {{$s1==$p->style_sel?'selected':''}}>{{$s1}}</option>
				@endforeach
				@foreach($style_2 as $s2)
				<option value="{{$s2}}" {{$s2==$p->style_sel?'selected':''}}>{{$s2}}</option>
				@endforeach
				@foreach($style_3 as $s3)
				<option value="{{$s3}}" {{$s3==$p->style_sel?'selected':''}}>{{$s3}}</option>
				@endforeach
			</select>
			@endif
 
			</td>
			<td>
				@php($selectores_hand = explode(',',$p->list_handing))
				@if($p->info != 6)
				<select id="handing_{{$p->id}}" class="form-control form-control-sm" style="width: 60px;" onchange="guarda_info_cotizacion({{$p->id}})">
					<option value="">...</option>
					@if(sizeof($selectores_hand)>0)
						@foreach($selectores_hand as $s)
						<option value="{{$s}}" {{$s==$p->handing?'selected':''}}>{{$s}}</option>
						@endforeach
					@endif
				</select>
				@endif
			</td>
			<td>
				@if($p->info != 3)
				<input type="text" name="doort_{{$p->id}}" id="doort_{{$p->id}}"  style="width: 80px;" value="{{$p->door_t}}" class="form-control form-control-sm" min="1" onchange="guarda_info_cotizacion({{$p->id}})">
				@else
				<select name="doort_{{$p->id}}" id="doort_{{$p->id}}"  style="width: 60px;" value="{{$p->door_t}}" class="form-control form-control-sm"  onchange="guarda_info_cotizacion({{$p->id}})">
					<option value="">...</option>	
					<option value="STD">STD</option>
					<option value="THN">THN</option>
					<option value="THK">THK</option>
				</select>
				@endif
			</td>
			<td class="text-right">${{ number_format($p->lp + $p->sum_lp,2)}}</td>
			<td class="text-right">${{ number_format($p->phc + $p->sum_phc,2)}}</td>
			@php($suma_pv = $p->pvc + $p->sum_pvc)
			<td class="text-right">${{ number_format($suma_pv,2)}}</td>
			{{-- <td>{{ number_format($p->lp + $p->sum_lp,2)}}</td>
			<td>{{ number_format($p->phc + $p->sum_phc,2)}}</td>
			<td>{{ number_format($p->pvc + $p->sum_pvc,2)}}</td> --}}
			<!--<td ><span class="badge badge-primary">{{ $p->inv1}}</span></td>
			<td> <span class="badge badge-primary">{{ $p->inv2}}</span></td>-->
			<td>
				<input type="text" id="pro_cant_{{$p->id}}" value="{{$p->cantidad}}" class="form-control form-control-sm cantidad-mask text-right"  onchange="guarda_info_cotizacion({{$p->id}})" style="width: 50px;">
			</td>
			
			{{-- @if($p->estatus== 1)
			<td>
				<input type="text" id="pro_cant_{{$p->id}}" value="{{$p->cantidad}}" class="form-control form-control-sm cantidad-mask text-right"  onchange="guarda_info_cotizacion({{$p->id}})" style="width: 50px;">
			</td>
			<td><input type="text" id="pro_cant_{{$p->id}}" value="{{$p->cantidad}}" class="form-control form-control-sm cantidad-mask text-right"  onchange="guarda_info_cotizacion({{$p->id}})" style="width: 50px;"></td>
			@endif  --}}
			<td class="text-right"> <label > ${{ number_format($suma_pv * $p->cantidad,2)}}</label></td>
			<td style="border-left: 3px solid white;"><input type="text" id="mod_pre_unit_{{$p->id}}" value="{{$p->mod_precio_unit}}" class="form-control form-control-sm p_unit-mask text-right" onchange="guarda_info_cotizacion({{$p->id}})" style="width: 80px;"></td>
			<td><input type="text" id="mod_cant_{{$p->id}}" class="form-control form-control-sm cantidad-mask text-right" value="{{$p->mod_cantidad}}" onchange="guarda_info_cotizacion({{$p->id}})" style="width: 50px;"></td>
			<td class="text-right"><label>${{ number_format($p->mod_precio_unit*$p->mod_cantidad,2)}}</label></td>
			<td  style="border-left: 3px solid white;"> <input type="text" id="inst_pre_unit_{{$p->id}}" class="form-control form-control-sm p_unit-mask" value="{{$p->inst_precio_unit}}" onchange="guarda_info_cotizacion({{$p->id}})" style="width: 80px;"></td>
			<td><input type="text" id="inst_cant_{{$p->id}}" class="form-control form-control-sm cantidad-mask text-right" value="{{$p->inst_cantidad}}" onchange="guarda_info_cotizacion({{$p->id}})" style="width: 50px;"></td>
			<td class="text-right"><label>${{ number_format($p->inst_precio_unit*$p->inst_cantidad,2)}}</label></td>
		</tr>
		@php($subtotal_dl   += $suma_pv * $p->cantidad)
		@php($subtotal_dl_1 += $p->mod_precio_unit * $p->mod_cantidad)
		@php($subtotal_ps   += $p->inst_precio_unit * $p->inst_cantidad)
		@endforeach
		<tr>
			<td colspan="12" class="color" rowspan="6"></td>
			<td colspan="2" class="gris_tabla">Subtotal:</td>
			<td colspan="2" class="text-right">${{number_format($subtotal_dl,2)}}</td>
			<td colspan="3" class="text-right" style="border-left: 3px solid white;">${{number_format($subtotal_dl_1,2)}}</td>
			<td></td>
			<td colspan="3" class="text-right">${{number_format($subtotal_ps,2)}}</td>
		</tr>
		<tr>
			<td class="gris_tabla" colspan="2">Descuento:</td>
			<td class="text-right" ><input type="text" id="descuento_usa" class="form-control form-control-sm desc-mask" style="width: 55px;" value="{{$cotizacion->descuento_usa}}" onchange="guardar_descuentos()"></td>
			<td class="text-right">
				<span style="color: red;">-${{number_format(($subtotal_dl * $cotizacion->descuento_usa)/100,2)}}</span><br>
				@php($desc_usa = $subtotal_dl - ($subtotal_dl * $cotizacion->descuento_usa)/100)
				${{number_format($desc_usa,2)}}
			</td>
			
			<td  colspan="2" style="border-left: 3px solid white;" ><input type="text" id="descuento_mod" class="form-control form-control-sm desc-mask pull-right" style="width: 55px;" value="{{$cotizacion->descuento_mod}}" onchange="guardar_descuentos()"></td>
			<td class="text-right"  >
				<span style="color: red;">-${{number_format(($subtotal_dl_1 * $cotizacion->descuento_mod)/100,2)}}</span><br>
				@php($desc_mod = $subtotal_dl_1 - ($subtotal_dl_1 * $cotizacion->descuento_mod)/100)
				${{number_format($desc_mod,2)}}
			</td>
			<td colspan="2"  ><input type="text" id="descuento_mx" class="form-control form-control-sm desc-mask pull-right" value="{{$cotizacion->descuento_mx}}" style="width: 55px;" onchange="guardar_descuentos()"></td>
			<td class="text-right" >
				<span style="color: red;">-${{number_format(($subtotal_ps * $cotizacion->descuento_mx)/100,2)}}</span><br>
				@php($desc_mx = $subtotal_ps - ($subtotal_ps * $cotizacion->descuento_mx)/100)
				${{number_format($desc_mx,2)}}
			</td>
		</tr>
		@php($fletes = $cotizacion->flete)
		<tr>
			<td class="text-left gris_tabla"  colspan="2">Flete:</td>
			<td style=" border-left: 3px solid white; text-align: right;"  colspan="2">
				<input type="text" id="flete" class="form-control form-control-sm p_unit-mask text-right" style="width: 100px; float: right;" value="{{ number_format($cotizacion->flete,2) }}" onchange="guardar_descuentos()">
			</td>
			<td style=" border-left: 3px solid white;" class="text-right  white" colspan="6"></td>
		</tr>
		<tr>
			<td class="gris_tabla" colspan="2">IVA:</td>
			<td >
				<select class="form-control form-control-sm" id="iva_usa" style="width: 55px;" onchange="guardar_descuentos()">
					<option value="0" {{$cotizacion->iva_usa==0?'selected':''}}>0</option>
					<option value="8" {{$cotizacion->iva_usa==8?'selected':''}}>8</option>
					<option value="16" {{$cotizacion->iva_usa==16?'selected':''}}  >16</option>
				</select>
			</td>
			@php($iva_desc = (($desc_usa + $fletes) * $cotizacion->iva_usa)/100)
			<td class="text-right">
				<span >+${{number_format($iva_desc,2)}}</span>
			</td>
			<td  colspan="2" style="border-left: 3px solid white; border-left: 3px solid white;">
				<select class="form-control form-control-sm pull-right" id="iva_mod" style="width: 55px;" onchange="guardar_descuentos()">
					<option value="0" {{$cotizacion->iva_mod==0?'selected':''}}>0</option>
					<option value="8" {{$cotizacion->iva_mod==8?'selected':''}}>8</option>
					<option value="16" {{$cotizacion->iva_mod==16?'selected':''}}  >16</option>
				</select>
			</td>
			<td class="text-right">
				<span >+${{number_format(($desc_mod * $cotizacion->iva_mod)/100,2)}}</span>
			</td>
			<td colspan="2"  style="border-left: 3px solid white;">
				<select class="form-control form-control-sm pull-right" id="iva_mx" style="width: 55px;" onchange="guardar_descuentos()">
					<option value="0" {{$cotizacion->iva_mx==0?'selected':''}}>0</option>
					<option value="8" {{$cotizacion->iva_mx==8?'selected':''}}>8</option>
					<option value="16"{{$cotizacion->iva_mx==16?'selected':''}}>16</option>
				</select>
			</td>
			<td class="text-right" colspan="2">
				<span> +${{number_format(($desc_mx * $cotizacion->iva_mx)/100,2)}}</span>
			</td>
		</tr>
		<tr>
			<td class="text-left gris_tabla"  colspan="2">Total:</td>
			<td class="text-right" colspan="2" > ${{number_format($desc_usa + $iva_desc,2)}}</td>
			<td style="border-left: 3px solid white;"  class=" text-right" colspan="3"> ${{number_format($desc_mod + (($desc_mod * $cotizacion->iva_mod)/100),2)}}</td>
			<td  style="border-left: 3px solid white;" class="text-right  " colspan="3"> ${{number_format($desc_mx + (($desc_mx * $cotizacion->iva_mx)/100),2)}}</td>
		</tr>
		<tr  style="background:#5C8293; color: white;" class="text-right">
			<td colspan="4">Gran Total:</td>
			<td colspan="3">USD: ${{ number_format($desc_usa + $iva_desc + $desc_mod + (($desc_mod * $cotizacion->iva_mod)/100) + $cotizacion->flete ,2) }}</td>
			<td colspan="3" style="border-left: 3px solid white;" >+MXN: ${{ number_format($desc_mx + (($desc_mx * $cotizacion->iva_mx)/100),2)}}</td>
		</tr>
	</table>