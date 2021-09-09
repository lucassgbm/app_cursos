@extends('app.layouts.basico')

@section('titulo', 'Inscrições')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina2">
            <p>Inscrição</p>
        </div>

        <div class="informacao-pagina">
            <div style="width: 80%; margin-left: auto; margin-right: auto">
                
                <div class="menu">
                    <ul>
                        <li><a href="{{ route('inscricao.index') }}"><button type="button" class="btn btn-primary">Voltar</button></a></li>
                        <li>
                        
                        <a href="{{ route('inscricao.edit', ['inscricao' => $inscricao->id ]) }}"><button type="button" class="btn btn-primary">Editar</button></a>                        
                        </li>
                            
                    </ul>
                </div>
                <br>
                <table class="table">
                    <tr>
                        <th><label class="form-label">Nome do inscrito</label></th>
                        <td> {{ $inscricao->aluno->nome_aluno }} </td>
                    </tr>
                    <tr>
                        <th><label class="form-label">Curso</label></th>
                        <td> {{ $inscricao->curso->nome_curso }} </td>
                    </tr>
                    <tr>
                        <th><label class="form-label">Valor</label></th>
                        <td> {{ $inscricao->curso->valor }} </td>
                    </tr>
                    <tr>
                        <th><label class="form-label">Status</label></th>
                        <td> {{ $inscricao->status->nome_status }} </td>
                    </tr>
                    <tr>
                        <th><label class="form-label">Data de inscrição</label></th>
                        <td> {{ $inscricao->created_at }} </td>
                    </tr>
                    <tr>
                        <th><label class="form-label">Categoria</label></th>
                        <td> {{ $inscricao->Categoria->nome_categoria }} </td>
                    </tr>
                    <tr>
                        <th><label class="form-label">CPF</label></th>
                        <td> {{ $inscricao->aluno->cpf }} </td>
                    </tr>
                    <tr>
                        <th><label class="form-label">E-mail</label></th>
                        <td> {{ $inscricao->aluno->email }} </td>
                    </tr>
                    
                    
                
                </table>
           </div>
        </div>

    </div>

@endsection
