<table class="table table-striped table-bordered file-export" id="baldwins-table">
    <thead>
        <tr class="gris_tabla">
            <th>Id</th>
            <th>Variable</th>
            <th>Grupo</th>
            <th>Opciones</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($subBaldwins as $subBaldwin)
        <tr>
            <td>{{$subBaldwin->id}}</td>
            <td> 
                @foreach ($variable as $key => $value) 
                    {{ $key== $subBaldwin->variable?$value:'' }}
                @endforeach
                
            </td>
            <td>{!! $subBaldwin->subcatalogo !!}</td>
            <td>{!! substr($subBaldwin->selector,0,50) !!}...</td>
            <td>
                <div class='btn-group'>
                    <span onclick="ver_catalogo(6,{{$subBaldwin->id}},2)" class='btn btn-float btn-outline-success btn_azul btn-round' data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-edit"></i></span>
                    <span onclick="elimina_catalogo(6,{{$subBaldwin->id}},'baldwins')" class='btn btn-float btn-outline-danger btn_rojo btn-round'><i class="fa fa-trash"></i></span>    
                </div>
            </td>
        </tr>
    @endforeach 
    </tbody>
</table>
