@extends('site.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')

<main>

  <section class="py-5 text-center container">
    <h1 class="h3 mb-3 fw-normal">Cadastrar</h1>

    <form method="post" action="{{ route('area-aluno.store') }}">
        @csrf

        <table class="table">
            <a href="{{ route('site.index') }}"><button type="button" class="btn btn-primary">Voltar</button></a>


            <tr>
                <td><label class="form-label">Nome do aluno</label></td>
                <td><input type="text" class="form-control" id="nome_aluno" name="nome_aluno" value="{{ $aluno->nome_aluno ?? old('nome_aluno') }}" >
                {{-- {{ $errors->has('nome_aluno') ? $errors->first('nome_aluno') : '' }}</td> --}}
                @if ($errors->has('nome_aluno'))
            
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ $errors->first('nome_aluno') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </tr>
            <tr>
                <td><label class="form-label">Endereço</label></td>
                <td><textarea class="form-control" id="endereco" name="endereco"  rows="3">{{ $aluno->endereco ?? old('endereco') }}</textarea>
                {{-- {{ $errors->has('endereco') ? $errors->first('endereco') : '' }}</td> --}}
                @if ($errors->has('endereco'))
            
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ $errors->first('endereco') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </tr>
            <tr>
                <td><label class="form-label">E-mail</label></td>
                <td><input type="email" class="form-control" id="email" name="email" value="{{ $aluno->email ?? old('email') }}">
                {{-- {{ $errors->has('email') ? $errors->first('email') : '' }}</td> --}}
                @if ($errors->has('email'))
            
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ $errors->first('email') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </tr>
            <tr>
                <td><label class="form-label">CPF</label></td>
                <td><input type="text" class="form-control" id="cpf" name="cpf" value="{{ $aluno->cpf ?? old('cpf') }}">
                {{-- {{ $errors->has('cpf') ? $errors->first('cpf') : '' }}</td> --}}
                @if ($errors->has('cpf'))
            
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ $errors->first('cpf') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
            </tr>
            <tr>
                <td><label class="form-label">Empresa</label></td>
                <td><input type="text" class="form-control" id="empresa" name="empresa" value="{{ $aluno->empresa ?? old('empresa') }}">
                {{-- {{ $errors->has('empresa') ? $errors->first('empresa') : '' }}</td> --}}
                @if ($errors->has('empresa'))
            
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ $errors->first('empresa') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
            </tr>
            <tr>
                <td><label class="form-label">Telefone</label></td>
                <td><input type="text" class="form-control" id="telefone" name="telefone" value="{{ $aluno->telefone ?? old('telefone') }}">
                {{-- {{ $errors->has('telefone') ? $errors->first('telefone') : '' }}</td> --}}
                @if ($errors->has('telefone'))
            
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ $errors->first('telefone') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </tr>
            <tr>
                <td><label class="form-label">Celular</label></td>
                <td><input type="text" class="form-control" id="celular" name="celular" value="{{ $aluno->celular ?? old('celular') }}">
                {{-- {{ $errors->has('celular') ? $errors->first('celular') : '' }}</td> --}}
                @if ($errors->has('celular'))
            
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ $errors->first('celular') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </tr>
            <tr>
                <td><label class="form-label">Senha</label></td>
                <td><input type="password" class="form-control" id="senha" name="senha" value="{{ $aluno->senha ?? old('senha') }}">
                {{-- {{ $errors->has('senha') ? $errors->first('senha') : '' }}</td> --}}
                @if ($errors->has('senha'))
            
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ $errors->first('senha') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </tr>
            <tr>
                <td><label class="form-label">Confirmar senha</label></td>
                <td><input type="password" class="form-control" id="confirmar_senha" name="confirmar_senha">
                {{-- {{ $errors->has('celular') ? $errors->first('celular') : '' }}</td> --}}
                @if ($errors->has('confirmar_senha'))
            
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ $errors->first('confirmar_senha') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </tr>
                        
        </table>
       

        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
  </section>

</main>


@endsection