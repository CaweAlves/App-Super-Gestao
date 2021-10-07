<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index() {
        return view('site.login', ['titulo' => 'login']);
    }

    public function autenticar(REQUEST $request) {
        
        $regras = [
            'email' => 'email',
            'senha' => 'required'
        ];
        // regras de validação
        $feedback = [
        'email.email' => 'O email informado não é valido',
        'senha.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras, $feedback);

        print_r($request->all());
    }

    
}
