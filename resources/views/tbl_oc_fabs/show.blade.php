    @extends('layouts.app')

@section('titulo') @endsection
@section('content')
    <div class="col-md-12">    
    <h1 class="pull-right">
    </h1>
    </div>OC Fabricantes  Desgloce
    <br><br><br>
    <div class="col-md-12" style="overflow-x: scroll;">
            
        <table class="table table-striped responsive  table-bordered scroll-vertical" id="tblOcFabs-table2">
        <thead>
            <tr style="background: #5C8293; color: white;">
            <th>Fabricante</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Sub Total</th>
            <th>Total</th>
            <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($tblOcFabs as $tblOcFab)
            <tr>
            <td>{{ $tblOcFab->fabricante }}</td>
            <td>{{ $tblOcFab->id_fab }}</td>
            <td>{{ $tblOcFab->cant }}</td>
            <td style="text-align: right">${{ number_format($tblOcFab->subtotal,2) }}</td>
            <td style="text-align: right">${{ number_format($tblOcFab->total,2) }}</td>
            <td>


                <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox"   onchange="agrega_producto({{ $tblOcFab->idf }})">
                  <span class="form-check-sign">
                    <span class="check"></span>
                  </span>
                </label>
              </div>
                </td>
                
                </tr>
        @endforeach

        </tbody>

         <tr>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: right">Total:</td>
            <td></td>
            <td></td>
            </tr>
    </table>
    </div>
@endsection






