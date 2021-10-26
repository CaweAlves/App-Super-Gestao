<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {

        $motivo_contatos = MotivoContato::all();
        // echo '<pre>';
        // print_r($request->all());
        // echo '</pre>';
        // echo $request->input('nome');
        // echo '<br>';
        // echo $request->input('email');
        /*
        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');

        //print_r($contato->getAttributes());

        $contato->save();
        */

        // $contato =  new SiteContato();
        // $contato->create($request->all());

        //$contato->save();
        //print_r($contato->getAttributes());

        return view('site.contato', ['titulo' => 'Contato', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request)
    {


        $regras =
            [
                'nome' => 'required|min:3|max:40|unique:site_contatos',
                'telefone' => 'required',
                'email' => 'email',
                'motivo_contatos_id' => 'required',
                'mensagem' => 'required|max:2000'
            ];

        $feedbacks =
            [
                // FEEDBACKS DE VALIDAÇÕES ESPECIFICOS
                'nome.min' => 'O campo nome precisa ter no minimo 3 caracteres',
                'nome.max' => 'A mensagem deve ter no maximo 40 caracteres',
                'nome.unique' => 'Este nome já está sendo utilizado',

                'email.email' => 'O email informado não é valido',

                'mensagem.max' => 'A mensagem deve ter no maximo 2000 caracteres',

                // FEEDBACKS DE VALIDAÇÕES GENERICOS
                'required' => 'O campo :attribute deve ser preenchido'
            ];

        // Realizar validação dos formularios recebidos no request
        $request->validate($regras, $feedbacks);

        SiteContato::create($request->all());
        return redirect()->route('site.sucesso');
    }
}
