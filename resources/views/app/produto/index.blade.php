@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de Produtos</p>
        </div>

        <div class="menu">
        <ul>
        <li><a href=" {{ route('produto.create')}} ">Novo</a></li>
        <li><a href=" {{ route('produto.index')}} ">Consulta</a></li>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Peso</th>
                        <th>unidade ID</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        </tr>
                    </thead>

                    <tbody>    
                        
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->descricao }}</td>
                                <td>{{ $produto->peso }}</td>
                                <td>{{ $produto->unidade_id }}</td>
                                <td><a href="{{ route('produto.show', ['produto' => $produto->id]) }}">Visualizar</a></td>
                                <td>
                                <form id="form_{{$produto->id}}" method="post" action="{{ route('produto.destroy', ['produto' => $produto->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>
                                </td>
                                <td><a href="{{ route('produto.edit', ['produto' => $produto->id]) }}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $produtos->appends($request)->links() }}
                <br>

                Exibindo  {{ $produtos->count() }} produtos de {{ $produtos->total() }} 
                    (de {{ $produtos->firstItem() }} a {{ $produtos->LastItem() }} )
{{-- 
                {{ $fornecedores->count() }} - Total de registros por página
                <br>
                {{ $fornecedores->total() }} - Total de registros da consulta
                <br>
                {{ $fornecedores->firstItem() }} - Número do primeiro registro da página
                <br>
                {{ $fornecedores->firstItem() }} - Número do primeiro registro da página
                <br>
                {{ $fornecedores->LastItem() }} - Número do último registro da página --}}

        </div>
</div>
@endsection
