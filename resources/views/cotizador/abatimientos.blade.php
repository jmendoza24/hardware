<style type="text/css">
	#titulos_tab td{padding: 5px;}
</style>
<table class="table table-bordered table-striped" id="titulos_tab">
	<tr>
		<td class="gris_tabla">Proyecto:</td>
		<td>{{ $cotizacion->nombre_corto}}</td>
		<td class="gris_tabla">Cotización:</td>
		<td><b>@if($cotizacion->id_hijo != '') {{$cotizacion->id_hijo . '.'.$cotizacion->ver}} @else {{ $cotizacion->id .'.'}} @endif</b></td>
		<td class="gris_tabla">Fecha:</td>
		<td> {{$cotizacion->fecha}}</td>
	</tr> 
	<tr><td class="gris_tabla">Participante: </td>
		<td> {{ $cotizacion->contacto  }}</label></td>
		<td class="gris_tabla">OC Cliente: </td>
		<td> <b>{{ $cotizacion->id_occ}} </b>	</td>		
		<td colspan="2"></td>
	</tr>
	@if($cotizacion->abatimiento==1 && $vista != 2)
	<tr>
		<td colspan="6" class="gris_tabla">
			<b>Datos de confirmación</b><br>
			Nombre: {{ $cotizacion->nombre}}<br>
			Correo confirmacion: {{ $cotizacion->correo}}<br>
			Fecha confirmación: {{ $cotizacion->fecha_abatimiento}}<br>
			Email enviado : {{ $cotizacion->email_enviado}}

		</td>
	</tr>
	@endif
</table>
<hr>
<table class="table table-striped table-bordered small text-center">
	<tr style="background: #5C8293; color: white;">
		<td colspan="2"><span class="btn btn-sm btn-outline-primary white" onclick="configura_abatimiento({{ $cotizacion->id }},2,{{$vista=='' ? 1 : $vista}})">+ Abatimiento</span> </td>
		<td style="padding:6px;"><b>I/LH</b></td>
		<td style="padding:6px;"><b>I/RH</b></td>
		<td style="padding:6px;"><b>O/LH</b></td>
		<td style="padding:6px;"><b>O/RH</b></td>
		<td style="padding:6px;"><b>POCKET</b></td>
		<td style="padding:6px;"><b>VAIVEN</b></td>
	</tr>
	@php($i = 1)
	@foreach($abtimiento as $a)
	<tr> 
		@if($i < 4)
		<td style="padding:10px;">
			<input type="text" class="form-control form-control-sm" id="puerta_{{$a->id}}" style="" value="{{$a->puerta}}" onchange="guarda_abatimiento({{$a->id}},{{$cotizacion->id}})" >
		</td>
		<td style="padding:10px;">
			@if($i==1)
			<span class="btn btn-sm btn-outline-info" style=" float: right;" onclick="muestra_abatimiento()"><i class="fa fa-info"></i></span>
			@endif

			<select class="form-control form-control-sm" id="sel_{{$a->id}}" style="width: 60%; float: left;" onchange="guarda_abatimiento({{$a->id}},{{$cotizacion->id}})">
				<option value="CL" {{$a->sel == 'CL' ? 'selected':''}}>CL</option>
				<option value="TG" {{$a->sel == 'TG' ? 'selected':''}}>TG</option>
				<option value="TC" {{$a->sel == 'TC' ? 'selected':''}}>TC</option>
			</select>
		</td>
		@else 
		<td style="padding:10px;" colspan="2">
			<input type="text" style="width: 80%; float: left;" class="form-control form-control-sm" id="puerta_{{$a->id}}" style="" value="{{$a->puerta}}" onchange="guarda_abatimiento({{$a->id}},{{$cotizacion->id}})" > &nbsp;
			<span style="float: right;" class="btn btn-sm btn-outline-danger" onclick="elimina_elemento({{$a->id}},{{$cotizacion->id}})"><i class="fa fa-trash"></i></span>
		</td>
		@endif
		<td style="padding:6px;"><input type="radio" name="p_{{$a->id}}" id="p_{{$a->id}}" {{$a->valor == 'I/LH'? 'checked' :''}} value="I/LH" onclick="guarda_abatimiento({{$a->id}},{{$cotizacion->id}})"></td>
		<td style="padding:6px;"><input type="radio" name="p_{{$a->id}}" id="p_{{$a->id}}" {{$a->valor == 'I/RH'? 'checked' :''}} value="I/RH" onclick="guarda_abatimiento({{$a->id}},{{$cotizacion->id}})"></td>
		<td style="padding:6px;"><input type="radio" name="p_{{$a->id}}" id="p_{{$a->id}}" {{$a->valor == 'O/LH'? 'checked' :''}} value="O/LH" onclick="guarda_abatimiento({{$a->id}},{{$cotizacion->id}})"></td>
		<td style="padding:6px;"><input type="radio" name="p_{{$a->id}}" id="p_{{$a->id}}" {{$a->valor == 'O/RH'? 'checked' :''}} value="O/RH" onclick="guarda_abatimiento({{$a->id}},{{$cotizacion->id}})"></td>
		<td style="padding:6px;"><input type="radio" name="p_{{$a->id}}" id="p_{{$a->id}}" {{$a->valor == 'POCKET'? 'checked' :''}} value="POCKET" onclick="guarda_abatimiento({{$a->id}},{{$cotizacion->id}})"></td>
		<td style="padding:6px;"><input type="radio" name="p_{{$a->id}}" id="p_{{$a->id}}" {{$a->valor == 'VAIVEN'? 'checked' :''}} value="VAIVEN" onclick="guarda_abatimiento({{$a->id}},{{$cotizacion->id}})"></td>
	</tr>
	@php($i +=1)
	@endforeach
</table>

@if($vista == 2)
<div class="row">
<form action="{{ route('guarda.abatimiento')}}" class="form-row" method="post">
	<input type="hidden" name="id" value="{{ $cotizacion->id}}">
	@csrf
		<label class="col-md-12 " style="color: red; font-size: 14px">Confirme la configuración,  ingresando su nombre y correo.</label>
		<div class="col-md-5">
			<input type="text" name="nombre" required="" class="form-control mr-1" placeholder="Nombre completo">
		</div>
		<div class="col-md-5">
			<input type="text" name="email" required="" class="form-control mr-1" placeholder="E-mail">
		</div>
		<div class="col-md-2">
			<input type="submit" class="btn btn-primary" value="Firmar" >
		</div>
	</div>
</form>
@else
<div class="row">
	<div class="col-md-10">
		<input type="text" id="email" class="form-control" value="{{ $cotizacion->correo}}">
	</div>
	<div class="col-md-2">
		<span class="btn btn-primary pull-right" onclick="enviar_abatimiento({{ $cotizacion->id}})">Enviar</span>
	</div>

</div>
@endif