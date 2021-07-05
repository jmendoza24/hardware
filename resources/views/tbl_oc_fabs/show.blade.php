@extends('layouts.app')

@section('titulo')OC Fabricantes
<div class="col text-right">
        <a style="color: white" class=" btn btn-danger btn-sm" href="{{ route('pedido.finaliza')}}" >Guardar  {{ $id_pedido}}</a>
        <span style="color: white" class=" btn btn-info btn-sm" id="mas_producto"  > + Producto</span>
    </div>    
 @endsection
@section('content')
    <div class="col-md-12" id="pedidos_table">
        @include('tbl_oc_fabs.pedidos')
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $("#mas_producto").click(function(){
          $("#agrega_producto").toggle();
        });
    </script>
@endsection







