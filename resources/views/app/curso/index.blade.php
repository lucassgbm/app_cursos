@extends('app.layouts.basico')

@section('titulo', 'Inscrições')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina2">
            <p>Cursos</p>
        </div>

        

        <div class="informacao-pagina">
            
            
            <div style="width: 80%; margin-left: auto; margin-right: auto">
            <div class="menu">
            <ul>
            
                <li><a href="{{ route('curso.create') }}"><button type="button" class="btn btn-dark">Novo curso</button></a></li>
                  
            </ul>
        </div> 
                <br>
                <table class="table table-striped">
                    <tr>
                        <thead>
                            <th scope="col">Nome do curso</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Data de início das inscrições</th>
                            <th scope="col">Data de término das inscrições</th>
                            <th scope="col">Qtd máxima de inscritos</th>
                            <th scope="col">Ações</th>
                            
                        </thead>
                    </tr>
                    @foreach($cursos as $curso)
                        <tr>
                            <td><a href="{{ route('curso.show', ['curso' => $curso->id ]) }}">{{ $curso->nome_curso }}</a></td>
                            <td>{{ $curso->descricao }}</td>
                            <td>R$ {{ $curso->valor }}</td>
                            <td>{{ date('d/m/Y', strtotime($curso->data_inicio_inscricoes)) }}</td>
                            <td>{{ date('d/m/Y', strtotime($curso->data_termino_inscricoes)) }}</td>
                            <td>{{ $curso->qtd_max_inscritos }}</td>
                            
                            {{-- ATUALIZAR CURSO --}}
                            <td><a href="{{ route('curso.edit', ['curso' => $curso->id ]) }}"><i class="bi-pencil"></i></a>

                                {{-- EXCLUIR O CURSO --}}
                                <form id="form_{{$curso->id}}" method="post" action="{{ route('curso.destroy', ['curso' => $curso->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{$curso->id}}').submit()"><i class="bi-trash"></i></a>
                                </form>
                            </td>
                            {{-- <a href="{{ route('curso.destroy', ['curso' => $curso->id ]) }}"></a></td> --}}
                            
                        </tr>
                    @endforeach
                    
                </table>
                
                <div class="menu">
                    <ul>
                    
                        {{-- <li><a href="{{ route('inscricao.create') }}"><button type="button" class="btn btn-secondary">Exportar para CSV</button></a></li>
                        <li><a href="{{ route('inscricao.create') }}"><button type="button" class="btn btn-secondary">Exportar para PDF</button></a></li>
                         --}}
                    </ul>
                </div>
            </div>
           
        </div>

    </div>

@endsection