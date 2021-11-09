@extends('site.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')
<body>

<div id="banner_site"></div>
<div class="titulo-pagina">
        <h1>Área do aluno</h1>
    </div>
<main>

  <section class="py-5 text-center container">
    {{-- <span id="area_adm"><a href="{{ route('site.login') }}">Área administrativa</a></span> --}}
    <main class="form-signin">
      <form method="post" action="{{ route('area-aluno.login') }}">
        @csrf

        <div class="form-floating">
          <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
          <label for="floatingInput">E-mail</label>
          @if ($errors->has('email'))
            
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                {{ $errors->first('email') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
          <label for="floatingPassword">Senha</label>
          @if ($errors->has('senha'))
            
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                {{ $errors->first('senha') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        </div>

        @if(isset($erro) and $erro != '')
                
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                {{ $erro }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Lembrar-me
          </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
          <br><br>
          Ainda não tem cadastro?<a href="{{ route('area-aluno.create') }}"> Faça o seu cadastro aqui</a>
      </form>
    </main>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          @foreach ($cursos as $curso)
            <div class="col">
              <div class="card shadow-sm">

                    
                  <div class="card-body">
                    <h4>{{ $curso->nome_curso }}</h4>
                    <p class="card-text">{{ $curso->descricao }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                      Inscrições:<br>de
                      {{ date('d/m/Y', strtotime($curso->data_inicio_inscricoes)) }}
                      até
                      {{ date('d/m/Y', strtotime($curso->data_termino_inscricoes)) }}<br>
                      <small class="text-muted">Valor: R$ {{ $curso->valor }}</small>
                    </div>
                  </div>


              </div>
            </div>
        
          @endforeach

      </div>
    </div>
  </div>

</main>

@endsection