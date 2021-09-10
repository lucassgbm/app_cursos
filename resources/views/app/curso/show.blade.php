@extends('app.layouts.basico')

@section('titulo', 'Inscrições')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina2">
            <p>Curso</p>
        </div>

        <div class="informacao-pagina">
            <div style="width: 80%; margin-left: auto; margin-right: auto">

            <div class="menu">
                <ul>
                    <li><a href="{{ route('curso.index') }}"><button type="button" class="btn btn-secondary">Voltar</button></a></li>
                    <li><a href="{{ route('curso.edit', ['curso' => $curso->id ]) }}"><button type="button" class="btn btn-secondary">Editar</button></a></li>                       
                        
                </ul>
            </div> 
                <table class="table">
                    <tr>
                        <th><label class="form-label">Nome do curso</label></th>
                        <td> {{ $curso->nome_curso }} </td>
                    </tr>
                    <tr>
                        <th><label class="form-label">Descrição</label></th>
                        <td> {{ $curso->descricao }} </td>
                    </tr>
                    <tr>
                        <th><label class="form-label">Valor</label></th>
                        <td> {{ $curso->valor }} </td>
                    </tr>
                    <tr>
                        <th><label class="form-label">Data de início das inscrições</label></th>
                        <td> {{ $curso->data_inicio_inscricoes }} </td>
                    </tr>
                    <tr>
                        <th><label class="form-label">Data de término das inscrições</label></th>
                        <td> {{ $curso->data_termino_inscricoes }} </td>
                    </tr>
                    <tr>
                        <th><label class="form-label">Qtd máxima de inscritos</label></th>
                        <td> {{ $curso->qtd_max_inscritos }} </td>
                    </tr>
                    
                
                </table>
           </div>
        </div>

    </div>

@endsection
