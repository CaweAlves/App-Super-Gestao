<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index(){

        return view('app.fornecedor.index');
    }

    public function listar(REQUEST $request){

        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->input('nome').'%')
                                ->where('site', 'like', '%'.$request->input('site').'%')
                                ->where('uf', 'like', '%'.$request->input('uf').'%')
                                ->where('email', 'like', '%'.$request->input('email').'%')
                                ->get();

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores]);
    }

    public function adicionar(REQUEST $request){

        $msg = '';

        if($request->input('_token') != '') {
            //validação
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo nome deve ter no minimo 3 caracteres',
                'nome.max' => 'O campo nome deve ter no maximo 40 caracteres',
                'uf.min' => 'O campo uf deve ter no minimo 2 caracteres',
                'uf.max' => 'O campo uf deve ter no maximo 2 caracteres',
                'email' => 'O campo email não foi preenchido corretamente '
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());
            
            $msg = 'Cadastro Realizado com Sucesso';
        }

        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }
}
