@extends('site.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')

<main>

  <section class="py-5 text-center container">

    <h3>{{ $msg }}<h3>
    <a href="{{ route('area-aluno.home', ['aluno' => $aluno]) }}"><button type="button" class="btn btn-primary">Voltar</button></a>
  </section>

</main>


@endsection