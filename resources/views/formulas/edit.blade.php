@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Formulas
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($formulas, ['route' => ['formulas.update', $formulas->id], 'method' => 'patch']) !!}

                        @include('formulas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection