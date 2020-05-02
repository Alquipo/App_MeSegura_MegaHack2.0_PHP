@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row top-home text-center">
    		<div class="col-12">
    			<div class="row justify-content-center">
    				<div class="col-4">
    					<span class="valores-home">SALDO ATUAL</span><br>
	    				<strong><span class="valores-home">R$ 375,00</span></strong>
    				</div>
    			</div>
    			<div class="row justify-content-between">
    				<div class="col-4">
    					<span class="valores-home">RECEITA</span><br>
    					<strong><span class="valores-home">R$ 2100,00</span></strong>
    				</div>
    				<div class="col-4">
    					<span class="valores-home">DESPESA</span><br>
    					<strong><span class="valores-home">R$ 1800,00</span></strong>
    				</div>
    			</div>
    		</div>
    </div>
    <br>
    <div class="row justify-content-center text-center">
    	<div class="col-6">
    		<button href="#" class="button-home-receita btn btn-success">Nova Receita</button>
    		
    	</div>
    	<div class="col-6">
    		<button href="#" class="button-home-despesa btn btn-danger ">Nova Despesa</button>
    		
    	</div>
    	
    </div>
</div>
@endsection
