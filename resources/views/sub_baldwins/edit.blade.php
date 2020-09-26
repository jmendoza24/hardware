@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Sub Baldwin
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($subBaldwin, ['route' => ['subBaldwins.update', $subBaldwin->id], 'method' => 'patch']) !!}

                        @include('sub_baldwins.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection