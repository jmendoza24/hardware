@extends('layouts.app')

@section('titulo') Productos Masivo @endsection
@section('content')
    <div class="col-md-12">    
    <div class="pull-right btn-group">
       <a class="btn btn-outline-primary btn_azul mr-1" href="{{ route('download.excel')}}" ><i class="fa fa-file-excel-o"></i></a>
       <span class="btn btn-outline-success btn_verde mr-1" onclick="ver_catalogo(11,0,1)" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-upload"></i></span>
       <span class="btn btn-outline-danger btn_rojo  mr-1" title="Eliminar" onclick="limpiar_temporal(1)"><i class="fa fa-trash"></i></span>
       <span class="btn btn-outline-primary btn_rojo  mr-1" title="Enviar a produccion" onclick="enviar_produccion()"><i class="fa fa-arrow-right"></i></span>
    </div>
    </div>
    <br>
    <div class="col-md-12" style="overflow-x: scroll;" id="tabla_catalogos">
     @include('productos.table_masivo')
    </div>
@endsection
@section('script')
<script type="text/javascript">
  $("#productos").dataTable( {
    "paging": false
    } );
</script>
@endsection