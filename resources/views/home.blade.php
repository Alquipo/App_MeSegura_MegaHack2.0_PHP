@extends('layouts.app2')

@section('content')
<div class="container">
	@include('flash::message')
    <div class="row top-home text-center">
    		<div class="col-12">
    			<div class="row justify-content-center">
    				<div class="col-6">
    					<span class="valores-home">SALDO ATUAL</span><br>
	    				<strong><span class="valores-home">{{$saldo_total}}</span></strong>
    				</div>
    			</div>
    			<div class="row justify-content-between">
    				<div class="col-4">
    					<a href="{{route('receitas.index')}}" title="">
	    					<span class="valores-home">RECEITAS</span><br>
	    					<strong><span class="valores-home">{{$total_receita}}</span></strong>
    					</a>
    				</div>
    				<div class="col-4">
    					<a href="{{route('despesas.index')}}" title="">
	    					<span class="valores-home">DESPESAS</span><br>
						<strong><span class="valores-home">{{$total_despesa}}</span></strong>
    					</a>
    				</div>
    			</div>
    		</div>
    </div>
    <br>
    <div class="row justify-content-center text-center">
    	<div class="col-6">
    		<a href="{{route('receitas.create')}}" title=""><button class="button-home-receita btn btn-success">Nova Receita</button></a>
    	</div>
    	<div class="col-6">
    		<a href="{{route('despesas.create')}}" title="">
    		<button class="button-home-despesa btn btn-danger ">Nova Despesa</button></a>
    		
    	</div>
    	
    </div>
    <br/>
    <div class="row">
    	<div class="col-12 ">
    		<div class="row d-flex justify-content-center">
				<div><h4>TOTAL</h4></div>
	    			<div><a href="{{route('metas.index')}}"><span title="Metas" class="badge badge-pill badge-primary">+</span></a></div>
				<div class="col-12" style="padding: 0px;">
					
					<div class="row justify-content-between">
						<div class="col-12 d-flex justify-content-center">
							<h6 class="">R$ {{array_sum($total_despesa_meta)}} de R$ {{array_sum($total_meta)}} </h6>		
						</div>
						
					</div>
				</div>
				<div class="col-md-12">
					<div class="progress" style="height: 25px; border-radius: 20px">
						<div class="progress-bar" role="progressbar" style="width: 25%; background: #93CE54" aria-valuenow="25" aria-valuemin="25" aria-valuemax="25"></div>
						<div class="progress-bar rounded-pill" role="progressbar" style="width: 25%; background: #FFE748" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
						<div class="progress-bar" role="progressbar" style="width: 25%; background: #EE6401" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
						<div class="progress-bar" role="progressbar" style="width: 25%; background: #F1002D" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				</div>
   
    		</div>
		</div>
	</div>


	<br/>
		@foreach ($metas as $meta)
			<div class="row">
				<div class="col-12 ">
					<div class="row d-flex justify-content-center">
						<div><h4>{{$meta->categoria->nome}}</h4></div>
							
						<div class="col-12" style="padding: 0px;">
							
							<div class="row justify-content-between">
								<div class="col-12 d-flex justify-content-center">
									@if (isset($total_despesa_meta[$meta->categoria_id]))
										<h6 class="">R$ {{$total_despesa_meta[$meta->categoria_id]}} de R$ {{$meta->valor_meta_formatado}}</h6>
									
									@else
										</h6>
									@endif
								</div>
								
							</div>
						</div>
						<div class="col-md-12">
							<div class="progress" style="height: 25px; border-radius: 20px">
								<div class="progress-bar" role="progressbar" style="width: 25%; background: #93CE54" aria-valuenow="25" aria-valuemin="25" aria-valuemax="25"></div>
								<div class="progress-bar rounded-pill" role="progressbar" style="width: 25%; background: #FFE748" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
								<div class="progress-bar" role="progressbar" style="width: 25%; background: #EE6401" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
								<div class="progress-bar" role="progressbar" style="width: 25%; background: #F1002D" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<br>
						
		@endforeach
   
	<br>
	<div class="text-center">
        
	</div>
</div>
@endsection
