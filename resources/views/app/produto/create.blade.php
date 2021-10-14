@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Produto </p>
        </div>

        <div class="menu">
        <ul>
        <li><a href=" {{ route('produto.index')}} ">Voltar</a></li>
        <li><a href=" {{ route('app.fornecedor')}} ">Consulta</a></li>
        </div>

        <div class="informacao-pagina"> 
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form method="post" action=" {{ route('produto.store')}} ">
                @csrf
                    <input type="text" name="nome"  placeholder="Nome" class="borda-preta">
                    
                    <input type="text" name="descricao"  placeholder="descricao" class="borda-preta"> 
                    
                    <input type="text" name="peso"  placeholder="peso" class="borda-preta">
                    
                    <select name="unidade_id">
                        <option>-- Selecione a Unidade de Medida </option>

                        @foreach ($unidades as $unidade )
                            <option value=" {{ $unidade->id }} ">Unidade</option>
                        @endforeach
                        
                    </select>

                    <button type="submit" class="borda-preta">Cadastrar</button>
            </form>
        </div>
</div>
@endsection
