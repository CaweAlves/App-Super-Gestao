@extends('site.layouts.basico')

@section('titulo', $titulo)
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>

        <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right: auto;">
            <form action={{ route('site.login') }} method="post">
                @csrf
                <input name="email" value="{{ old('email') }}" type="text" placeholder="email" class="borda-preta">
                {{ $errors->has('email') ? $errors->first('email') : '' }}
                <input name="senha" value="{{ old('senha') }}" type="password" placeholder="Senha" class="borda-preta">
                {{ $errors->has('senha') ? $errors->first('senha') : '' }}
                <button type="submit" class="borda-preta">Acessar</button>
                </form>

                {{ isset($erro) && $erro != '' ? $erro : '' }}

            </div>
        </div>  
    </div>

    <div class="rodape">
        <div class="redes-sociais">
            <h2>Redes sociais</h2>
            <img src="{{asset('img/facebook.png')}}">
            <img src="{{asset('img/linkedin.png')}}">
            <img src="{{asset('img/youtube.png')}}">
        </div>
        <div class="area-contato">
            <h2>Contato</h2>
            <span>(00) 000000000</span>
            <br>
            <span>supergestao@dominio.com.br</span>
        </div>
        <div class="localizacao">
            <h2>Localização</h2>
            <img src="{{asset('img/mapa.png')}}"">
        </div>
    </div>
    </body>
</html>
@endsection