<table class="table small table-striped table-bordered">
	<tr>
		<td colspan="4" style="text-align: right;"></td>
		<td> IdFab: {{ str_replace('xxx', $info_adic->finish,  $producto->codigo_sistema)}}</td>
	</tr>
	<tr>
		<td>Fabricante:</td>
		<td>{{ $informacion->fabricante}}</td>
		<td>Item:</td>
		<td>{{$informacion->item}}</td>
		<td>Página:{{$producto->pagina}}</td>
	</tr>
	<tr>
		<td>Categoria:</td>
		<td>{{ $informacion->categoria}}</td>
		<td>Finish:</td>
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
					<option value="{{$f4}}" {{$f3==$info_adic->finish?'selected':''}}>{{$f4}}</option>
					@endforeach
			</select>
		</td>
		<td>Nota: {{$producto->nota}}</td>
	</tr>
	<tr>
		<td>Sub. Categoria:</td>
		<td>{{ $informacion->subcategoria}}</td>
		<?php # $sufijo = $info_adic->sufijo !='' ? explode(',',($info_adic->sufijo)) : array();?>
		<td>Sufijo:</td>
		<td>
			{{$info_adic->sufijo}}
		</td>
		<td>@if(sizeof($fotos))<a href="/storage/{{$fotos[0]->foto }}" target="_blank">Ver Foto</a>@else Sin fotos @endif</td>
	</tr>
	<tr>
		<td>Diseño:</td>
		<td>{{ $informacion->disenio}}</td>
		<td>Handing</td>
		<td>{{ $info_adic->handing}}</td>
		<td>
			Descripción: <br/>
			{{$producto->descripcion}}
		</td>
	</tr>
	<tr>
		<td>Descripción:</td>
		<td></td>
		<td>Style</td>
		<td>
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
				@foreach($style_2 as $f2)
				<option value="{{$f2}}" {{$s2==$info_adic->style?'selected':''}}>{{$f2}}</option>
				@endforeach
				@foreach($style_3 as $f3)
				<option value="{{$f3}}" {{$s3==$info_adic->style?'selected':''}}>{{$f3}}</option>
				@endforeach
			</select>
		</td>
		<td></td>
	</tr>
</table>