@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')
    
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Pedido </p>
        </div>

        <div class="menu">
        <ul>
        <li><a href=" {{ route('pedido.index')}} ">Voltar</a></li>
        <li><a href="">Consulta</a></li>
        </div>

        <div class="informacao-pagina"> 
            <h4>Detalhes do Pedido</h4>
            <p>Id do pedido: {{ $pedido->id }}</p>
            <p>Cliente: {{ $pedido->cliente_id }}</p>
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                @component('app.pedido_produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])
                @endcomponent
            </div>
</div>
@endsection
