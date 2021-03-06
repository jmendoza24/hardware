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
        <td style="background-color: #000000; text-align: center; "><img src="{{ url('app-assets/images/logo_completo.jpg')}}" style="width: 150px;"></td>
        <td style="background-color: #5C8293; "><label style="font-family:sans-serif; font-size: 11px; ">Calzada San Pedro # 108<br>San Pedro Garza García, NL, México, 66220<br>+52 (81) 8378 0601 <br/> info@hardwarecollection.mx</label></td>
        <td style="background-color: #5C8293; font-size: 14px; text-align: right; ">{{ date("d",strtotime(substr($cotizacion->created_at,0,10))) . ' de '. $a[date("m",strtotime(substr($cotizacion->created_at,0,10))) * 1] . ' de '.date("Y",strtotime(substr($cotizacion->created_at,0,10)))}}<br> <label style=""> Cotización #{{$cotizacion->id_hijo}} {{ $cotizacion->ver > 0 ? '.'.$cotizacion->ver:''}}</label><br>  <label><b>{{ $tipo_doc}}</b></label></td>
     </tr>
     <tr style="background: #D2D2D2; color:#5C8293; font-size: 11px; padding-top: 3px;">
        <td>Proyecto: {{ $cotizacion->proyecto }}<br> Participante: {{ $cotizacion->contacto }}<br>Empresa: {{ $cotizacion->empresa }}</td>
        <td>Correo:  {{ str_replace(';', ' ',  $cotizacion->correo) }}<br>Teléfono: {{ $cotizacion->telefono }}<br></td>
        <td style="text-align: right;">Cotización válida  hasta <br/> {{ date("d",strtotime($cotizacion->created_at)). ' de ' }} @if(date("m",strtotime($cotizacion->created_at)) == 12) {{ $a[1]}} @else {{$a[date("m",strtotime($cotizacion->created_at)) +1 ] }} @endif  {{' de '}} @if(date("m",strtotime($cotizacion->created_at))==12) {{date("Y",strtotime($cotizacion->created_at)) +1  }} @else {{date("Y",strtotime($cotizacion->created_at)) }} @endif
        </td> 
     </tr> 
</table>
@if($tipo==1) 
  
@php($subtotal_dl = 0)
@php($subtotal_dl_1 = 0)
@php($subtotal_ps = 0)
@php($p_unit = 1000)
<style type="text/css">
  .table th, .table td {
     padding: 6px;
  }
  .color{border: 2px solid white; color: gray; text-align: right;}
