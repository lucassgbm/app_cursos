@extends('site.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')

<body class="bg-light expansion-alids-init">
    
<div class="container">
  <main>

    <div class="py-5 text-center">
      <h4>Olá, {{ $aluno->nome_aluno }} | <a href="{{ route('area-aluno.logout') }}">sair</a></h4>
      <h2>Fazer inscrição</h2>
      <p class="lead">Preenche os dados abaixo para fazer a sua inscrição</p>
    </div>

    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Minhas inscrições</span>
        </h4>
        <ul class="list-group mb-3">
            @foreach ($inscricoes as $inscricao)

                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                    <h6 class="my-0">{{ $inscricao->nome_curso }}</h6>
                    <small class="text-muted">{{ $inscricao->descricao }}</small><br><br>
                    Local: {{ $inscricao->local }}<br>
                    Início: {{ date('d/m/Y', strtotime($inscricao->data_inicio_curso)).' '.$inscricao->hora_inicio }}<br>
                        Data da inscrição: {{ date('d/m/Y', strtotime($inscricao->created_at)) }}<br><br>
                    <a href="{{ $inscricao->arquivo_material }}">material do curso</a>
                    </div>
                    <span class="text-muted">R$ {{ $inscricao->valor }}</span>
                    <br>
                </li>
                <br>

            @endforeach

        </ul>


      </div>
      <div class="col-md-7 col-lg-8">
        <form method="post" action="{{ route('area-aluno.inscrever') }}">
        @csrf

          <div class="row g-3">

            <div class="col-12">
              <label for="username" class="form-label">Nome</label>
              <div class="input-group">
                <input type="text" class="form-control" id="nome_aluno" name="nome_aluno" value="{{ $aluno->nome_aluno }}" placeholder="E-mail" readonly>
                <input type="hidden" class="form-control" id="aluno_id" name="aluno_id" value="{{ $aluno->id }}" placeholder="E-mail">
                @if ($errors->has('nome_aluno'))
                    
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ $errors->first('nome_aluno') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
              </div>
            </div>
            <div class="col-12">
                <label for="username" class="form-label">Curso</label>
                <select class="form-select" id="curso" name="curso" aria-label="Default select example">
                    <option value="">-- Selecione o Curso --</option>
                    @foreach ($cursos as $curso)
                        <option value="{{$curso->id}}">{{$curso->nome_curso}}</option>
                        
                    @endforeach
                        
                </select>
                @if ($errors->has('curso'))
                
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ $errors->first('curso') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>

          <hr class="my-4">

          <h4 class="mb-3">Pagamento</h4>

          <div class="my-3">
            <div class="form-check">
              <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked="checked">
              <label class="form-check-label" for="credit">Boleto</label>
            </div>
            
          </div>
          

          <hr class="my-4">

            <button class="w-100 btn btn-lg btn-primary" type="submit">Inscrever</button>

        </form>
      </div>
    </div>
  </main>

</div>

</body>

@endsection