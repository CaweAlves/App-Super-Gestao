<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    //
    public function index() {
        return view('site.login', ['titulo' => 'login']);
    }

    public function autenticar(REQUEST $request) {
        // regras de validação
        $regras = [
            'email' => 'email',
            'senha' => 'required'
        ];

        // feedbacks de validação
        $feedback = [
        'email.email' => 'O email informado não é valido',
        'senha.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras, $feedback);
        
        $email = $request->get('email');
        $password = $request->get('senha');

        echo "email: $email | Senha: $password <br>";

        //iniciar Model user
        $user = new User();

        $usuario = $user->where('email', $email) 
                       ->where('password', $password)
                       ->get()
                       ->first();

        if(isset($usuario->name)){
            echo 'Usuário existe';
        } else {
            echo 'Usuário não existe';
        } 

        $usuario = $usuario;
       
    }

    
}
