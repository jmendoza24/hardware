@extends('layouts.app')

@section('titulo') OC Fabricantes @endsection
@section('content')
    <div class="col-md-12">
     @include('tbl_oc_fabs.table')
    </div>
@endsection