</style>
  <table class="table table-striped" style=" border-collapse: collapse; font-size: 11px; width: 100%;font-family: sans-serif;" id="" border="0">
    
    <tr style="background: #D2D2D2; color:#5C8293;text-align: center; ">
      <!--<td>Item</td>-->
      <td>LN</td>
      <td>Posición</td>
      <td>ID HC</td>
      <td>FSH</td>
      <td>HND</td>
      <td>D.T</td>
      <td>Descripción MKT</td>
      <td>Ctd</td> 
      <td>PU</td>
      <td>Subtotal</td> 
    </tr>
    @php($i=1)
    @foreach($productos as $p)

    <tr>
      <td style="text-align: center;">{{ $i }}</td>
      <td>
        {{ $p->posicion}}
      </td>
      <td>
        {{ substr(str_replace('xxx', $p->finish, $p->id_fab),0,6) }}
      </td>
      <td style="text-align: center;">
       {{   $p->finish }}
      </td>
      <td>{{$p->handing}}</td>
      <td> 
        {{$p->door_t}}
      </td>
      <td>
        {{ $p->descripcion}}
      </td>
      <td style="text-align: center;">
        {{$p->cantidad}}
      </td>
      @php($suma_pv = $p->pvc + $p->sum_pvc)
      <td style="text-align:right;">${{ number_format($suma_pv,2)}}</td>
      <td style="text-align:right;"> <label > ${{ number_format($suma_pv * $p->cantidad,2)}}</label></td>

    </tr>
    @php($subtotal_dl   += $suma_pv * $p->cantidad)   
    @php($subtotal_dl_1 += $p->mod_precio_unit * $p->mod_cantidad)
    @php($subtotal_ps   += $p->inst_precio_unit * $p->inst_cantidad)
    @php($i++)
    @endforeach
    <tr >
      <td colspan="8" style="background: #D2D2D2;" ></td>
      <td colspan="" style="background:#D2D2D2; color: #5C8293;">Subtotal:</td>
      <td style="text-align:right; background:#D2D2D2; color: #5C8293;">${{number_format($subtotal_dl,2)}}</td>
    </tr>
    @php($desc_usa = ($subtotal_dl * $cotizacion->descuento_usa)/100)
    @if($cotizacion->descuento_usa > 0)
    <tr>
      <td colspan="8" style="background: #D2D2D2;" ></td>
      <td style="background:#D2D2D2; color: #5C8293;" colspan="">Descuento:</td>
      <td style="text-align:right;">
        
      -  ${{number_format($desc_usa,2)}}
      </td>    
    </tr>
    @endif
    @if($cotizacion->flete > 0)
    <tr>
      <td colspan="8" style="background: #D2D2D2;" ></td>
      <td class="text-left white" style="background:#D2D2D2; color: #5C8293;" colspan="">Flete:</td>
      <td style=" text-align: right;"  colspan="">
       + ${{ number_format($cotizacion->flete,2) }}
      </td>
    </tr>
    @endif
    @php($iva = (($subtotal_dl - $desc_usa + $cotizacion->flete) * $cotizacion->iva_usa)/100)
    @if($cotizacion->iva_usa > 0)
    <tr>
      <td colspan="8" style="background: #D2D2D2;" ></td>
      <td style="background:#D2D2D2; color: #5C8293;" colspan="">IVA:</td>
      <td style="text-align:right;">
        <span >+ ${{number_format($iva,2)}}</span>
      </td>
    </tr>
    @endif
    <tr style="background:#D2D2D2; color: #5C8293;" class="text-right">
      <td colspan="8" style="background: #D2D2D2;" ></td>
      <td colspan=""  >Gran Total:</td>
      <td style="text-align: right;">USD: ${{ number_format($subtotal_dl + $iva - $desc_usa  + $cotizacion->flete ,2) }}</td>
    </tr>
  </table>

@elseif($tipo==2)

@php($subtotal_dl = 0)
@php($subtotal_dl_1 = 0)
@php($subtotal_ps = 0)
@php($p_unit = 1000)
<style type="text/css">
  .table th, .table td {
     padding: 6px;
  }
  .color{border: 2px solid white; color: gray; text-align: right;}
