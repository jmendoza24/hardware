<table class="table" id="tblFotosProductos-table">
        <thead>
            <tr class="gris_tabla">
                <th>Foto</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($tblFotosProductos as $tblFotosProductos)
            <tr>
            <td>{{ $tblFotosProductos->foto }}</td>
                <td style="text-align: right">
                    {!! Form::open(['route' => ['tblFotosProductos.destroy', $tblFotosProductos->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('tblFotosProductos.show', [$tblFotosProductos->id]) }}" class='btn btn_azul btn-xs'><i class="fa fa-eye"></i></a>
                        <a href="#" onclick="borra_foto({{ $tblFotosProductos->id }})" class='btn btn-danger btn_rojo btn-xs'><i class="fa fa-trash"></i></a>

                    </div>
                    {!! Form::close() !!}    
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>