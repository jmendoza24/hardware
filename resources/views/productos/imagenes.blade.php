<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<td>Imagenes</td>
			<td></td>
		</tr>
	</thead>
	<tbody>
		 @foreach($imagenes as $f)
            <tr>
            <td>{{ $f->foto }}</td>
                <td style="text-align: right">
                    <div class='btn-group'>
                        <span  class='btn btn-primary btn-xs' onclick="ver_catalogo(17,{{$f->id}},2)" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-eye"></i></span>
                        <span onclick="elimina_catalogo(17,{{$f->id}},'imagenes_productos',{{$f->id_producto}})" class='btn btn-danger btn-xs'><i class="fa fa-trash"></i></span>
                    </div>
                </td>
            </tr>
        @endforeach
	</tbody>
</table>