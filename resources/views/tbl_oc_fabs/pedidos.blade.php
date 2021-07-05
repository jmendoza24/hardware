@php($total = 0)
<div class="row" id="agrega_producto" style="display:none;">
    <div class="col-md-5">
        <label>Producto:</label>
        <select class="form-control select2" style="width:100%;">
            <option value="0">Agrega producto...</option>
        </select>
    </div>
    <div class="col-md-2">
        <label>Cantidad:</label>
        <input type="text" name="cantidad" class="form-control cantidad-mask" placeholder="LP">
    </div>
    <div class="col-md-2">
        <label>LP:</label>
        <input type="text" name="lp" class="form-control mask-dec" placeholder="LP">
    </div>
    <div class="col-md-2" style="margin-top: 25px;">
        <span class="btn btn-outline-primary " >Agregar</span>
    </div>
    
</div>
<hr>
<div class="col-md-12" style="overflow-x: scroll; max-height: 600px;">
<input type="hidden" id="id_fabricante" value="{{ $id_fabricante}}">

<table class="table table-bordered padding-table" id="tblOcFabs-table">
        <thead class="gris_tabla ">
            <tr>
            <th>Fab</th>
            <th>Proyecto</th>
            <th>Producto</th>
            <th>Handing</th>
            <th>Finish</th>
            <th>Style</th>
            <th>OCF</th>
            <th>Pedido</th>
            <th>Inv 1</th>
            <th>Inv 2</th>
            <th>LP</th> 
            <th>Total</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tblOcFabs as $tblOcFab)
            <tr>
                <td>{{ $tblOcFab->abrev }}</td>
                <td>{{ $tblOcFab->nombre}}</td>
                <td>{{ $tblOcFab->id_fab }}</td>
                <td>{{ $tblOcFab->handing }}</td>
                <td>{{ $tblOcFab->finish }}</td>
                <td>{{ $tblOcFab->style }}</td>
                <td class="text-center">{{ number_format($tblOcFab->cantidad,0) }}</td>
                <td><input type="text" id="cpedido{{ $tblOcFab->id }}_{{$tblOcFab->tipo}}" onchange="guarda_pedido({{$tblOcFab->tipo}},{{$tblOcFab->id}},{{ $tblOcFab->lp}})"  class="form-control form-control-sm cantidad-mask" value="{{$tblOcFab->cant_ac}}"></td>
                <td>{{ $tblOcFab->inv1 }}</td>
                <td>{{ $tblOcFab->inv2 }}</td>
                <td style="text-align: right">${{ number_format($tblOcFab->lp,2) }}</td>
                <td style="text-align: right">${{ number_format($tblOcFab->lp * $tblOcFab->cant_ac,2) }}</td>
            </tr>
            @php($total += $tblOcFab->cant_ac * $tblOcFab->lp)
        @endforeach
        </tbody>

    </table>
</div>
<div class="col-md-12">
    <h4 class="{{ $total > 10000 ? 'red':'blue'}}"> Total: $ {{ number_format($total,2) }}</h4>
</div>