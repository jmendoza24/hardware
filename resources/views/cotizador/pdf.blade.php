<?php 
$a[1] = "Enero"; 
$a[2] = "Febrero"; 
$a[3] = "Marzo"; 
$a[4] = "Abril"; 
$a[5] = "Mayo"; 
$a[6] = "Junio"; 
$a[7] = "Julio"; 
$a[8] = "Agosto";
$a[9] = "Septiembre";
$a[10] = "Octubre";
$a[11] = "Noviembre";
$a[12] = "Diciembre";
?>
<table   style="width: 100%; font-family: sans-serif; color:white; border-collapse: collapse;">
     <tr style="width: 100%;" >
        <td style="background-color: #000000; text-align: center; "><label style="font-size: 26px;"><b>Hardware<br> Collection</b></label></td>
        <td style="background-color: #5C8293; "><label style="font-family:sans-serif; font-size: 11px; ">Calzada San Pedro # 108<br>San Pedro Garza García, N,L, México, 66220<br>+52 (81) 8378 0601 <br/> info@hardwarecollection.mx</label></td>
        <td style="background-color: #5C8293; font-size: 14px; text-align: right; ">{{ date("d",strtotime(substr($cot->created_at,0,10))) . ' de '. $a[date("m",strtotime(substr($cot->created_at,0,10)))] . ' de '.date("Y",strtotime(substr($cot->created_at,0,10)))}}<br> <label style=""> Cotización #{{$cot->id_cot}}</label><br></td>
     </tr>
     <tr style="background: #D2D2D2; color:#5C8293; font-size: 11px;">
        <td>Proyecto: {{ $cot->proyecto }}<br> Participante: {{ $cot->contacto }}<br>Empresa: {{ $cot->empresa }}</td>
        <td>Correo:  {{ str_replace(';', ' ',  $cot->correo) }}<br>Teléfono: {{ $cot->telefono }}<br></td>
        <td>Cotización válida  hasta {{ date("d",strtotime($cot->created_at)). ' de ' .$a[date("m",strtotime($cot->created_at))+1] . ' de '.date("Y",strtotime($cot->created_at))  }}
        </td>
     </tr> 
