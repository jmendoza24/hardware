        <table class="table table-bordered file-export" id="tblOcFabs-table">

        <thead>
            <tr class="gris_tabla">
            <th>Fabricante</th>
            <th>Teléfono</th>
            <th>Contacto</th>
            <th>Cantidad</th>
            <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($tblOcFabs as $tblOcFab)
        @if($tblOcFab->cant > 0)
            <tr>
                <td>{{ $tblOcFab->fabricante }}</td>
                <td>{{ $tblOcFab->telefono_dir }}</td>
                <td>{{ $tblOcFab->contacto }}</td>
                <td>{{ $tblOcFab->cant }}</td>
                <td>
                    <div class="btn-group">
                        <a class="btn btn-sm btn-danger" href="{{ route('tblOcFabs.show', [$tblOcFab->id_fabricante]) }}"><i class="fa fa-window-maximize"></i></a> &nbsp;
                    </div>
                </td>
            </tr>
            @endif
        @endforeach
        </tbody>
    </table>

