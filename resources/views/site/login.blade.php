@extends('site.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')
<body>
    <div class="titulo-pagina">
        <h1>Área adminstrativa</h1>
    </div>
    
    <main class="form-signin">
    <form action={{ route('site.login') }} method="post">
        @csrf

        <div class="form-floating">

        <input type="usuario" class="form-control" name="usuario" id="floatingInput" value="{{ old('usuario') }}" placeholder="email@email.com">
            @if ($errors->has('usuario'))
                
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{ $errors->first('usuario') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

        <label for="floatingInput">E-mail</label>
        </div>
        <div class="form-floating">
        <input type="password" class="form-control" name="senha"  id="floatingPassword" value="{{ old('senha') }}" placeholder="Senha">
            @if ($errors->has('senha'))
                
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{ $errors->first('senha') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        
        <label for="floatingPassword">Senha</label>
        </div>

            @if(isset($erro) and $erro != '')
                
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{ $erro }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        
        <br>
        
        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
    </form>

    </main>
</body>
@endsection

