@extends('layouts.app') 
@section('titulo')Cotizaciones @endsection
@section('content')
<style type="text/css">
    .td-2px{padding: 2px;}
</style>
<div class="col-md-12">
    <a class="btn btn-primary pull-right" href="{!! route('cotizador.index') !!}">+ Cotización</a>
</div>
<br><br>
<div class="col-md-12" id="cotiza_table" style="overflow-x: scroll;">
	  @include('cotizador.cotizaciones')
</div>
@endsection