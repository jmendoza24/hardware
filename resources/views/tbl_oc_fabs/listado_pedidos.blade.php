@extends('layouts.app')

@section('titulo') <h4 >Pedidos Fabricantes</h4> @endsection
@section('content')
    
    <div class="col-md-12">

      <table class="table table-striped responsive  table-bordered scroll-vertical padding-table" id="tblOcFabs-table2">
        <thead class="gris_tabla">
            <tr >
                <th>Pedido</th>
                <th>Fabricante</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Estatus</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pedidos as $pedidos)
            <tr>
            <td class="text-center"><span class="badge badge-primary" onclick="ver_pedido({{ $pedidos->id }})" data-toggle="modal" data-backdrop="false" data-target="#primary" style="cursor: pointer; font-size: 12px;">{{ $pedidos->id }}</span></td>
            <td>{{ $pedidos->fabricante }}</td>
            <td class="text-center">{{ $pedidos->cantidad }}</td>
            <td style="text-align: right">${{ $pedidos->total }}</td>
            <td class="text-center">@if($pedidos->estatus==1) Activo @elseif($pedidos->estatus==2) Pendiente @elseif($pedidos->estatus==3) Finalizado @elseif($pedidos->estatus==4) Cancelado  @endif</td>
            </tr>
        @endforeach

        </tbody>

    </table>
   
    </div>

@endsection






