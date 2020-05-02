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
                    'icone' => 'money',
			        'created_at' => \Carbon\Carbon::now()->toDateTimeString()
        		],
        		[
        			'nome' => 'Investimentos',
			        'tipo' => 'R',
                    'icone' => 'line-chart',
			        'created_at' => \Carbon\Carbon::now()->toDateTimeString()
        		],
        		[
        			'nome' => 'Prêmios',
			        'tipo' => 'R',
                    'icone' => 'star',
			        'created_at' => \Carbon\Carbon::now()->toDateTimeString()
        		],
        		[
        			'nome' => 'Outros',
			        'tipo' => 'R',
                    'icone' => 'barcode',
			        'created_at' => \Carbon\Carbon::now()->toDateTimeString()
        		],
        		
        		[
        			'nome' => 'Alimentação',
			        'tipo' => 'D',
                    'icone' => 'cutlery',
			        'created_at' => \Carbon\Carbon::now()->toDateTimeString()
        		],
        		[
        			'nome' => 'Saúde',
			        'tipo' => 'D',
                    'icone' => 'heartbeat',
			        'created_at' => \Carbon\Carbon::now()->toDateTimeString()
        		],
        		[
        			'nome' => 'Educação',
			        'tipo' => 'D',
                    'icone' => 'graduation-cap',
			        'created_at' => \Carbon\Carbon::now()->toDateTimeString()
        		],
        		[
        			'nome' => 'Transporte',
			        'tipo' => 'D',
                    'icone' => 'car',
			        'created_at' => \Carbon\Carbon::now()->toDateTimeString()
        		],
        		[
        			'nome' => 'Moradia',
			        'tipo' => 'D',
                    'icone' => 'home',
			        'created_at' => \Carbon\Carbon::now()->toDateTimeString()
        		],
        		[
        			'nome' => 'Lazer',
			        'tipo' => 'D',
                    'icone' => 'futbol-o',
			        'created_at' => \Carbon\Carbon::now()->toDateTimeString()
        		],
        		[
        			'nome' => 'Outros',
			        'tipo' => 'D',
                    'icone' => 'barcode',
			        'created_at' => \Carbon\Carbon::now()->toDateTimeString()
        		],

				[
        			'nome' => 'Reserva Financeira',
			        'tipo' => 'O',
                    'icone' => 'university',
			        'created_at' => \Carbon\Carbon::now()->toDateTimeString()
        		],
        		[
        			'nome' => 'Comprar um imóvel',
			        'tipo' => 'O',
                    'icone' => 'home',
			        'created_at' => \Carbon\Carbon::now()->toDateTimeString()
        		],
        		[
        			'nome' => 'Comprar um carro',
			        'tipo' => 'O',
                    'icone' => 'car',
			        'created_at' => \Carbon\Carbon::now()->toDateTimeString()
        		],
        		[
        			'nome' => 'Comprar uma moto',
			        'tipo' => 'O',
                    'icone' => 'motorcycle',
			        'created_at' => \Carbon\Carbon::now()->toDateTimeString()
        		],
        		[
        			'nome' => 'Fazer uma viagem',
			        'tipo' => 'O',
                    'icone' => 'pane',
			        'created_at' => \Carbon\Carbon::now()->toDateTimeString()
        		],
        	]);
    }
}
