<input type="hidden" id="id_info" value="{{$producto->info}}">
<table class="table small table-striped table-bordered">
	<tr style="text-align: center;">
		<td colspan="6"></td>
		<td><b>LP</b></td>
		<td><b>PHC</b></td>
		<td><b>PVC</b></td>
	</tr>
	<tr>
		<td colspan="@if($producto->info == 7 || $producto->info == 4 || $producto->info == 6 || $producto->info == 5) 2 @else 4 @endif" style="text-align: left;"><span class="badge badge-primary" style="font-size: 14px;"> {{$producto->info}} </span></td>
		@if($producto->info == 7 || $producto->info == 4 || $producto->info == 6)
		<td class="gris_tabla">
			<?php 
				$det_grupo = $detalle->det_grupo !='' ? explode(',',($detalle->det_grupo)) : array();
				$f_grupo = $detalle->f_grupo !='' ? explode(',',($detalle->f_grupo)) : array();
			?>
			<select class="form-control form-control-sm" title="DT" id="dt_g" onchange="guarda_detalle({{$info_adic->id_detalle}})" style="width: 100px;">
				<option value="">DC EMK</option>
				@foreach($det_grupo as $d)
					<option value="{{$d}}" {{ $detalle->det == $d? 'selected': ''}}>{{$d}}</option>
				@endforeach
			</select>
		</td>
		<td style="width: 200px;" class="gris_tabla">
			<div class="row">
				@if($producto->info != 4 and $producto->info != 6)
				<div class="col-md-5">
					<select class="form-control form-control-sm" style="width: 80px;" title="F" id="f_g" onchange="guarda_detalle({{$info_adic->id_detalle}})">
					<option value="">Mortise</option>
					@foreach($f_grupo as $f)
						<option value="{{$f}}" {{ $detalle->f == $f? 'selected': ''}}>{{$f}}</option>
					@endforeach
					</select>
				</div>
				@endif
				@if($producto->latch_ext == 1)
					<div class="col-md-5"><label><input type="checkbox" id="latch_ext" {{ $detalle->latch==1 ? 'checked' :''}} style="margin-top: 5px;" onclick="guarda_detalle({{$info_adic->id_detalle}})" > Latch </label></div>
				@endif
			</div>
		</td>
		@elseif($producto->info ==5)
		<td><b>NRP[<b>$5</b>]</b></td>
		<td><input type="checkbox" id="nrp" {{ $detalle->nrp ==1 ? 'checked':''}} onchange="guarda_detalle({{$info_adic->id_detalle}})"></td>
		@endif
		<td class="gris_tabla"> SKU: </td>
		<td>
			{{ $detalle->id_fab}}
		</td>
		<td style="text-align:right; width: 9%;">${{ number_format($detalle->lp,2)}}</td>
		<td style="text-align:right; width: 9%;">${{ number_format($detalle->phc,2)}}</td>
		<td style="text-align:right; width: 9%;">${{ number_format($detalle->pvc,2)}}</td>
	</tr>
	<tr>
		<td class="gris_tabla">Fabricante:</td>
		<td>{{ $informacion->fabricante}}</td>
		<td class="gris_tabla">Item:</td>  
		<td>{{$informacion->item}}</td>
		<td class="gris_tabla">Página:</td>
		<td>{{$producto->pagina}}</td>
		<td colspan="3" rowspan="4"></td>
	</tr> 
	<tr>
		<td class="gris_tabla">Categoria:</td>
		<td>{{ $informacion->categoria}}</td>
		<td class="gris_tabla">Finish:</td>
		<td>
			 @if($producto->info== 1 || $producto->info == 2)
			 	<label style="font-size: 13px;"> <input type="checkbox" id="finish_all" onchange="actualiza_finish({{$detalle->id}},{{$detalle->id_cotizacion}},'{{$info_adic->finish}}')" > <b>{{$info_adic->finish}}</b></label>
			 	@else
			 	{{ $detalle->finish}}
			 @endif
			 
		</td>
		<td class="gris_tabla">Nota: </td>
		<td>{{$producto->nota}}</td>
	</tr>
	<tr>
		<td class="gris_tabla">Sub. Categoria:</td>
		<td>{{ $informacion->subcategoria}}</td>
		<?php # $sufijo = $info_adic->sufijo !='' ? explode(',',($info_adic->sufijo)) : array();?>
		<td class="gris_tabla">Sufijo:</td>
		<td>
			{{$detalle->sufijo}}
		</td>
		<td class="gris_tabla">Foto:</td>
		<td>@if($fotos->foto != '')<a href="/storage/{{$fotos->foto }}" target="_blank">Ver Foto</a>@else Sin fotos @endif</td>
	</tr>
	<tr>
		<td class="gris_tabla">Diseño:</td>
		<td>{{ $informacion->disenio}}</td>
		<td class="gris_tabla">Handing:</td>
		<td>
			{{ $detalle->handing}}
		</td>
		<td class="gris_tabla">Descripción:</td>
		<td>{{$producto->descripcion}}</td>
	</tr>
	<tr>
		<td class="gris_tabla">Descripción:</td>
		<td></td>
		<td class="gris_tabla">Style:</td>
		<td>
			@if($producto->info != 5 && $producto->info != 7)
			<?php 
			
			  $ext_trim = $info_adic->ext_trim !='' ? explode(',',($info_adic->ext_trim)) : array();
			  $int_escutch =  $info_adic->int_escutch !='' ? explode(',',($info_adic->int_escutch)) : array();
			  $knob_lever =  $info_adic->knob_lever !='' ? explode(',',($info_adic->knob_lever)) : array();
			  $spindle =  $info_adic->spindle !='' ? explode(',',($info_adic->spindle)) : array();
			  
			  if(count($ext_trim)==1){
			  	$ext_trim1 = $ext_trim[0] !='' ? explode('.',($ext_trim[0])) : array();
			  }

			  if(count($int_escutch)==1){
			  	$int_escutch1 = $int_escutch[0] !='' ? explode('.',($int_escutch[0])) : array();
			  }

			  if(count($knob_lever)==1){
			  	$knob_lever1 = $knob_lever[0] !='' ? explode('.',($knob_lever[0])) : array();
			  }

			  if(count($spindle)==1){
			  	$spindle1 = $spindle[0] !='' ? explode('.',($spindle[0])) : array();
			  }

			?>
			
			@endif
			{{ $detalle->style_sel}}
		</td>
		<td colspan="2" style="background: #5C8293; border-left: 1px solid #5C8293; color: white; text-align: right; ">
			<span class="pull-left"><?php 
				switch ($cotizacion->lista_precio) {
				  case 1:
				    echo "L1 Walkin/Showroom";
				    break;
				  case 2:
				    echo "L2 Carpinteros/Instaladores";
				    break;
				  case 3:
				    echo "L3 Arq./Diseñadores";
				    break;
				  case 4:
				    "L4 Proy.Grandes/Hoteles";
				    break;
				  default:
				    echo "Sin lista de precio";
				}
			?>
			</span>
			<b class="pull-right">Total:</b></td>
		<td style="background: #5C8293; border-left: 2px solid #5C8293; color: white; text-align: right;">${{ number_format($detalle->lp + $suma_dependencias->sum_lp,2)}}</td>
		<td style="background: #5C8293; border-left: 2px solid #5C8293; color: white; text-align: right;">${{ number_format($detalle->phc + $suma_dependencias->sum_phc,2)}}</td>
		<td style="background: #5C8293; border-left: 2px solid #5C8293; color: white; text-align: right;">${{ number_format($detalle->pvc + $suma_dependencias->sum_pvc,2)}}</td>
	</tr>
</table>