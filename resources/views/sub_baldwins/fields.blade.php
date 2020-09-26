<form id="catalogos_forma" action="">
	@csrf
	<input type="hidden" name="id_catalogo" value="6">
	<input type="hidden" name="id" value="{{$selectores->id}}">
	<input type="hidden" id="fabricante" name="fabricante" value="{{ $selectores->fabricante}}">
	
	<div class="form-group col-sm-12">
	    {!! Form::label('variable', 'Variable:') !!}
	    <select class="form-control" id="variable" name="variable">
	    	@foreach ($variable as $key => $value) 
	    	<option value="{{ $key }}" {{ $key== $selectores->variable?'selected':'' }}>{{$value}}</option>                    
            @endforeach
	    </select>
	</div>

	<div class="form-group col-sm-12">
	    {!! Form::label('Subcatalogo', 'Grupo:') !!}
	    <input type="text" required="" name="subcatalogo" class="form-control" id="subcatalogo" value="{{$selectores->subcatalogo}}" onchange="valida_grupo()">
	</div>
	<div class="form-group col-sm-12">
	    {!! Form::label('Selector', 'Opciones:') !!}&nbsp;(<span style="font-size: 11px;"><b>Separado por comas, Sin espacios</b></span>). Ej: AB,CD,EF,H
	    <textarea required="" name="selector" class="form-control" id="selector" >{{$selectores->selector}}</textarea>
	</div>

	<hr>
	<div class="form-group col-sm-12">
		<span class="btn btn-primary pull-right" onclick="guarda_catalogo(6,{{$selectores->id}},1,'baldwins')">Guardar</span>
	</div>
</form> 