</table>
@if($tipo==1)
  <br><br> 
  <table style="width: 100%; font-size: 11px; font-family: sans-serif; border-collapse: collapse; color:#5C8293;" border="0">
    <tr style="background: #D2D2D2;  text-align: center;">
        <td>ID HC</th>
        <td>Descripción</th>
        <td>Piezas</th>
        <td>P.U (P)</th>
        <td>Subtotal</th>
      </tr>
      @php($subtotal = 0)
        @foreach($productos2 as $productos2)
          <tr>
             <td>{{ $productos2->id_hc }}</td>
             <td>{{ $productos2->descripcion }}</td>
             <td style="text-align: center;">{{ $productos2->cantidad }}</td>
             <td style="text-align: right">$  {{ number_format($productos2->pvc ,2)}}</td>
             <td style="text-align: right">$ {{ number_format($productos2->cantidad*$productos2->pvc ,2)}} </td>
          </tr>
          @php($subtotal += $productos2->cantidad*$productos2->pvc)
        @endforeach
        @php($desc = ($subtotal * $cot->descuento_usa)/100)
        @php($iva = (($subtotal -$desc) * $cot->iva_usa)/100)
        <tr>
          <td colspan="3"></td>
          <td style="text-align: right; background: #D2D2D2; color:#5C8293;">Subtotal (USD)</td>
          <td style="text-align: right;">$ {{ number_format($subtotal,2)}}</td>
        </tr>
        @if($cot->descuento_usa > 0)
        <tr>
          <td colspan="3"></td>
          <td style="text-align: right; background: #D2D2D2; color:#5C8293;">Descuento</td>
          <td style="text-align: right;">$ {{ number_format($desc,2) }}</td>
        </tr>
        @endif
        @if($cot->iva_usa > 0)
        <tr>
          <td colspan="3"></td>
          <td style="text-align: right; background: #D2D2D2; color:#5C8293;">Iva</td>
          <td style="text-align: right;">$ {{number_format($iva,2)}}</td>
        </tr>
        @endif
        <tr style="font-size: 14px; font-weight: bold;">
          <td colspan="3"></td>
          <td style="text-align: right; background: #D2D2D2; color:#5C8293;">Total</td>
          <td style="text-align: right;">$ {{ number_format(($subtotal - $desc) + $iva,2)}}</td>
        </tr>
  </table>
  @else
    <table style="width: 100%; font-size: 11px; font-family: sans-serif; border-collapse: collapse; color:#5C8293;" border="0">
      <tr style="background: #D2D2D2;  text-align: center;">
          <td>ID HC</th>
          <td>Descripción</th>
          <td>Piezas</th>
          <td>P.U (P)</th>
          <td>Subtotal</th>
          <td>Subtotal(M)</th>
          <td>Subtotal(I)</th>
        </tr>
        @php($subtotal = 0)
        @php($subtotal_m = 0)
        @php($subtotal_i = 0)
        @php($subtotal_ps = 0)
        @php($descuento_mx = 0)
          @foreach($productos2 as $productos2)
            <tr>
               <td>{{ $productos2->id_hc }}</td>
               <td>{{ $productos2->descripcion }}</td>
               <td style="text-align: center;">{{ $productos2->cantidad }}</td>
               <td style="text-align: right">$ {{ number_format($productos2->pvc ,2)}}</td>
               <td style="text-align: right">$ {{ number_format($productos2->cantidad*$productos2->pvc ,2)}} </td>
               <td style="text-align: right">$ {{ number_format($productos2->mod_precio_unit * $productos2->mod_cantidad,2)}}</td>
               <td style="text-align: right">$ {{ number_format($productos2->inst_precio_unit * $productos2->inst_cantidad,2)}} </td>
            </tr>
            @php($subtotal += $productos2->cantidad*$productos2->pvc)
            @php($subtotal_m += $productos2->mod_precio_unit * $productos2->mod_cantidad)
            @php($subtotal_i += $productos2->inst_precio_unit * $productos2->inst_cantidad)
            @php($subtotal_ps   += $productos2->inst_precio_unit * $productos2->inst_cantidad)
          @endforeach
          @php($desc = ($subtotal * $cot->descuento_usa)/100)
          @php($iva = (($subtotal -$desc) * $cot->iva_usa)/100)
          @php($sub_combinado = $subtotal_m + $subtotal)
          @php($desc_mx = $subtotal_ps - ($subtotal_ps * $cot->descuento_mx)/100)
          @php($iva_mx = $desc_mx * $cot->iva_mx)
          <tr>
            <td colspan="4"></td>
            <td style="text-align: right; ">(USD) $ {{ number_format($subtotal,2)}}</td>
            <td style="text-align: right; ">(USD) $ {{ number_format($subtotal_m,2)}}</td>
            <td style="text-align: right; ">(MX) $ {{ number_format($subtotal_i,2)}}</td>
          </tr>
          <tr>
            <td colspan="4"></td>
            <td style="text-align: right;  background: #D2D2D2; color:#5C8293;">Subtotal</td>
            <td style="text-align: right;  background: #D2D2D2; color:#5C8293;">(USD) $ {{ number_format($sub_combinado,2)}}</td>
            <td style="text-align: right;  background: #D2D2D2; color:#5C8293;">(MX) $ {{ number_format($subtotal_i,2)}}</td>
          </tr>
          @if($cot->descuento_usa > 0)
          <tr>
            <td colspan="4"></td>
            <td style="text-align: right;">Descuento(%)</td>
            <td style="text-align: right;">$ {{ number_format($desc,2) }}</td>
            <td style="text-align: right;">$ {{ number_format($desc_mx,2) }}</td>
          </tr>
          @endif
          @if($cot->iva_usa > 0)
          <tr>
            <td colspan="4"></td>
            <td style="text-align: right;">Iva(%)</td>
            <td style="text-align: right;">$ {{number_format($iva,2)}}</td>
            <td style="text-align: right;">$ {{number_format($iva_mx,2)}}</td>
          </tr>
          @endif
          <tr style="font-size: 14px; font-weight: bold;">
            <td colspan="4"></td>
            <td style="text-align: right; background: #D2D2D2; color:#5C8293;">Total</td>
            <td style="text-align: right;  background: #D2D2D2; color:#5C8293;">$ {{ number_format(($subtotal - $desc) + $iva,2)}}</td>
            <td style="text-align: right;  background: #D2D2D2; color:#5C8293;">$ {{ number_format(($subtotal_i - $desc_mx) + $iva_mx,2)}}</td>
          </tr>
    </table>
  @endif
  <br><br>
<table   style="width: 100%; font-family: sans-serif; text-align: justify; font-size: 11px; color:#5C8293;">
   <tr style="" >
      <td valign="top"> <?php echo nl2br($data->condiciones); ?></td>
      <td valign="top" style="color: red;"> <?php echo nl2br($cot->notas); ?></td>
      <td valign="top" style="display: none;"> <?php echo nl2br($data->cuentas); ?></td>
   </tr>
</table>

