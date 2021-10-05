<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao, $perfil)
    {

        

        // Verifica se o usuario tem acesso a rota
        echo $metodo_autenticacao.$perfil.'<br>';'<br>';

        if($metodo_autenticacao == 'padrao'){
            echo 'Verificar o usuário e senha no banco de dados'.$perfil.'<br>';
        }

        if($metodo_autenticacao == 'ldap'){
            echo 'Verificar o usuário e senha no AD'.$perfil.'<br>';
        } 

        if($perfil == 'visitante'){
            echo 'Exibir apenas alguns recursos'.'<br>';
        }else {
            echo 'Carregar perfil do banco de dados';
        }

        if(false){
            return $next($request);
        }else{
            return Response('Acesso Negado!!! Está rota exige autenticação.');
        }
    }
}
