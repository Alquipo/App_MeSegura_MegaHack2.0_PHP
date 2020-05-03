<?php

//AUTOPILOT NAO CONSIGO FAZER RECONHECER O JSON

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Carbon\Carbon;
use App\Models\Receita;
use App\Models\Despesas;
use App\User;

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

    public function storeReceita(Request $request)
    {
        // return ($request->all());
        $input = json_decode($request->get('Memory'));
        $respostas = $input->twilio->collected_data->collect_receita->answers;

        switch ($respostas->categoria->answer){
            case "salario" || "salário":
                $respostas->categoria_id = 1;
                break;
            case "investimentos":
                $respostas->categoria_id = 2;
                break;
            case "prêmios":
                $respostas->categoria_id = 3;
                break;
            case "outros":
                $respostas->categoria_id = 4;
                break;
            default:
                $respostas->categoria_id = 4;
        }

        $respostas->user_id = 1;
        $respostas->data = Carbon::now()->toDateString();

        // return (json_decode(json_encode($respostas), true));

        $receita = Receita::create(
            [
                'nome' => $respostas->categoria->answer,
                'valor'=> $respostas->valor->answer,
                'data' => $respostas->data,
                'categoria_id' => $respostas->categoria_id,
                'user_id' => $respostas->user_id,
            ]
        );
         return json_encode(['actions'=>[['say'=> 'Receita de '.$receita->categoria->nome.' cadastrada com sucesso!']]]);
    }

     public function storeDespesa(Request $request)
    {

        $input = json_decode($request->get('Memory'));
        $respostas = $input->twilio->collected_data->collect_despesa->answers;


        switch ($respostas->categoria->answer){
            case "alimentação":
                $respostas->categoria_id = 5;
                break;
            case "saude":
                $respostas->categoria_id = 6;
                break;
            case "educacao":
                $respostas->categoria_id = 7;
                break;
            case "transporte":
                $respostas->categoria_id = 8;
                break;
            case "moradia":
                $respostas->categoria_id = 9;
                break;
            case "lazer":
                $respostas->categoria_id = 10;
                break;
            case "outros":
                $respostas->categoria_id = 11;
                break;
            default:
                $respostas->categoria_id = 11;
        }

        $respostas->user_id = 1;
        $respostas->data = Carbon::now()->toDateString();

        // return (json_decode(json_encode($respostas), true));

        $despesa = Despesas::create(
            [
                'nome' => $respostas->categoria->answer,
                'valor'=> $respostas->valor->answer,
                'data' => $respostas->data,
                'categoria_id' => $respostas->categoria_id,
                'user_id' => $respostas->user_id,
            ]
        );
         return json_encode(['actions'=>[['say'=> 'Despesa com '.$despesa->categoria->nome.' cadastrada com sucesso!']]]);
    }

    public function reconhecer(Request $request)
    {
        $numero = str_replace('whatsapp:+55', '', $request->get('UserIdentifier'));
        $user = User::where('celular', $numero)->first();

        if($user != null)
        {
            return json_encode(
                ['actions'=>[
                    ['say'=> 'Olá '.$user->nome.' ! Deseja cadastrar uma Receita ou Despesa? Ou quer visualizar suas metas?'],
                    ['listen' => true],
                    ['remember' => [
                        'user_id' => $user->id,
                        'user_nome' => $user->nome
                    ]]
                ]
                ]);
        }
        else
        {
            return json_encode(['actions'=>[['say'=> 'Olá! Verifiquei que você ainda não é cadastrado na nossa plataforma. Acesse o link para se cadastrar. http://be4d0c67.ngrok.io']]]);
        }

    }
    
}
