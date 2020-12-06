<table class="table table-striped  table-bordered  scroll-vertical" id="productos-table">
        <thead>
            <tr class="gris_tabla">
                <th>Fabricante</th>
                <th>Catalogo</th>
                <th>Pagina</th>
                <th>Familia</th>
                <th>Categoria</th>
                <th>Subcategoria</th>
                <th>Disenio</th>
                <th>Item</th>
                <th>Sufijo</th>
                <th>Grupo Sufijo</th>
                <th>Descripcion</th>
                <th>Descripcion Mtk</th> 
                <th>Especificacion</th>
                <th>Selector Mtk</th>
                <th>Mortise</th>
                <th>Fmm1</th>
                <th>Stem</th>
                <th>Fmm2</th>
                <th>Handle</th>
                <th>Fmm3</th>
                <th>Wheel</th>
                <th>Fastener</th>
                <th>Style</th>
                <th>Finish</th>
                <th>Style 1</th>
                <th>Style 2</th>
                <th>Style 3</th>
                <th>Latch</th>
                <th>Strike</th>
                <th>Cylinder</th>
                <th>Keyling</th>
                <th>Finish Det 1</th>
                <th>Finish Det 2</th>
                <th>Finish Det 3</th>
                <th>Finish Det 4</th>
                <th>Dependencias</th>
                <th>Handing</th>
                <th>Door Thickness</th>
                <th>Backset</th>
                <th>Costo 1</th>
                <th>Costo 2</th>
                <th>Costo 3</th>
                <th>Costo 4</th>
                <th>Calculo Codigo</th>
                <th>Codigo Sistema</th>
                <th>Notas</th>
                <th>Exterior Tim Dep 1</th>
                <th>Exterior Tim 1 Accion</th>
                <th>Int Escutcheon Dep 2</th>
            </tr>
        </thead>
        <tbody>
        @foreach($productos as $productos)
            <tr>
                <td>{!! $productos->fabricante !!}</td>
                <td>{!! $productos->catalogo !!}</td>
                <td>{!! $productos->pagina !!}</td>
                <td>{!! $productos->familia !!}</td>
                <td>{!! $productos->categoria !!}</td>
                <td>{!! $productos->subcategoria !!}</td>
                <td>{!! $productos->disenio !!}</td>
                <td>{!! $productos->item !!}</td>
                <td>{!! $productos->sufijo !!}</td>
                <td>{!! $productos->grupo_sufijo !!}</td>
                <td>{!! $productos->descripcion !!}</td>
                <td>{!! $productos->descripcion_mtk !!}</td>
                <td>{!! $productos->especificacion !!}</td>
                <td>{!! $productos->selector_mtk !!}</td>
                <td>{!! $productos->mortise !!}</td>
                <td>{!! $productos->fmm1 !!}</td>
                <td>{!! $productos->stem !!}</td>
                <td>{!! $productos->fmm2 !!}</td>
                <td>{!! $productos->handle !!}</td>
                <td>{!! $productos->fmm3 !!}</td>
                <td>{!! $productos->wheel !!}</td>
                <td>{!! $productos->fastener !!}</td>
                <td>{!! $productos->style !!}</td>
                <td>{!! $productos->finish !!}</td>
                <td>{!! $productos->style_1 !!}</td>
                <td>{!! $productos->style_2 !!}</td>
                <td>{!! $productos->style_3 !!}</td>
                <td>{!! $productos->latch !!}</td>
                <td>{!! $productos->strike !!}</td>
                <td>{!! $productos->cylinder !!}</td>
                <td>{!! $productos->keyling !!}</td>
                <td>{!! $productos->finish_det_1 !!}</td>
                <td>{!! $productos->finish_det_2 !!}</td>
                <td>{!! $productos->finish_det_3 !!}</td>
                <td>{!! $productos->finish_det_4 !!}</td>
                <td>{!! $productos->dependencias !!}</td>
                <td>{!! $productos->handing !!}</td>
                <td>{!! $productos->door_thickness !!}</td>
                <td>{!! $productos->backset !!}</td>
                <td>{!! $productos->costo_1 !!}</td>
                <td>{!! $productos->costo_2 !!}</td>
                <td>{!! $productos->costo_3 !!}</td>
                <td>{!! $productos->costo_4 !!}</td>
                <td>{!! $productos->calculo_codigo !!}</td>
                <td>{!! $productos->codigo_sistema !!}</td>
                <td>{!! $productos->notas !!}</td>
                <td>{!! $productos->exterior_tim_dep_1 !!}</td>
                <td>{!! $productos->exterior_tim_1_accion !!}</td>
                <td>{!! $productos->int_escutcheon_dep_2 !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
