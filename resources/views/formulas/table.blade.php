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
    @php($arr = array(6,9,15,19))
    @foreach($formulas as $formulas)
        <tr style="{{ in_array($formulas->id, $arr) ? 'background: black; color:white;':''}}">
            <td>{{ $formulas->id}}</td>
            <td>[{{ $formulas->id}}] {!! $formulas->nom_catalogo !!}</td>
            <td>{!! $formulas->formula !!}</td>
            <td></td>
        </tr>
    @endforeach
    </tbody>
</table>