</style>
  <table class="table table-striped" style=" border-collapse: collapse; font-size: 11px; width: 100%;font-family: sans-serif;" id="" border="0">
    <tr style="background: #D2D2D2; color:#5C8293;text-align: center; ">
      <td>LN</td>
      <td>Posición</td>
      <td>ID HC</td>
      <td>FSH</td>
      <td>HND</td>
      <td>D.T</td>
      <td>Descripción MKT</td>
      <td>Ctd</td> 
      <td>PU</td>
      <td>Subtotal</td> 
    </tr>
    @php($i=1)
    @php($j=1)
    @foreach($productos as $p)
    @php($suma_pv = $p->pvc + $p->sum_pvc)
    @if($p->inst_cantidad>0)
    <tr>
      <td style="text-align: center;">{{ $i }}</td>
      <td></td>
      <td style="color: #5C8293;">INST{{ substr(str_replace('xxx', $p->finish, $p->id_fab),0,6) }}</td>
       <td>
       {{   $p->finish }}
      </td>
      <td>{{$p->handing}}</td>
      <td>
        {{$p->door_t}}
      </td>
      <td></td>
      <td style="text-align: center;">{{ $p->inst_cantidad }}</td>
      <td style="text-align: right;">${{ number_format($p->inst_precio_unit,2) }}</td>
      <td style="text-align: right;">${{ number_format($p->inst_precio_unit * $p->inst_cantidad,2) }}</td>
     @php($i++)
  
    </tr>
    @endif
    @php($subtotal_dl   += $suma_pv * $p->cantidad)   
    @php($subtotal_dl_1 += $p->mod_precio_unit * $p->mod_cantidad)
    @php($subtotal_ps   += $p->inst_precio_unit * $p->inst_cantidad)
  
    @endforeach
    @php($desc_mod = $subtotal_dl_1 - ($subtotal_dl_1 * $cotizacion->descuento_mod)/100)
    @php($desc_usa = $subtotal_dl - ($subtotal_dl * $cotizacion->descuento_usa)/100)
    @php($desc_mx = $subtotal_ps - ($subtotal_ps * $cotizacion->descuento_mx)/100)
    <tr style="background: #D2D2D2;">
      <td colspan="8" style="background: #D2D2D2;" ></td>
      <td colspan="" style="background: #D2D2D2; color:#5C8293; ">Subtotal:</td>
      <td style="text-align: right">${{number_format($subtotal_ps,2)}} </td>
    </tr>
    @if($cotizacion->descuento_mx > 0)
    <tr>
      <td colspan="8" style="background: #D2D2D2;" ></td>
      <td style="background: #D2D2D2; color:#5C8293;" colspan="">Descuento:</td>
      <td style="text-align: right;">
      -  ${{number_format($subtotal_ps * $cotizacion->descuento_mx,2)}}
      </td>     
    </tr>
    @endif
    @if($cotizacion->iva_mx > 0)
    <tr>
      <td colspan="8" style="background: #D2D2D2;" ></td>
      <td style="background: #D2D2D2; color:#5C8293; " colspan="">IVA:</td>
      <td style="text-align: right;" colspan="2">
        <span> +${{number_format(($desc_mx * $cotizacion->iva_mx)/100,2)}}</span>
      </td>
    </tr>
    @endif
    
    <tr style="background:#D2D2D2; color: #5C8293;" class="text-right">
      <td colspan="8" style="background: #D2D2D2;" ></td>
      <td colspan="" >Gran Total:</td>
      <td style="text-align: right;">MX: ${{ number_format($desc_mx + (($desc_mx * $cotizacion->iva_mx)/100) ,2) }}</td>
    </tr>
  </table>



  @elseif($tipo==3)




@php($subtotal_dl = 0)
@php($subtotal_dl_1 = 0)
@php($subtotal_ps = 0)
@php($p_unit = 1000)
<style type="text/css">
  .table th, .table td {
     padding: 6px;
  }
  .color{border: 2px solid white; color: gray; text-align: right;}
