<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function register(Request $request)
    {	
    	$input = $request->all();
    	// dd($input);
    	User::create($input);
    	return ['msg' => 'Usuario cadastrado com sucesso'];
    }
}
