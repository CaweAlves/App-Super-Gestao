<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use App\Models\Unidade;
use App\Models\ProdutoDetalhe;
use App\Models\Fornecedor;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $produtos = Produto::with('produtoDetalhe', 'fornecedor')->paginate(10);
        $fornecedores = Fornecedor::all();

        return view('app.produto.index', ['fornecedores' => $fornecedores, 'produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fornecedores = Fornecedor::all();
        $unidades = Unidade::all();

        return view('app.produto.create', ['unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $regras = [
            'nome' => 'required|min:3|max:50',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'min' => 'O campo :attribute deve ter no minimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no maximo 50 caracteres',
            'descricao.max' => 'O campo descricao deve ter no maximo 2000 caracteres',
            'peso' => 'O campo peso só aceita números inteiros',
            'unidade_id.exists' => 'A unidade de medida informada não existe',
            'fornecedor_id.exists' => "O Fornecedor informado não existe"
        ];

        $request->validate($regras, $feedback);

        Produto::create($request->all());

        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $fornecedores = Fornecedor::all();
        $unidades = Unidade::all();

        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {

        $regras = [
            'nome' => 'required|min:3|max:50',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'min' => 'O campo :attribute deve ter no minimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no maximo 50 caracteres',
            'descricao.max' => 'O campo descricao deve ter no maximo 2000 caracteres',
            'peso' => 'O campo peso só aceita números inteiros',
            'unidade_id.exists' => 'A unidade de medida informada não existe',
            'fornecedor_id.exists' => "O Fornecedor informado não existe"
        ];

        $request->validate($regras, $feedback);

        $produto->update($request->all());
        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
