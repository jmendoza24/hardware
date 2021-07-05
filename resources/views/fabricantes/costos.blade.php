@extends('layouts.app')

@section('titulo')Costos @endsection
@section('content')
	<ul>
		<li>Seleccione 1 para 100%</li>
		<li><b>PHC</b> = LP x Factor HC</li>
		<li><b>PVC</b> = LP x L1</li>
	</ul>
    <div class="col-md-12" id="lista_costs">
     @include('fabricantes.table_costos')
    </div>
@endsection
