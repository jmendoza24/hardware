@php($total = 0)
<table class="table table-bordered padding-table" id="tblOcFabs-table">
        <thead class="gris_tabla ">
            <tr>
            <th>Fab</th>
            <th>Proyecto</th>
            <th>OCC</th>
            <th>Producto</th>
            <th>Handing</th>
            <th>Finish</th>
            <th>Style</th>
            <th>Pedido</th>
            <th>LP</th> 
            <th>Total</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tblOcFabs as $tblOcFab)
            <tr>
                <td>{{ $tblOcFab->abrev }}</td>
                <td>{{ $tblOcFab->nombre}}</td>
                <td class="text-center">{{ $tblOcFab->id_occ}}</td>
                <td>{{ $tblOcFab->id_fab }}</td>
                <td>{{ $tblOcFab->handing }}</td>
                <td>{{ $tblOcFab->finish }}</td>
                <td>{{ $tblOcFab->style }}</td>
                <td class="text-center">{{$tblOcFab->cantidad}}</td>
                <td style="text-align: right">${{ number_format($tblOcFab->lp,2) }}</td>
                <td style="text-align: right">${{ number_format($tblOcFab->lp * $tblOcFab->cantidad,2) }}</td>
            </tr>
            @php($total += $tblOcFab->cantidad * $tblOcFab->lp)
        @endforeach

        </tbody>

    </table>
</div>
<div class="col-md-12">
    <h4 class="{{ $total > 10000 ? 'red':'blue'}}"> Total: $ {{ number_format($total,2) }}</h4>
</div>