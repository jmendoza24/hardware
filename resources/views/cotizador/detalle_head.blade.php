

<table class="table small table-striped table-bordered">
	<tr>
		<td colspan="4" style="text-align: right;"></td>
		<td class="gris_tabla"> IdFab: </td>
		<td>
			@if($producto->info == 5)
			{{ $detalle->id_fab}}
			@else
			{{ str_replace('xxx', $info_adic->finish,  $producto->codigo_sistema)}}
			@endif
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
			<?php $finish_1 = $info_adic->finish_1 !='' ? explode(',',($info_adic->finish_1)) : array();
				  $finish_2 = $info_adic->finish_2 !='' ? explode(',',($info_adic->finish_2)) : array();
				  $finish_3 = $info_adic->finish_3 !='' ? explode(',',($info_adic->finish_3)) : array();
				  $finish_4 = $info_adic->finish_4 !='' ? explode(',',($info_adic->finish_4)) : array();
			 ?>
			<select class="form-control form-control-sm" id="det_finish" style="width: 100px;" onchange="guarda_detalle({{$info_adic->id_detalle}})">
				<option value="">Seleccione...</option>
					@foreach($finish_1 as $f1)
						<option value="{{$f1}}" {{$f1==$info_adic->finish?'selected':''}}>{{$f1}}</option>
					@endforeach
						@foreach($finish_2 as $f2)
						<option value="{{$f2}}" {{$f2==$info_adic->finish?'selected':''}}>{{$f2}}</option>
						@endforeach
						@foreach($finish_3 as $f3)
						<option value="{{$f3}}" {{$f3==$info_adic->finish?'selected':''}}>{{$f3}}</option>
						@endforeach
					@foreach($finish_4 as $f4)
					<option value="{{$f4}}" {{$f4==$info_adic->finish?'selected':''}}>{{$f4}}</option>
					@endforeach
			</select>
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
			{{$info_adic->sufijo}}
		</td>
		<td class="gris_tabla">Foto:</td>
		<td>@if($fotos->foto != '')<a href="/storage/{{$fotos->foto }}" target="_blank">Ver Foto</a>@else Sin fotos @endif</td>
	</tr>
	<tr>
		<td class="gris_tabla">Diseño:</td>
		<td>{{ $informacion->disenio}}</td>
		<td class="gris_tabla">Handing</td>
		<td>
			@if($producto->info == 5)
			<select id="handing" class="form-control form-control-sm" style="width: 100px;" onchange="guarda_detalle({{$info_adic->id_detalle}})">
				<option value="">Seleccione...</option>
				<option value="LH" {{$detalle->handing=='LH'?'selected':''}}>LH</option>
				<option value="RH" {{$detalle->handing=='RH'?'selected':''}}>RH</option>
			</select>
			@else
			<input type="hidden" id="handing" value="{{ $info_adic->handing}}">
			{{ $info_adic->handing}}
			@endif
		</td>
		<td class="gris_tabla">Descripción:</td>
		<td>{{$producto->descripcion}}</td>
	</tr>
	<tr>
		<td class="gris_tabla">Descripción:</td>
		<td></td>
		<td class="gris_tabla">Style</td>
		<td>
			@if($producto->info != 5)
			<?php 
			  $style_1 = $info_adic->style_1 !='' ? explode(',',($info_adic->style_1)) : array();
			  $style_2 = $info_adic->style_2 !='' ? explode(',',($info_adic->style_2)) : array();
			  $style_3 = $info_adic->style_3 !='' ? explode(',',($info_adic->style_3)) : array();
			  
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
			<select class="form-control form-control-sm" id="det_style" style="width: 100px;" onchange="guarda_detalle({{$info_adic->id_detalle}})">
				<option value="">Seleccione..</option>
				@foreach($style_1 as $s1)
					<option value="{{$s1}}" {{$s1==$info_adic->style?'selected':''}}>{{$s1}}</option>
				@endforeach
				@foreach($style_2 as $s2)
				<option value="{{$s2}}" {{$s2==$info_adic->style?'selected':''}}>{{$s2}}</option>
				@endforeach
				@foreach($style_3 as $s3)
				<option value="{{$s3}}" {{$s3==$info_adic->style?'selected':''}}>{{$s3}}</option>
				@endforeach
			</select>
			@endif
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