</style>

  <table class="table table-striped" style=" border-collapse: collapse; font-size: 11px; width: 100%;font-family: sans-serif;" id="" border="0">
    <tr style="background: #D2D2D2; color:#5C8293;text-align: center; ">
      <!--<td>Item</td>-->
      <td>LN</td>
      <td>Posición</td>
      <td>ID HC</td>
      <td>FSH</td>
      <td>HND</td>
      <td>D.T</td>
      <td>Descripción MKT</td>
      <td>Ctd</td> 
      <td>PU</td>
      <td>Subtotal</td> 
    </tr>
    @php($i=1)
    @php($j=1)
    @foreach($productos as $p)

    <tr>
      <td style="text-align: center;">{{ $i }}</td>
      <td>
        {{ $p->posicion}}
      </td>
      <td>
        {{ substr(str_replace('xxx', $p->finish, $p->id_fab),0,6) }}
      </td>
      <td style="text-align: center;">
       {{   $p->finish }}
      </td>
      <td>{{$p->handing}}</td>
      <td>
        {{$p->door_t}}
      </td>
      <td>
        {{ $p->descripcion}}
      </td>
      <td style="text-align: center;">
        {{$p->cantidad}}
      </td>
      @php($suma_pv = $p->pvc + $p->sum_pvc)
      <td style="text-align: right;">${{ number_format($suma_pv,2)}}</td>
      <td style="text-align: right;">${{ number_format($suma_pv * $p->cantidad,2)}}</td>

    </tr>
    @if($p->mod_cantidad>0)
    <tr>
      <td style="text-align: center;">{{ $i+$j }}</td>
      <td></td>
      <td style="color: #5C8293;">MOD{{ substr(str_replace('xxx', $p->finish, $p->id_fab),0,6) }}</td>
       <td style="text-align: center;">
       {{   $p->finish }}
      </td>
      <td style="text-align: center;">
        {{$p->door_t}}
      </td>
      <td></td>
      <td style="text-align: center;">{{ $p->mod_cantidad }}</td>
      <td style="text-align: right;">${{number_format($p->mod_precio_unit,2) }}</td>
      <td style="text-align: right;">${{ number_format($p->mod_precio_unit * $p->mod_cantidad,2) }}</td>
     @php($i++)
  
    </tr>
    @endif
    @php($subtotal_dl   += $suma_pv * $p->cantidad)   
    @php($subtotal_dl_1 += $p->mod_precio_unit * $p->mod_cantidad)
    @php($subtotal_ps   += $p->inst_precio_unit * $p->inst_cantidad)
    @php($i++)
  
    @endforeach
    <tr >
      <td colspan="8" style="background: #D2D2D2;" ></td>
      <td colspan="" style="background:#D2D2D2; color: #5C8293; ">Subtotal:</td>
      <td style="text-align: right; background:#D2D2D2; color: #5C8293;">${{number_format($subtotal_dl + $subtotal_dl_1,2)}} </td>
    </tr>
        @php($desc_mod = $subtotal_dl_1 - ($subtotal_dl_1 * $cotizacion->descuento_mod)/100)
        @php($desc_usa = $subtotal_dl - ($subtotal_dl * $cotizacion->descuento_usa)/100)
        @php($desc  = ($subtotal_dl_1 * $cotizacion->descuento_mod / 100)+ ($subtotal_dl * $cotizacion->descuento_usa/100))
    @if($cotizacion->descuento_mod > 0 || $cotizacion->descuento_usa > 0)
    <tr>
      <td colspan="8" style="background: #D2D2D2;" ></td>
      <td style="background:#D2D2D2; color: #5C8293;" colspan="">Descuento:</td>
      <td style="text-align: right;">
        
        - ${{number_format($desc,2)}}
      </td>
    </tr>
    @endif
    @if($cotizacion->flete > 0)
    <tr>
      <td colspan="8" style="background: #D2D2D2;" ></td>
      <td class="text-left white" style="background:#D2D2D2; color: #5C8293;" colspan="">Flete:</td>
      <td style="text-align: right;">
      + ${{ number_format($cotizacion->flete,2) }}
      </td>
    </tr>
    @endif
    @php($iva = ( ( ($desc_usa +  $cotizacion->flete) * $cotizacion->iva_usa )/100  ) +   (($desc_mod * $cotizacion->iva_mod/100)))
    @if($cotizacion->iva_usa > 0 || $cotizacion->iva_mod >0)
    <tr>
      <td colspan="8" style="background: #D2D2D2;" ></td>
      <td style="background:#D2D2D2; color: #5C8293; " colspan="">IVA:</td>
      <td style="text-align: right;">
        
        <span >+${{number_format( $iva ,2)}}</span>
      </td>
    </tr>
    @endif
    <tr style="background:#D2D2D2; color: #5C8293;" class="text-right">
      <td colspan="8" style="background: #D2D2D2;" ></td>
      <td colspan="" >Gran Total:</td>
      <td style="text-align: right;">USD: ${{number_format( $subtotal_dl + $subtotal_dl_1 +  $cotizacion->flete - $desc  + $iva,2)}}</td>
    </tr>
  </table>


    @elseif($tipo==4)
   

@php($subtotal_dl = 0)
@php($subtotal_dl_1 = 0)
@php($subtotal_ps = 0)
@php($p_unit = 1000)
<style type="text/css">
  .table th, .table td {
     padding: 6px;
  }
  .color{border: 2px solid white; color: gray; text-align: right;}
