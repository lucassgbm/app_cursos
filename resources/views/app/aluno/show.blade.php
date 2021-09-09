@extends('app.layouts.basico')

@section('titulo', 'Alunos')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina2">
            <p>Aluno</p>
        </div>

        <div class="informacao-pagina">
            <div style="width: 80%; margin-left: auto; margin-right: auto">

            <div class="menu">
                <ul>
                    <li><a href="{{ route('aluno.index') }}"><button type="button" class="btn btn-primary">Voltar</button></a></li>
                        
                    </ul>
            </div> 
                <table class="table">
                    <tr>
                        <th><label class="form-label">Nome do aluno</label></th>
                        <td> {{ $aluno->nome_aluno }} </td>
                    </tr>
                    <tr>
                        <th><label class="form-label">Endereço</label></th>
                        <td> {{ $aluno->endereco }} </td>
                    </tr>
                    <tr>
                        <th><label class="form-label">E-mail</label></th>
                        <td> {{ $aluno->email }} </td>
                    </tr>
                    <tr>
                        <th><label class="form-label">CPF</label></th>
                        <td> {{ $aluno->cpf }} </td>
                    </tr>
                    <tr>
                        <th><label class="form-label">Empresa</label></th>
                        <td> {{ $aluno->empresa }} </td>
                    </tr>
                    <tr>
                        <th><label class="form-label">Telefone</label></th>
                        <td> {{ $aluno->telefone }} </td>
                    </tr>
                    <tr>
                        <th><label class="form-label">Celular</label></th>
                        <td> {{ $aluno->celular }} </td>
                    </tr>
                    
                
                </table>
           </div>
        </div>

    </div>

@endsection
