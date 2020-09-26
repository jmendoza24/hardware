<table class="table table-striped table-bordered file-export" id="sufijos-table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Categoria</th>
            <th>Subcategoria</th>
            <th>Sufijo</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($sufijos as $sufijo)
        <tr>
            <td>{{$sufijo->id}}</td>
            <td>{!! $sufijo->categoria !!}</td>
            <td>{!! $sufijo->subcategoria !!}</td>
            <td>{!! $sufijo->sufijo !!}</b></a></td>
            <td>
                <div class='btn-group'>
                    <span onclick="ver_catalogo(8,{{$sufijo->id}},2)" class='btn btn-float btn-outline-success btn-round' data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-edit"></i></span>
                    <span onclick="elimina_catalogo(8,{{$sufijo->id}},'sufijos')" class='btn btn-float btn-outline-danger btn-round'><i class="fa fa-trash"></i></span>    
                </div>
            </td>
        </tr>
    @endforeach 
    </tbody>
</table>
