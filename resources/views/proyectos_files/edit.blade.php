@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Proyectos Files
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($proyectosFiles, ['route' => ['proyectosFiles.update', $proyectosFiles->id], 'method' => 'patch']) !!}

                        @include('proyectos_files.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection