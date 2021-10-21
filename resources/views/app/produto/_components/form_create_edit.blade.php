@if(isset($produto->id))
    <form method="post" action=" {{ route('produto.update', ['produto' => $produto->id])}} ">
        @csrf
        @method('PUT')
@else
    <form method="post" action=" {{ route('produto.store')}} ">
        @csrf
@endif
        <input type="text" name="nome" value="{{ old('nome') }}"  placeholder="Nome" class="borda-preta">
            {{ $errors->has('nome') ? $errors->first('nome') : '' }}
        
        <input type="text" name="descricao" value="{{ old('descricao')}}"  placeholder="descricao" class="borda-preta"> 
            {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}

        <input type="text" name="peso" value="{{ old('peso')}}"  placeholder="peso" class="borda-preta">
            {{ $errors->has('peso') ? $errors->first('peso') : '' }}
        
        <select name="unidade_id" >
            <option>-- Selecione a Unidade de Medida </option>

            @foreach ($unidades as $unidade )
                <option value="{{$unidade->id}}" {{ old('unidade_id') == $unidade->id ? 'selected' : '' }}>Unidade</option>
            @endforeach
    
        </select>
            {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

        <button type="submit" class="borda-preta">Cadastrar</button>
    </form>