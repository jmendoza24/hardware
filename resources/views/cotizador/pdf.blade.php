
<table   style="width: 100%; font-family: sans-serif; color:white; border-collapse: collapse;">
     <tr style="width: 100%;" >
        <td style="background-color: #000000; text-align: center; "><label style="font-size: 26px;"><b>Hardware<br> Collection</b></label></td>
        <td style="background-color: #5C8293; "><label style="font-family:sans-serif; font-size: 11px; ">Calzada San Pedro # 108<br>San Pedro Garza García, N,L, México, 66220<br>+52 (81) 8378 0601 <br/> info@hardwarecollection.mx</label></td>
        <td style="background-color: #5C8293; ">{{ substr($cot->created_at,0,10)}}<br> <label style="font-size: 20px; "> Cotización #{{$cot->id_cot}}</label><br></td>
     </tr>
     <tr style="background: #D2D2D2; color:#5C8293; font-size: 11px;">
        <td>Proyecto: {{ $cot->proyecto }}<br> Participante: {{ $cot->contacto }}<br>Empresa: {{ $cot->empresa }}</td>
        <td>Correo:  {{ str_replace(';', ' ',  $cot->correo) }}<br>Teléfono: {{ $cot->telefono }}<br></td>
        <td>Cotización válida  hasta {{ date("d-m-Y",strtotime($cot->created_at."+ 30 days")) }}</td>
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
    Tipo 2
  @endif
  <br><br>
<table   style="width: 100%; font-family: sans-serif; text-align: justify; font-size: 11px; color:#5C8293;">
   <tr style="" >
      <td valign="top"> <?php echo nl2br($data->condiciones); ?></td>
      <td valign="top" style="color: red;"> <?php echo nl2br($data->notas); ?></td>
      <td valign="top" style="display: none;"> <?php echo nl2br($data->cuentas); ?></td>
   </tr>
</table>