</style>
<br>
  <table class="table table-striped" style=" border-collapse: collapse; font-size: 11px; width: 100%;font-family: sans-serif;" id="" border="0">
    <tr style="background: #D2D2D2; color:#5C8293;text-align: center; ">
      <td>LN</td>
      <td>Posición</td>
      <td>ID HC</td>
      <td>FSH</td>
      <td>HND</td>
      <td>D.T</td>
      <td>Descripción MKT</td>
      <td>Ctd</td> 
      <td>PU</td>
      <td>Subtotal</td> 
    </tr>
    @php($i=1)
    @php($j=1)
    @foreach($productos as $p)

      @php($suma_pv = $p->pvc + $p->sum_pvc)
     
    @if($p->mod_cantidad>0)
    <tr>
      <td style="text-align: center;">{{ $i }}</td>
      <td></td>
      <td style="color: #5C8293;">MOD{{ substr(str_replace('xxx', $p->finish, $p->id_fab),0,6) }}</td>
       <td style="text-align: center;">
       {{   $p->finish }}
      </td>
      <td>{{$p->handing}}</td>
      <td>
        {{$p->door_t}}
      </td>
      <td>{{$p->descripcion}}</td>
      <td style="text-align: center;">{{ $p->mod_cantidad }}</td>
      <td style="text-align: right;">${{ number_format($p->mod_precio_unit,2) }}</td>
      <td style="text-align: right;">${{ number_format($p->mod_precio_unit * $p->mod_cantidad,2) }}</td>
           @php($i++)

    </tr>


    @endif
    @php($subtotal_dl   += $suma_pv * $p->cantidad)   
    @php($subtotal_dl_1 += $p->mod_precio_unit * $p->mod_cantidad)
    @php($subtotal_ps   += $p->inst_precio_unit * $p->inst_cantidad)
  
    @endforeach

    @php($desc_mod = $subtotal_dl_1 - ($subtotal_dl_1 * $cotizacion->descuento_mod)/100)
    @php($desc_usa = $subtotal_dl - ($subtotal_dl * $cotizacion->descuento_usa)/100)
    <tr >
      <td colspan="8" style="background: #D2D2D2;" ></td>
      <td style="background: #D2D2D2; color:#5C8293;">Subtotal:</td>
      <td style="text-align: right; background: #D2D2D2; color:#5C8293;">${{number_format($subtotal_dl_1,2)}} </td>
    </tr>
    @if($cotizacion->descuento_mod > 0)
    <tr>
      <td colspan="8" style="background: #D2D2D2;" ></td>
      <td style="background: #D2D2D2; color:#5C8293;" >Descuento:</td>
      <td style="text-align: right;">
        
        ${{number_format(($subtotal_dl_1 * $cotizacion->descuento_mod)/100,2)}}

      </td>     
    </tr>
    @endif
    @if($cotizacion->flete > 0 )
    <tr>
      <td colspan="8" style="background: #D2D2D2;" ></td>
      <td class="text-left white" style="background: #D2D2D2; color:#5C8293;" colspan="">Flete:</td>
      <td style="text-align: right;">
        ${{ number_format($cotizacion->flete,2) }}
      </td>
    </tr>
    @endif
    @php($iva = (( ($desc_mod  + $cotizacion->flete) * $cotizacion->iva_mod/100)) )
    @if($cotizacion->iva_mod > 0)
    <tr>
      <td colspan="8" style="background: #D2D2D2;" ></td>
      <td style="background: #D2D2D2; color:#5C8293;" colspan="">IVA:</td>
      <td style="text-align: right;">
        
        <span >+${{number_format($iva,2)}}</span>
      </td>
    </tr>
    @endif
    <tr style="background: #D2D2D2; color:#5C8293;" class="text-right">
      <td colspan="8" style="background: #D2D2D2;" ></td>
      <td colspan="" >Gran Total:</td>
      <td style="text-align: right;">USD: ${{number_format($desc_mod + $cotizacion->flete + $iva,2)}}</td>
    </tr>
  </table>


  @endif
  <br><br>
<table   style="width: 100%; font-family: sans-serif; text-align: justify; font-size: 11px; color:#5C8293;">
   <tr style="" >
      <td valign="top"> <?php echo nl2br($data->condiciones); ?></td>
      <td valign="top" style="color: black;"><b> <?php echo nl2br($cotizacion->notas); ?></b></td>
      <td valign="top" style="display: none;"> <?php echo nl2br($data->cuentas); ?></td>
   </tr>
</table>

