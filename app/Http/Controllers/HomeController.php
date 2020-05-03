<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Despesas;
use App\Models\Receita;
use Illuminate\Support\Facades\DB;
use App\User;


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
           
        $total_receita = DB::table('receitas')->where('deleted_at', null)->sum('valor');
        $total_despesa = DB::table('despesas')->where('deleted_at', null)->sum('valor');
        $saldo_total = DB::table('users')->value('saldo');
        

        //dd($total_receita);

        return view('home',['total_receita' => $total_receita, 'total_despesa' => $total_despesa, 'saldo_total' => $saldo_total]);
        

    }
}
