        <table class="table table-striped responsive  table-bordered scroll-vertical" id="tblOcFabs-table">
        <thead>
            <tr style="background: #5C8293; color: white;">
            <th>Fabricante</th>
            <th>Cantidad</th>
            <th>Total</th>
            <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($tblOcFabs as $tblOcFab)
            <tr>
            <td>{{ $tblOcFab->fabricante }}</td>
            <td>{{ $tblOcFab->cant }}</td>
            <td style="text-align: right">${{ number_format($tblOcFab->total,2) }}</td>
            <td>
                    <div class="btn-group">
                        <a class="btn btn-sm btn-outline-primary btn_azul" href="{{ route('tblOcFabs.show', [$tblOcFab->idf]) }}"><i class="fa fa-window-maximize"></i></a> &nbsp;
                    </div>
                </td>
                
                </tr>
        @endforeach
        </tbody>
    </table>

