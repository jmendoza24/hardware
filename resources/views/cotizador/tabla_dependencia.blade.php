<div class="col-md-12">
	<table class="table table-striped padding-table table-bordered">
		<tr>
			<td colspan="7"> </td>
			<td class="gris_tabla">Dependencia:</td>
			<td style="text-align: right;">${{number_format($suma_dependencias->sum_lp,2)}}</td>
			<td style="text-align: right;">${{number_format($suma_dependencias->sum_phc,2)}}</td>
			<td style="text-align: right;">${{number_format($suma_dependencias->sum_pvc,2)}}</td>
		</tr>
		<tr style="text-align: center;" class="gris_tabla">
			<td></td>
			<td>Item</td>
			<td>Color</td> 
			<td>Sufijo</td>
			<td>IdFab</td>
			<td>Descripción</td>
			<td style="width: 9%;">LP</td>
			<td style="width: 9%;">Ctd</td>
			<td style="width: 9%;">LP</td>
			<td style="width: 9%;">PHC</td>
			<td style="width: 9%;">PVC</td>
		</tr>
		@foreach($dependencias as $d)
		
		<?php 
			$elementos = array(1,2,3,5,6,7,9,11,13,14);
			$elementos2 = array(4,8,10,12);
			$caracteres = array('xxx','XXX','-')
		?>
		<tr>
			<td>
				{{$d->catagolo}} 
			</td>
			<td>
				<?php
				 	$items = $d->elemento !='' ? explode(',',($d->elemento)) : array();
				 	/**if(count($items)==1){
					  	$items1 = $items[0] !='' ? explode('.',($items[0])) : array();
					} */
				?> 
				@if($d->id_catalogo == 12 || $d->id_catalogo == 18)
				<input type="text" id="item_{{$d->id_catalogo}}" style="width: 100px;" class="form-control form-control-sm" onchange="guarda_datos({{$d->id}},{{$d->id_catalogo}})">
				@else
					<select class="form-control form-control-sm" id="item_{{$d->id_catalogo}}" style="width: 100px;" onchange="muestra_sufijo_ext({{$d->id_catalogo}}); guarda_datos({{$d->id}},{{$d->id_catalogo}});">
						<option value="">...</option>
						@foreach($items as $t)
						<?php $t1 = $t != '' ? explode('.',$t) : array();?>	
						@if(count($t1)>0)
						 	<option value="{{trim($t)}}" {{$d->item_seleccionado == trim($t)?'selected':''}}>{{$t1[0]}} @if(isset($t1[2])) [{{$t1[2]}}] @endif</option>
						@endif
						@endforeach
					</select>		
				@endif
			</td>
			<td>
				<?php 
					$colores = $d->colores_gral !='' ? explode(',',($d->colores_gral)) : array();
				 ?>
				@if($d->id_catalogo==12 || $d->id_catalogo == 18)
				<input type="text" id="color_{{$d->id_catalogo}}" style="width: 90px;" class="form-control form-control-sm" onchange="guarda_datos({{$d->id}},{{$d->id_catalogo}})">
				@else 
					@if($d->item=='-')
					-
					@elseif(in_array($d->id_catalogo, $elementos) && count($items)==0 && strtolower($d->color) != 'xxx' )
						<label id="color_{{$d->id_catalogo}}">{{$d->color}}</label>
						<input type="hidden" id="color_{{$d->id_catalogo}}" value="{{$d->color}}">
					@elseif(in_array($d->id_catalogo, $elementos) && count($items)>0 )
						<select class="form-control form-control-sm" id="color_{{$d->id_catalogo}}" style=" width: 90px; @if(in_array($d->id_catalogo, $elementos2)) display:none; @endif " onchange="guarda_datos({{$d->id}},{{$d->id_catalogo}})">
							<option value="">Seleccione...</option>
							@if(count($colores)>0)
								@foreach($colores as $c)
								<option value="{{trim($c)}}" {{$c==$d->color?'selected':''}}>{{$c}}</option>
								@endforeach
							@endif
						</select>
					@else
					-
					@endif	
				@endif
			</td>
			<td>
				@if($d->id_catalogo==12 || $d->id_catalogo == 18)
					<input type="text" id="sufijo_{{$d->id_catalogo}}" style="width: 50px;" class="form-control form-control-sm" onchange="guarda_datos({{$d->id}},{{$d->id_catalogo}})">
				@else
					<?php $sufijos = $d->sufijos_gral !='' ? explode(',',($d->sufijos_gral)) : array(); ?>
					
					@if(in_array($d->id_catalogo, $elementos) && strtolower($d->sufijo) != 'xxx')
					<label id="sufijo_{{$d->id_catalogo}}">{{ $d->sufijo != 0? $d->sufijo :''}}</label>
					@else 
					<label id="sufijo_{{$d->id_catalogo}}">-</label>
					@endif
				@endif			
			</td>
			<td>{{$d->idfab}}</td>
			<td>{{$d->descripcion}}</td>
			<td style="text-align: right;">${{ number_format($d->lp,2)}}</td>
			<td>
				<input type="text" id="cantidad_{{$d->id_catalogo}}" class="form-control form-control-sm cantidad-mask text-right" style="width:80px" onchange="guarda_datos({{$d->id}},{{$d->id_catalogo}})" value="{{$d->ctd}}">
			</td>
			<td style="text-align: right;">
				<label id="lp_{{$d->id_catalogo}}">{{number_format($d->lp * $d->ctd,2)}}</label>
			</td>
			<td style="text-align: right;"><label id="phc_{{$d->id_catalogo}}">{{number_format($d->phc * $d->ctd,2)}}</label></td>
			<td style="text-align: right;"><label id="lpv_{{$d->id_catalogo}}">{{number_format($d->pvc * $d->ctd,2)}}</label></td>
		</tr>
		@endforeach
	</table>
</div>