<div class="col-md-6">
    <table class="table table-bordered table-striped">
        <thead class="gris_tabla">
            <tr>
                <td>Imágenes</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            @foreach($proyectos_files as $p)
            @if($p->tipo_file==1)
            <tr>
                <td><a target="_blank" href="{{$p->file}}">{{$p->descripcion}}</a></td>
                <td><span class="btn btn-danger btn-sm" onclick="elimina_catalogo(18,{{$p->id}},'',{{ $p->id_proyecto}})"><i class="fa fa-trash"></i></span></td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
<div class="col-md-6">
    <table class="table table-bordered table-striped">
        <thead class="gris_tabla">
            <tr>
                <td>Archivos</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            @foreach($proyectos_files as $p)
            @if($p->tipo_file==2)
            <tr>
                <td><a target="_blank" href="{{$p->file}}">{{$p->descripcion}}</a></td>
                <td><span class="btn btn-danger btn-sm" onclick="elimina_catalogo(18,{{$p->id}},'',{{ $p->id_proyecto}})"><i class="fa fa-trash"></i></span></td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>