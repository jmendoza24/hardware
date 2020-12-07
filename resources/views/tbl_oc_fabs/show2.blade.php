    @extends('layouts.app')

@section('titulo') <h4 >Pedidos</h4> @endsection
@section('content')
    
    <div class="col-md-12" style="overflow-x: scroll;">

      <table class="table table-striped responsive  table-bordered scroll-vertical" id="tblOcFabs-table2">
        <thead>
            <tr style="background: #5C8293; color: white;">
            <th>ID  Pedido</th>
            <th>Fabricante</th>
            <th>Cantidad</th>
            <th>Total</th>
            <th>Estatus</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pedidos as $pedidos)
            <tr>
            <td><span class="badge badge-primary" onclick="ver_pedido({{ $pedidos->id_pedido }})" data-toggle="modal" data-backdrop="false" data-target="#primary" style="cursor: pointer; font-size: 12px;">{{ $pedidos->id_pedido }}</span></td>
            <td>{{ $pedidos->fabricante }}</td>
            <td>{{ $pedidos->cant }}</td>
            <td style="text-align: right">${{ $pedidos->total }}</td>
            <td>@if($pedidos->estatus==1) Activo @elseif($pedidos->estatus==2) Pendiente @elseif($pedidos->estatus==3) Finalizado @elseif($pedidos->estatus==4) Cancelado  @endif</td>
            </tr>
        @endforeach

        </tbody>

    </table>
   
    </div>

@endsection






