    @extends('layouts.app')

@section('titulo') <h4 >OC Fabricantes</h4> @endsection
@section('content')
     <table>
            <div class="col-md-12">  

            <div class="col text-right" style="margin-top: 10px;">
                <span style="color: white" class=" btn btn-outline-primary btn_azul " onclick="finaliza_pedido()">Finalizar Pedido</span>
                <span style="color: white" class="btn btn-outline-primary btn_azul " onclick="regresar()">Regresar</span>

            </div>
            </div>
         <tr>
            <td colspan="4"></td>
            
            <td style="text-align: right"><h2 id="tot">Total:</h2></td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <div class="col-md-12" style="overflow-x: scroll;">
        <table class="table table-bordered file-export" id="tblOcFabs-table">

        <thead>
            <tr style="background: #5C8293; color: white;">
            <th>Fabricante</th>
            <th>Producto</th>
            <th>Handing</th>
            <th>Finish</th>
            <th>Style</th>
            <th>Cantidad</th>
            <th>Cant. Pedido</th>
            <th>Inv 1</th>
            <th>Inv 2</th>
            <th>LP</th>
            <th>Total</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tblOcFabs as $tblOcFab)
            <tr>
            <td>{{ $tblOcFab->fabricante }}</td>
            <td>{{ $tblOcFab->id_fab }}</td>
            <td>{{ $tblOcFab->handing }}</td>
            <td>{{ $tblOcFab->finish }}</td>
            <td>{{ $tblOcFab->style }}</td>
            <td>{{ $tblOcFab->cant }}</td>
            <td><input type="text" id="cpedido{{ $tblOcFab->id_dc }}" onchange="agrega_producto_oc({{ $tblOcFab->idf }},'{{ $tblOcFab->id_fab }}','{{ $tblOcFab->fabricante  }}',{{ $tblOcFab->cant }},'{{ $tblOcFab->lp }}','{{ $tblOcFab->lp }}',{{ $tblOcFab->id_dc }})" name="cpedido{{ $tblOcFab->id_dc }}" class="form-control"></td>
            <td>{{ $tblOcFab->inv1 }}</td>
            <td>{{ $tblOcFab->inv2 }}</td>
            <td style="text-align: right">${{ number_format($tblOcFab->lp,2) }}</td>
            <td style="text-align: right">${{ number_format($tblOcFab->lp*$tblOcFab->cant,2) }}</td>
            
                
                </tr>
        @endforeach

        </tbody>

    </table>
   
    </div>
@endsection








