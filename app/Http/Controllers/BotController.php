<?php

//AUTOPILOT NAO CONSIGO FAZER RECONHECER O JSON

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BotController extends Controller
{
    public function store(Request $request){
        
        $request->all($request['Memory']);
        

        
        $respostas = $request['twilio']['collected_data']['cadastro_despesa']['answers'];  
        
        $despesa_nome = $respostas['despesa_nome']['answer'];
        $depesa_categoria = $respostas['depesa_categoria']['answer'];
        $depesa_valor = $respostas['depesa_valor']['answer'];



      //  $mensagem = "Sua despesa {$despesa_nome}, da categoria {$depesa_categoria}, no valor{} foi cadastrado";
        
        
        //return json_encode(['actions'=>[['say'=> ['speech'=> $mensagem]]]]);

        //dd($respostas);
        
    }
}
