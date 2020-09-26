@extends('layouts.master') 
@section('content')
<br> 
<style type="text/css">
    .td-2px{padding: 2px;}
</style>
Cot: {{$num_cotizacion}}
<div class="col-md-12" id="cotiza_table">
	  @include('cotizador.table')		
</div>
	<div class="col-md-12">
		<fieldset class="checkboxsas">
          <label><input type="checkbox" value="1"  name=""> Enviar cotización producto.  </label>
        </fieldset>
        <fieldset class="checkboxsas">
          <label><input type="checkbox" value="1"  name=""> Enviar cotización instalación.  </label>
        </fieldset>
        <fieldset class="checkboxsas">
          <label><input type="checkbox" value="1"  name=""> Generar OCC proveedor.  </label>
        </fieldset>
    </div>
 <div class="col-md-12">
    <label>
    	<ul style="font-size: 10px; font-family: sans-serif;">
    		<li>EN PRODUCTOS MADRE (SET) SUFIJOS CON PRODUCTOS ASIGNADOS Y SE ADAPTAN AL FINISH DE LA COTIZACION. PARA PRODUCTOS DESIGNER EN DEPENDENCIAS LOS SUFIJOS SE PRESENTAN EN GRUPOS ASI COMO LOS COLORES PARA SER SELECCION.</li>
    		<li>DESCUENTO SOLO SOBRE EL PRODUCTO</li>
    	</ul>
    </label>
</div>

@endsection