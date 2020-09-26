@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tipo Cliente
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tipoCliente, ['route' => ['tipoClientes.update', $tipoCliente->id], 'method' => 'patch']) !!}

                        @include('tipo_clientes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection