<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    //
    public function index(REQUEST $request) {

        $erro = '';

        if($request->get('erro') == 1 ){
            $erro = 'Usuário e ou senha não existe';
        }

        if($request->get('erro') == 2 ){
            $erro = 'Necessário realizar login para ter acesso a página';
        }

        
        return view('site.login', ['titulo' => 'login', 'erro' => $erro]);
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
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
        // dd($_SESSION);
            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        } 

        $usuario = $usuario;
       
    }

        public function sair(){
            echo 'Sair';
        }

}
