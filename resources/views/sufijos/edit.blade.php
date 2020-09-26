@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Sufijos
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($sufijos, ['route' => ['sufijos.update', $sufijos->id], 'method' => 'patch']) !!}

                        @include('sufijos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection