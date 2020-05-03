@extends('layouts.app2')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Metas</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('metas.create') }}">Adicionar Novo</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        {{-- <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('metas.table')
            </div>
        </div> --}}
        <div class="row align-items-center">
            @foreach($metas as $meta)
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="padding-left: 8px; padding-right: 8px;">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="card-title">{{$meta->categoria->nome}}
                                <i class="fa fa-{{$meta->categoria->icone}}" title="{{$meta->categoria->nome}}" aria-hidden="true"></i>
                                {{-- @if($receita->efetuada)
                                    <span class="status-span bg" title="Efetuada"></span>
                                 @else
                                    <span class="status-span br" title="Pendente"></span>
                                 @endif --}}
                                 </h5>
                                {{-- <h6 class="card-subtitle mb-2 muted">{{$meta->data_formatada}}</h6> --}}
                            </div>
                            <div class="col-6">
                                <span>R$ {{$meta->valor_meta_formatado}}</span><br>
                                {!! Form::open(['route' => ['metas.destroy', $meta->id], 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    <a href="{{ route('metas.edit', [$meta->id]) }}" class='btn btn-secondary btn-xs' title="Editar"><i class="fa fa-pencil"></i></a> 
                                    {!! Form::button('<i class="fa fa-trash" title="Excluir"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Você tem certeza?')"]) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
        <div class="text-center">
        
        </div>
    </div>
@endsection

