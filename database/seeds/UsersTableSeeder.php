<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
        	[
        		'nome' => 'Lucas',
				'email' => 'lucas@teste',
                'celular' => '22998373121',
				'password' => '1234'
        	]);
        User::create(
            [
                'nome' => 'Alquipo',
                'email' => 'alquipo@teste',
                'celular' => '22999989597',
                'password' => '1234'
            ]);
        User::create(
            [
                'nome' => 'Davi',
                'email' => 'davi@teste',
                'celular' => '22998140604',
                'password' => '1234'
            ]);
        User::create(
            [
                'nome' => 'Isabela',
                'email' => 'isabela@teste',
                'celular' => '22998616698',
                'password' => '1234'
            ]);
        User::create(
            [
                'nome' => 'Patrícia',
                'email' => 'patricia@teste',
                'celular' => '6281275096',
                'password' => '1234'
            ]);
        
        
    }
}
