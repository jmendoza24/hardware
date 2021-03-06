<hr>
<div class="col-md-12 text-right">
    @for($i = 1; $i<= $conteo; $i++)
        <span class="btn btn-{{ $i!= $init ? 'outline-' : ''}}primary btn-sm" onclick="buscar_producto({{$i}})">{{$i}}</span>
    @endfor
</div>
<table class="table table-striped table-bordered responsive scroll-vertical" id="productos-table">
        <thead>
            <tr class="gris_tabla">
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
