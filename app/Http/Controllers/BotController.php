<?php

//AUTOPILOT NAO CONSIGO FAZER RECONHECER O JSON

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Carbon\Carbon;
use App\Models\Receita;
use App\Models\Despesas;
use App\User;
use App\Models\Meta;

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
        $numero = str_replace('whatsapp:+55', '', $request->get('UserIdentifier'));
        $user = User::where('celular', $numero)->first();

        switch ($respostas->categoria->answer){
            case "salário":
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

        // $respostas->user_id = $input->user_id;
        $respostas->data = Carbon::now()->toDateString();

        // return (json_decode(json_encode($respostas), true));

        $receita = Receita::create(
            [
                'nome' => $respostas->categoria->answer,
                'valor'=> $respostas->valor->answer,
                'data' => $respostas->data,
                'categoria_id' => $respostas->categoria_id,
                'user_id' => $user->id,
            ]
        );
         return json_encode(['actions'=>[['say'=> 'Receita de '.$receita->categoria->nome.' cadastrada com sucesso!']]]);
    }

     public function storeDespesa(Request $request)
    {
        // return ($request->all());
        $input = json_decode($request->get('Memory'));
        $respostas = $input->twilio->collected_data->collect_despesa->answers;

        $numero = str_replace('whatsapp:+55', '', $request->get('UserIdentifier'));
        $user = User::where('celular', $numero)->first();


        switch ($respostas->categoria->answer){
            case "alimentação":
                $respostas->categoria_id = 5;
                break;
            case "saúde":
                $respostas->categoria_id = 6;
                break;
            case "educação":
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

        $respostas->data = Carbon::now()->toDateString();

        $despesa = Despesas::create(
            [
                'nome' => $respostas->categoria->answer,
                'valor'=> $respostas->valor->answer,
                'data' => $respostas->data,
                'categoria_id' => $respostas->categoria_id,
                'user_id' => $user->id,
            ]
        );

         return json_encode(['actions'=>[['say'=> 'Despesa de '.$despesa->categoria->nome.' cadastrada com sucesso!']]]);
    }

    public function storeMetas(Request $request)
    {
        // return ($request->all());
        $input = json_decode($request->get('Memory'));
        $respostas = $input->twilio->collected_data->collect_meta->answers;

        $numero = str_replace('whatsapp:+55', '', $request->get('UserIdentifier'));
        $user = User::where('celular', $numero)->first();


        switch ($respostas->categoria->answer){
            case "alimentação":
                $respostas->categoria_id = 5;
                break;
            case "saúde":
                $respostas->categoria_id = 6;
                break;
            case "educação":
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

        // $respostas->user_id = $input->user_id;

        // return (json_decode(json_encode($respostas), true));

        $meta = Meta::create(
            [
                'nome' => $respostas->categoria->answer,
                'valor'=> $respostas->valor->answer,
                'categoria_id' => $respostas->categoria_id,
                'user_id' => $user->id,
            ]
        );
         return json_encode(['actions'=>[['say'=> 'Meta com '.$meta->categoria->nome.' cadastrada com sucesso!']]]);
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
            return json_encode(['actions'=>[['say'=> "Olá! Verifiquei que você ainda não é cadastrado na nossa plataforma. Acesse o link para se cadastrar. \n\n http://www.mesegura.moldar.net/"]]]);
        }

    }

    public function listarReceitas(Request $request)
    {   
        $numero = str_replace('whatsapp:+55', '', $request->get('UserIdentifier'));
        $user = User::where('celular', $numero)->first();
        $receitas = $user->receitas;

        $saida = '';
        foreach($receitas as $receita)
        {
            $saida =  $saida . "\n" .  $receita->nome . " | " . $receita->data_formatada . " | " . $receita->categoria->nome . " | " . $receita->valor_receita_formatado ;
        }

        // return $saida;

        return json_encode(['actions' =>
                [
                    ['say' => 'Estas são as suas receitas:' . $saida]]
            ]);
    }

    public function listarDespesas(Request $request)
    {   
        $numero = str_replace('whatsapp:+55', '', $request->get('UserIdentifier'));
        $user = User::where('celular', $numero)->first();
        $despesas = $user->despesas;

        $saida = '';
        foreach($despesas as $despesa)
        {
            $saida =  $saida . "\n" .  $despesa->nome . " | " . $despesa->data_formatada . " | " . $despesa->categoria->nome . " | " . $despesa->valor_despesa_formatado ;
        }

        // return $saida;

        return json_encode(['actions' =>
                [
                    ['say' => 'Estas são as suas despesas:' . $saida]]
            ]);
    }

    public function listarMetas(Request $request)
    {
        $numero = str_replace('whatsapp:+55', '', $request->get('UserIdentifier'));
        $user = User::where('celular', $numero)->first();

        $metas = $user->metas;
        // return $metas;

        $saida = "Nesse mês, você já gastou: \n" ;
        // $total_metas = 0;
        $total_geral_despesas = 0;

        foreach($metas as $meta)
        {
            $total_despesas = Despesas::where('categoria_id', $meta->categoria_id)->sum('valor');
            $porcentagem = ($total_despesas / $meta->valor) * 100;
            $saida = $saida . $porcentagem ."% de ". $meta->categoria->nome." = R$ ".$total_despesas." de ". $meta->valor . "\n";
            $total_geral_despesas += $total_despesas;
        }

        $total_metas = Meta::sum('valor');

        $porcentagem_total = ($total_geral_despesas / $total_metas) * 100;

        $saida = $saida . "\n" . "Você já gastou ".number_format($porcentagem_total, 2, '.', ',')."% da sua meta total de gastos = R$ ".$total_geral_despesas." de ". $total_metas; 

        return json_encode(['actions' =>
                [
                    ['say' => $saida]]
            ]);   

    }
    
}
