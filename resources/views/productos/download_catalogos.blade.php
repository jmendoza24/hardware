@extends('layouts.app')

@section('titulo') Catalogos @endsection
@section('content')
    <div class="row" style="text-align: center; display: none;" id="tablas_catalogos">
    	<div class="col-md-2">
    		<label>Catalogos</label>
    		<table class="table table-striped table-bordered file-export2" id="items-table">
			    <thead>
			        <tr class="gris_tabla">
			            <th>IdFabricante</th>
			            <th>Fabricante</th>
			            <th>IdCatalogos</th>
			            <th>Catalogos</th>
			            <th>IdFamilia</th>
			            <th>Familia</th>
			            <th>IdCategoria</th>
			            <th>Categoria</th>
			            <th>IdSubcategoria</th>
			            <th>Subategoria</th>
			            <th>IdDiseño</th>
			            <th>Diseño</th>
			            <th>IdItem</th>
			            <th>Item</th>
			        </tr>
			    </thead>
			    <tbody>
			    @foreach($items as $item)
		            <tr>
		                <td>{{$item->id_fabricante}}</td>
		                <td>{{$item->fabricante}}</td>
		                <td>{{$item->id_catalogos}}</td>
		                <td>{{$item->catalogo}}</td>
		                <td>{{$item->id_familia}}</td>
		                <td>{{$item->familia}}</td>
		                <td>{{$item->id_categoria}}</td>
		                <td>{{$item->categoria}}</td>
		                <td>{{$item->id_subcategoria}}</td>
		                <td>{{$item->subcategoria}}</td>
		                <td>{{$item->id_disenio}}</td>
		                <td>{{$item->disenio}}</td>
		                <td>{{$item->id_item}}</td>
		                <td>{{$item->item}}</td>
			        </tr>
			    @endforeach 
			    </tbody>
			</table>
    	</div>
    	<div class="col-md-2">
    		<label>Sufijos</label>
    		<table class="table table-striped table-bordered file-export2" id="items-table">
			    <thead>
			        <tr class="gris_tabla">
			        	<th>IdCategoria</th>
			        	<th>Categoria</th>
			        	<th>IdSubcategoria</th>
			        	<th>Subcategoria</th>
			            <th>IdSufijo</th>
			            <th>Sufijos</th>
			        </tr>
			    </thead>
			    <tbody>
			    @foreach($sufijos as $sufijo)
		            <tr class="gris_tabla">
		                <td>{{ $sufijo->id_categoria }}</td>
		                <td>{{ $sufijo->categoria }}</td>
		                <td>{{ $sufijo->id_subcategoria}}</td>
		                <td>{{ $sufijo->subcategoria}}</td>
		                <td>{{ $sufijo->id_sufijo}}</td>
		                <td>{{ $sufijo->sufijo}}</td>
			        </tr>
			    @endforeach 
			    </tbody>
			</table>
    	</div>
    	<div class="col-md-2">
    		<label>Grupos</label>
    		<table class="table table-striped table-bordered file-export2" id="items-table">
			    <thead>
			        <tr class="gris_tabla">
			            <th>IdFabricante</th>
			            <th>Fabricantes</th>
			            <th>Idgrupo</th>
			            <th>Varibale</th>
			            <th>Grupos</th>
			            <th>Opciones</th>
			        </tr>
			    </thead>
			    <tbody>
			    @foreach($sub_baldwins  as $grupo)
		            <tr>
		            	<td>{{ $grupo->id_fabricante}}</td>
		            	<td>{{ $grupo->fabricante}}</td>
		            	<td>{{ $grupo->id_grupo}}</td>
		                <td>
		                	@if($grupo->id_fabricante==77)
		                		@foreach ($variable as $key => $value) 
				                    {{ $key== $grupo->variable?$value:'' }}
				                @endforeach
				             @elseif($grupo->id_fabricante==76)
				             	@foreach ($variable2 as $key2 => $value2) 
				                    {{ $key2== $grupo->variable?$value2:'' }}
				                @endforeach
				            @endif
				        </td>
		                <td>{!! $grupo->grupo !!}</td>
		                <td>{!! $grupo->opciones !!}</td>
			        </tr>
			    @endforeach 
			    </tbody>
			</table>
    	</div>
    </div>
@endsection
@section('scripts')
	<script type="text/javascript">
		$( document ).ready(function() {
			$.blockUI({message: '<h5>Generando exceles espere...</h5>'});
		   $('.file-export2').DataTable({
		        dom: 'Bfrtip',
		        "paging": false,
		        buttons: ['excelHtml5']
		    });
    
    	$('.buttons-excel').addClass('btn btn-outline-primary');

		   $(".dataTables_filter").hide();
		   $(".file-export2").hide();
		   $(".dataTables_info").hide();
		    setTimeout(
			  function() {
			    $("#tablas_catalogos").show();
			    $.unblockUI();
			  }, 5000);
		});
	</script>
@endsection