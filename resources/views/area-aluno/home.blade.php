@extends('site.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')

<main>

  <section class="py-5 text-center container">
    <h4>Olá, {{ $aluno->nome_aluno }} | <a href="{{ route('area-aluno.logout') }}">sair</a></h4>
                

    <main class="form-signin">
        <form method="post" action="{{ route('area-aluno.inscrever') }}">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Fazer inscrição</h1>

            <div class="form-floating">
            <input type="text" class="form-control" id="nome_aluno" name="nome_aluno" value="{{ $aluno->nome_aluno }}" placeholder="E-mail">
            
            <input type="hidden" class="form-control" id="aluno_id" name="aluno_id" value="{{ $aluno->id }}" placeholder="E-mail">
            <label for="floatingInput">Nome</label>
            @if ($errors->has('nome_aluno'))
                
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{ $errors->first('nome_aluno') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            </div>
            <div class="form-floating">
                <select class="form-select" id="curso" name="curso" aria-label="Default select example">
                    <option value="">-- Selecione o Curso --</option>
                    @foreach ($cursos as $curso)
                        <option value="{{$curso->id}}">{{$curso->nome_curso}}</option>
                        
                    @endforeach
                        
                </select>
                <label for="floatingPassword">Curso</label>
                @if ($errors->has('curso'))
                
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ $errors->first('curso') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>

            <div class="checkbox mb-3">
            
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Inscrever</button>
            
        </form>
    </main>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">
        <h1 class="h3 mb-3 fw-normal">Minhas inscricões</h1>

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach ($inscricoes as $inscricao)
            <div class="col">
                <div class="card shadow-sm">
                
                        
                    <div class="card-body">
                        <h4>{{ $inscricao->nome_curso }}</h4>
                        <p class="card-text">{{ $inscricao->descricao }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                        Início: {{ date('d/m/Y', strtotime($inscricao->data_inicio_curso)) }}<br>
                        Data da inscrição: {{ date('d/m/Y', strtotime($inscricao->created_at)) }}<br>
                        
                        <small class="text-muted">Valor: R$ {{ $inscricao->valor }}</small>
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