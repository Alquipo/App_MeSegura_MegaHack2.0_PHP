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
                   {!! Form::model($despesas, ['route' => ['despesas.update', $despesas->id], 'method' => 'patch']) !!}

                        @include('despesas.fields',['update' => 1])

                   {!! Form::close() !!}
           </div>
       </div>
   </div>
@endsection