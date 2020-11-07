@extends('layouts.app')

@section('titulo') Catalogos @endsection
@section('content')
    <div class="row" style="text-align: center; display: none;" id="tablas_catalogos">
    	<div class="col-md-2">
    		<label>Catalogos</label>
    		<table class="table table-striped table-bordered file-export2" id="items-table">
			    <thead>
			        <tr class="gris_tabla">
			            <th>Fabricante</th>
			            <th>IdFabricante</th>
			            <th>Catalogos</th>
			            <th>IdCatalogos</th>
			            <th>Familia</th>
			            <th>IdFamilia</th>
			            <th>Categoria</th>
			            <th>IdCategoria</th>
			            <th>Subategoria</th>
			            <th>IdSubcategoria</th>
			            <th>Diseño</th>
			            <th>IdDiseño</th>
			            <th>Item</th>
			            <th>IdItem</th>
			        </tr>
			    </thead>
			    <tbody>
			    @foreach($items as $item)
		            <tr>
		            	<td>{{$item->fabricante}}</td>
		                <td>{{$item->id_fabricante}}</td>
		                <td>{{$item->catalogo}}</td>
		                <td>{{$item->id_catalogos}}</td>
		                <td>{{$item->familia}}</td>
		                <td>{{$item->id_familia}}</td>
		                <td>{{$item->categoria}}</td>
		                <td>{{$item->id_categoria}}</td>
		                <td>{{$item->subcategoria}}</td>
		                <td>{{$item->id_subcategoria}}</td>
		                <td>{{$item->disenio}}</td>
		                <td>{{$item->id_disenio}}</td>
		                <td>{{$item->item}}</td>
		                <td>{{$item->id_item}}</td>
			        </tr>
			    @endforeach 
			    </tbody>
			</table>
    	</div>
    	{{-- <div class="col-md-2">
    		<label>Sufijos</label>
    		<table class="table table-striped table-bordered file-export2" id="items-table">
			    <thead>
			        <tr class="gris_tabla">
			        	<th>Categoria</th>
			        	<th>IdCategoria</th>
			        	<th>Subcategoria</th>
			        	<th>IdSubcategoria</th>
			        	<th>Sufijos</th>
			            <th>IdSufijo</th>
			        </tr>
			    </thead>
			    <tbody>
			    @foreach($sufijos as $sufijo)
		            <tr class="gris_tabla">
		                <td>{{ $sufijo->categoria }}</td>
		                <td>{{ $sufijo->id_categoria }}</td>
		                <td>{{ $sufijo->subcategoria}}</td>
		                <td>{{ $sufijo->id_subcategoria}}</td>
		                <td>{{ $sufijo->sufijo}}</td>
		                <td>{{ $sufijo->id_sufijo}}</td>
			        </tr>
			    @endforeach 
			    </tbody>
			</table>
    	</div> --}}
    	<div class="col-md-2">
    		<label>Grupos</label>
    		<table class="table table-striped table-bordered file-export2" id="items-table">
			    <thead>
			        <tr class="gris_tabla">
			            <th>Fabricantes</th>
			            <th>Varibale</th>
			            <th>Grupos</th>
			            <th>Opciones</th>
			            <th>Idgrupo</th>
			        </tr>
			    </thead>
			    <tbody>
			    @foreach($sub_baldwins  as $grupo)
		            <tr>
		            	<td>{{ $grupo->fabricante}}</td>
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
		            	<td>{{ $grupo->id_grupo}}</td>
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