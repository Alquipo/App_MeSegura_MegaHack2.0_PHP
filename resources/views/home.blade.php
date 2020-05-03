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
    <br>
    <div class="row">
    	<div class="col-12 ">
    		<div class="row d-flex justify-content-center">
				<div><h4>TOTAL</h4></div>
	    			<div><a href="{{route('metas.index')}}"><span title="Metas" class="badge badge-pill badge-primary">+</span></a></div>
				<div class="col-12" style="padding: 0px;">
					
					<div class="row justify-content-between">
						<div class="col-12 d-flex justify-content-center">
							<h6 class="">R$ 1425,00 de R$ 1800,00</h6>		
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
    			{{-- <div class="col-md-12">
    				<div class="d-flex flex-row align-items-center">
    					<div class="p-2 flex-fill barra-verde" style="background-color: #5EB43E; z-index: 4; left: 15px">
    						
    					</div>
    					<div class="p-2 flex-fill barra-amarela" style="background-color: #FCC60C; z-index: 3">
    						
    					</div>
    					<div class="p-2 flex-fill barra-laranja fundo-vazio" style="background-color: #F7A00E; z-index: 2; left: -15px;">
    						
    					</div>
    					<div class="p-2 flex-fill barra-vermelha fundo-vazio" style="background-color: #dc3545; z-index: 1; left: -30px;">
    						
    					</div>
    				</div>
    			</div> --}}
    			
    		</div>
    		<div class="row">
    			
    		</div>
    	</div>
    	
    </div>
    <br>
</div>
@endsection
