@extends('layouts.app2')

@section('content')
    <section class="content-header text-center">
        <h1>
            Editar as Metas
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               
                   {!! Form::model($meta, ['route' => ['metas.update', $meta->id], 'method' => 'patch']) !!}

                        @include('metas.fields',['update' => 1])

                   {!! Form::close() !!}
               
           </div>
       </div>
   </div>
@endsection