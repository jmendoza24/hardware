@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tbl Oc Fab
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tblOcFab, ['route' => ['tblOcFabs.update', $tblOcFab->id], 'method' => 'patch']) !!}

                        @include('tbl_oc_fabs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection