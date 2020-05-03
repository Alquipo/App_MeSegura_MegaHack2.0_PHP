<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Despesas;
use App\Models\Receita;
use App\Models\Meta;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Arr;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metas = Meta::all();
        
        
           //logica para efetuar a consulta no banco e somar a tabela 'valor'
        $total_receita = DB::table('receitas')->whereNull('deleted_at')->sum('valor');
        $total_despesa = DB::table('despesas')->whereNull('deleted_at')->sum('valor');
        $saldo_total = DB::table('users')->value('saldo');

      
       //logica colocar para puxar as despesas com o a soma das categorias para as metas
        $total_despesa_meta = DB::table('despesas')->select(DB::raw('sum(valor) as total, categoria_id'))->whereIn('categoria_id',$metas->pluck('categoria_id'))->whereNull('deleted_at')->groupBy('categoria_id')->get();

        $total_despesa_meta = Arr::pluck($total_despesa_meta, 'total', 'categoria_id');
            
        //logica para puxar o valor total das metas na home
        $total_meta= Meta::get('valor');
        $total_meta= Arr::pluck($total_meta, 'valor');    
     
                

        return view('home',['total_receita' => $total_receita, 'total_despesa' => $total_despesa, 'saldo_total' => $saldo_total])->with('metas', $metas)->with('total_despesa_meta', $total_despesa_meta)->with('total_meta', $total_meta);

    }
}
