@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Receita
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($receita, ['route' => ['receitas.update', $receita->id], 'method' => 'patch']) !!}

                        @include('receitas.fields',['update' => 1])

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection