<table class="table table-striped responsive  table-bordered scroll-vertical" id="productos-table">
        <thead>
            <tr>
                <th></th>
                <th>Página</th>
                <th>Descripción</th>
                <th>Fabricante</th>
                <th>Catálogo</th>
                <th>Familia</th>
                <th>Categoría</th>
                <th>Subcategoría</th>
                <th>Item</th>
                <th>Sufijo</th>
            </tr>
        </thead>
        <tbody>
        @foreach($productos as $productos)
            <tr>
                <td>
                    <div class="btn-group mr-1 mb-1">
                        <button type="button" class="btn btn-icon btn-pure dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
                        <div class="dropdown-menu">
                                <a class="dropdown-item" href="{!! route('productos.edit', [$productos->id]) !!}" >Editar</a>
                                <a class="dropdown-item" href="javascript:{}" onclick="confirmar_eliminar({{$productos->id}})" >Elimniar</a>
                        </div>
                      </div>
                </td>
                <td>{{ $productos->pagina}}</td>
                <td>{{ $productos->descripcion}}</td>
                <td>{!! $productos->abrev !!}</td>
                <td>{!! $productos->catalogo !!}</td>
                <td>{!! $productos->familia !!}</td>
                <td>{!! $productos->categoria !!}</td>
                <td>{!! $productos->subcategoria !!}</td>
                <td>{!! $productos->item !!}</td>
                <td>{!! $productos->sufijo !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
