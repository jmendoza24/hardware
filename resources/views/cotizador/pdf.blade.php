
<table   style="width: 100%;">
    <thead>
       <tr style="width: 100%;" >
        <th colspan="1" style="font-size: 14px;background-color: #212121;border-left-color:white;border-right-color:white;color:white">Hardware<br> collection</th>
        <th colspan="6" style="font-size: 10px;background-color: #023761;text-align: right;border-left-color:white;border-right-color:white;color:white">2020-09-25<br>ID Cotización 9<br>Calzada San Pedro # 108<br>San Pedro Garza García, N,L, México, 66220<br>+52 (81) 8378 0601, info@hardwarecollection.mx</th>
       </tr>
       <tr style="width: 100%;font-size: 14px;background-color: gray;" >
        <th colspan="3" style="text-align: left;border-left-color:gray;border-right-color:gray;color:white">Proyecto: {{ $cot->proyecto }}<br> Participante: {{ $cot->contacto }}<br>Empresa: {{ $cot->empresa }}</th>
        <th colspan="2" style="text-align: left;border-left-color:gray;border-right-color:gray;color:white">Correo: {{ $cot->correo }}<br>Teléfono: {{ $cot->telefono }}<br></th>
        <th colspan="2" style="text-align: right;border-left-color:gray;border-right-color:gray;color:white">Cotización valida {{ $cot->created_at }}<br> hasta ({{ date("d-m-Y",strtotime($cot->created_at."+ 30 days")) }})</th>
       </tr>
         

        <tr class="gris_barra" style="text-align: left;font-size: 14px;width: 100%"><br><br><br><br><br>
        <th colspan="1" style="text-align: left;">ID HC</th>
        <th colspan="3" style="text-align: left;">Descripción</th>
        <th colspan="1" style="text-align: right;">Piezas</th>
        <th colspan="1" style="text-align: right;">P.U (P)</th>
        <th colspan="1" style="text-align: right;">Subtotal</th>
       </tr>
    </thead>
    <tbody>
          @foreach($productos2 as $productos2)
            <tr>
               <td>{{ $productos2->id_hc }}</td>
               <td colspan="3">{{ $productos2->descripcion }}</td>
               <td colspan="1" style="text-align: right">{{ $productos2->cantidad }}</td>
               <td style="text-align: right">$ @if(empty($productos2->pvc ))  {{ number_format(0,2) }} @else {{ number_format($productos2->pvc ,2)}} @endif</td>
               <td style="text-align: right">$ @if(empty($productos2->pvc ))  {{ number_format(0,2) }} @else {{ number_format($productos2->cantidad*$productos2->pvc ,2)}} @endif</td>
            </tr>
          @endforeach
    </tbody>
  </table>
<table   style="width: 100%;">
    <thead>
       <tr style="width: 100%;font-size: 14px;background-color: white;" >
        <th colspan="3" style="text-align: left;border-left-color:gray;border-right-color:gray;color:#212121">{{ $data->condiciones }}</th>
        <th colspan="2" style="text-align: left;border-left-color:gray;border-right-color:gray;color:red">{{ $data->notas }}</th>
        <th colspan="2" style="text-align: right;border-left-color:gray;border-right-color:gray;color:#212121">{{ $data->cuentas }}</th>
       </tr>
    </thead>
  </table>

