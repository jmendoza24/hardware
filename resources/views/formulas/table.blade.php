<table  class="table table-striped table-bordered file-export small" id="formulas-table">
    <thead>
        <tr class="gris_tabla">
            <th>Id</th>
            <th>Catálogo</th>
            <th>Formula</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($formulas as $formulas)
        <tr>
            <td>{{ $formulas->id}}</td>
            <td>{!! $formulas->nom_catalogo !!}</td>
            <td>{!! $formulas->formula !!}</td>
            <td></td>
        </tr>
    @endforeach
    </tbody>
</table>

