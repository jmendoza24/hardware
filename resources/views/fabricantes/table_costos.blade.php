<table class="table table-striped  table-bordered">
    <thead>
        <tr>
            <th>Fabricante</th>
            <th>Factor HC</th>
            <th>L1 Walk <br> in/Showroom </th>
            <th>L2 Carpinteros/<br> Instaladores </th>
            <th>L3 Arq./Diseñadores</th>
            <th>L4 Proy. <br> Grandes/Hoteles</th>
        </tr>
    </thead>
    <tbody>
    @foreach($fabricantes as $f)
        <tr>
            <td>{{ $f->fabricante}}</td>
            <td>
                <input type="text" class="form-control mask-dec" id="factor_hc_{{$f->id}}" onchange="guarda_costo({{$f->id}},'factor_hc')" value="{{$f->factor_hc}}">
            </td>
            <td><input type="text" class="form-control mask-dec" id="lp1_{{$f->id}}" onchange="guarda_costo({{$f->id}},'lp1')" value="{{$f->lp1}}"></td>
            <td><input type="text" class="form-control mask-dec" id="lp2_{{$f->id}}" onchange="guarda_costo({{$f->id}},'lp2')" value="{{$f->lp2}}"></td>
            <td><input type="text" class="form-control mask-dec" id="lp3_{{$f->id}}" onchange="guarda_costo({{$f->id}},'lp3')" value="{{$f->lp3}}"></td>
            <td><input type="text" class="form-control mask-dec" id="lp4_{{$f->id}}" onchange="guarda_costo({{$f->id}},'lp4')" value="{{$f->lp4}}"></td>
        </tr>
    @endforeach
    </tbody>
</table>
