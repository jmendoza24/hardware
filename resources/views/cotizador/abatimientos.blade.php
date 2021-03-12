<div class="col-md-12">
	<label>Cliente: {{ $cotizacion->nombre }}</label>
	<span class="pull-right"><b>Cotización: @if($cotizacion->id_hijo != '') {{$cotizacion->id_hijo . '.'.$cotizacion->ver}} @else {{ $cotizacion->id .'.'}} @endif</span></b>
	
</div>

<table class="table table-striped table-bordered small text-center">
	<tr style="background: #5C8293; color: white;">
		<td><span class="btn btn-sm btn-outline-primary white" onclick="configura_abatimiento({{ $cotizacion->id }},2)">+</span> </td>
		<td><b>I/LH</b></td>
		<td><b>I/RH</b></td>
		<td><b>O/LH</b></td>
		<td><b>O/RH</b></td>
		<td><b>POCKET</b></td>
		<td><b>VAIVEN</b></td>
	</tr>
	@foreach($abtimiento as $a)
	<tr> 
		<td><input type="text" class="form-control form-control-sm" id="puerta_{{$a->id}}" style="width: 60px;" value="{{$a->puerta}}" onchange="guarda_abatimiento({{$a->id}},{{$cotizacion->id}})"></td>
		<td><input type="radio" name="p_{{$a->id}}" id="p_{{$a->id}}" {{$a->valor == 'I/LH'? 'checked' :''}} value="I/LH" onclick="guarda_abatimiento({{$a->id}},{{$cotizacion->id}})"></td>
		<td><input type="radio" name="p_{{$a->id}}" id="p_{{$a->id}}" {{$a->valor == 'I/RH'? 'checked' :''}} value="I/RH" onclick="guarda_abatimiento({{$a->id}},{{$cotizacion->id}})"></td>
		<td><input type="radio" name="p_{{$a->id}}" id="p_{{$a->id}}" {{$a->valor == 'O/LH'? 'checked' :''}} value="O/LH" onclick="guarda_abatimiento({{$a->id}},{{$cotizacion->id}})"></td>
		<td><input type="radio" name="p_{{$a->id}}" id="p_{{$a->id}}" {{$a->valor == 'O/RH'? 'checked' :''}} value="O/RH" onclick="guarda_abatimiento({{$a->id}},{{$cotizacion->id}})"></td>
		<td><input type="radio" name="p_{{$a->id}}" id="p_{{$a->id}}" {{$a->valor == 'POCKET'? 'checked' :''}} value="POCKET" onclick="guarda_abatimiento({{$a->id}},{{$cotizacion->id}})"></td>
		<td><input type="radio" name="p_{{$a->id}}" id="p_{{$a->id}}" {{$a->valor == 'VAIVEN'? 'checked' :''}} value="VAIVEN" onclick="guarda_abatimiento({{$a->id}},{{$cotizacion->id}})"></td>
	</tr>
	@endforeach
</table>
<hr>
<div class="row">
	<div class="col-md-10">
		<input type="text" id="email" class="form-control" value="{{ $cotizacion->correo}}">
	</div>
	<div class="col-md-2">
		<span class="btn btn-primary pull-right">Enviar</span>
	</div>
</div>