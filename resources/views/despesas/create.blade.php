@extends('layouts.app2')

@section('content')
    <section class="content-header">
        <h1>
            Despesas
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                    {!! Form::open(['route' => 'despesas.store']) !!}

                        @include('despesas.fields')

                    {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
