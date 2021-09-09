@extends('site.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')

<main>

  <section class="py-5 text-center container">

    <h3>{{ $aluno->nome_aluno }}, seu cadastro foi realizado com sucesso!<h3>
    <a href="{{ route('site.index') }}"><button type="button" class="btn btn-primary">Voltar</button></a>
  </section>

</main>


@endsection