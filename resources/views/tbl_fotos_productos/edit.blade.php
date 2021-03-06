@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tbl Fotos Productos
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tblFotosProductos, ['route' => ['tblFotosProductos.update', $tblFotosProductos->id], 'method' => 'patch']) !!}

                        @include('tbl_fotos_productos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection