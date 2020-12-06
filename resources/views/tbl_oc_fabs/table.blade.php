        <table class="table table-bordered file-export" id="tblOcFabs-table">

        <thead>
            <tr style="background: #5C8293; color: white;">
            <th>Fabricante</th>
            <th>Fabricante</th>
            <th>Teléfono</th>
            <th>Contacto</th>
            <th>Cantidad</th>
            <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($tblOcFabs as $tblOcFab)
            <tr>
            <td>{{ $tblOcFab->fabricante }}</td>

            <td>{{ $tblOcFab->fabricante }}</td>
            <td>{{ $tblOcFab->telefono_dir }}</td>
            <td>{{ $tblOcFab->contacto }}</td>
            <td>{{ $tblOcFab->can_total }}</td>
            <td>
                    <div class="btn-group">
                        <a class="btn btn-sm btn-outline-primary btn_azul" href="{{ route('tblOcFabs.show', [$tblOcFab->idf]) }}"><i class="fa fa-window-maximize"></i></a> &nbsp;
                    </div>
                </td>
                
                </tr>
        @endforeach
        </tbody>
    </table>

