<?php

use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert(
        	[
        		[
        			'nome' => 'Salário',
			        'tipo' => 'R',
			        'created_at' => \Carbon\Carbon::now()->toDateTimeString()
        		],
        		[
        			'nome' => 'Investimentos',
			        'tipo' => 'R',
			        'created_at' => \Carbon\Carbon::now()->toDateTimeString()
        		],
        		[
        			'nome' => 'Prêmios',
			        'tipo' => 'R',
			        'created_at' => \Carbon\Carbon::now()->toDateTimeString()
        		],
        		[
        			'nome' => 'Outros',
			        'tipo' => 'R',
			        'created_at' => \Carbon\Carbon::now()->toDateTimeString()
        		],
        		
        		[
        			'nome' => 'Alimentação',
			        'tipo' => 'D',
			        'created_at' => \Carbon\Carbon::now()->toDateTimeString()
        		],
        		[
        			'nome' => 'Saúde',
			        'tipo' => 'D',
			        'created_at' => \Carbon\Carbon::now()->toDateTimeString()
        		],
        		[
        			'nome' => 'Educação',
			        'tipo' => 'D',
			        'created_at' => \Carbon\Carbon::now()->toDateTimeString()
        		],
        		[
        			'nome' => 'Transporte',
			        'tipo' => 'D',
			        'created_at' => \Carbon\Carbon::now()->toDateTimeString()
        		],
        		[
        			'nome' => 'Moradia',
			        'tipo' => 'D',
			        'created_at' => \Carbon\Carbon::now()->toDateTimeString()
        		],
        		[
        			'nome' => 'Lazer',
			        'tipo' => 'D',
			        'created_at' => \Carbon\Carbon::now()->toDateTimeString()
        		],
        		[
        			'nome' => 'Outros',
			        'tipo' => 'D',
			        'created_at' => \Carbon\Carbon::now()->toDateTimeString()
        		],

				[
        			'nome' => 'Reserva Financeira',
			        'tipo' => 'O',
			        'created_at' => \Carbon\Carbon::now()->toDateTimeString()
        		],
        		[
        			'nome' => 'Comprar um imóvel',
			        'tipo' => 'O',
			        'created_at' => \Carbon\Carbon::now()->toDateTimeString()
        		],
        		[
        			'nome' => 'Comprar um carro',
			        'tipo' => 'O',
			        'created_at' => \Carbon\Carbon::now()->toDateTimeString()
        		],
        		[
        			'nome' => 'Comprar uma moto',
			        'tipo' => 'O',
			        'created_at' => \Carbon\Carbon::now()->toDateTimeString()
        		],
        		[
        			'nome' => 'Fazer uma viagem',
			        'tipo' => 'O',
			        'created_at' => \Carbon\Carbon::now()->toDateTimeString()
        		],
        	]);
    }
}
