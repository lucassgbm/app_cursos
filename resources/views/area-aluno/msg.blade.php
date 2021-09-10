@extends('site.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')

<main>

  <section class="py-5 text-center container">

  @if ($msg == 'error')
      <div class="alert alert-info" role="alert">
        Houve um erro ao tentar gerar o seu boleto. Por favor, entre em contato com o suporte.
      </div>
  @else
    <div class="alert alert-info" role="alert">
        Segue abaixo o boleto. A inscrição será efetivada com o pagamento.
      </div>
    <iframe src="{{ $msg }}" width="100%" height="300" style="border:none;"></iframe>
  @endif
    <a href="{{ route('area-aluno.home', ['aluno' => $aluno]) }}"><button type="button" class="btn btn-primary">Voltar</button></a>
  </section>

</main>


@endsection