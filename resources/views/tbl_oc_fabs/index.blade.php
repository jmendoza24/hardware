@extends('layouts.app')

@section('titulo') OC Fabricantes @endsection
@section('content')
    <div class="col-md-12">    
    <h1 class="pull-right">
    </h1>
    </div>
    <br><br><br>
    <div class="col-md-12" style="overflow-x: scroll;">
     @include('tbl_oc_fabs.table')
    </div>
@endsection



