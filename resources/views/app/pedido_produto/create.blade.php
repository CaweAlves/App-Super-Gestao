@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Pedido </p>
        </div>

        <div class="menu">
            <ul>
                <li><a href=" {{ route('pedido.index') }} ">Voltar</a></li>
                <li><a href="">Consulta</a></li>
        </div>

        <div class="informacao-pagina">
            <h4>Detalhes do Pedido</h4>
            <p>Id do pedido: {{ $pedido->id }}</p>
            <p>Cliente: {{ $pedido->cliente_id }}</p>
            <div style="width: 25%; margin-left: auto; margin-right: auto;">
                <h4>Itens do pedido</h4>
                <hr style="border: 1px solid"><br>
                @foreach ($pedido->produtos as $key => $produto)
                    <table border="1px" width="100%">
                        <thead>
                            <tr>
                                <th width="10%">ID:</th>
                                <th>Nome do Produto:</th>
                                <th>Data de inclusão do Pedido:</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $produto->id }}</td>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->created_at->format('d/m/y á\s H:m') }}</td>
                                <td>
                                    <form id="form_{{ $produto->pivot->id }}"
                                        action="{{ route('pedido-produto.destroy', ['pedidoProduto' => $produto->pivot->id, 'pedido_id' => $pedido->id]) }}"
                                        method="POST">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                    <a href="#"
                                        onclick="document.getElementById('form_{{ $produto->pivot->id }}').submit()">Excluir</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                @endforeach

                @component('app.pedido_produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])
                @endcomponent
            </div>
        </div>
    @endsection
