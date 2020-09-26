@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Proyectos Clientes
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'proyectosClientes.store']) !!}

                        @include('proyectos_clientes.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
