@extends('app.layouts.basico')

@section('titulo', 'Aluno')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina2">
            <p>Alunos</p>
        </div>

        

        <div class="informacao-pagina">
            
            
            <div style="width: 80%; margin-left: auto; margin-right: auto">
            <div class="menu">
            <ul>
            
                <li><a href="{{ route('aluno.create') }}"><button type="button" class="btn btn-dark">Novo aluno</button></a></li>
                  
            </ul>
        </div> 
                <br>
                <table class="table table-striped">
                    <tr>
                        <thead>
                            <th scope="col">Nome do aluno</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Empresa</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Celular</th>
                            <th scope="col">Data de cadastro</th>
                            <th scope="col">Ações</th>
                            
                        </thead>
                    </tr>
                    @foreach($alunos as $aluno)
                        <tr>
                            <td><a href="{{ route('aluno.show', ['aluno' => $aluno->id ]) }}">{{ $aluno->nome_aluno }}</a></td>
                            <td>{{ $aluno->email }}</td>
                            <td>{{ $aluno->empresa }}</td>
                            <td>{{ $aluno->telefone }}</td>
                            <td>{{ $aluno->celular }}</td>
                            <td>{{ date('d/m/Y', strtotime($aluno->created_at)) }}</td>
                            
                            {{-- ATUALIZAR aluno --}}
                            <td><a href="{{ route('aluno.edit', ['aluno' => $aluno->id ]) }}"><i class="bi-pencil"></i></a>

                                {{-- EXCLUIR O aluno --}}
                                <form id="form_{{$aluno->id}}" method="post" action="{{ route('aluno.destroy', ['aluno' => $aluno->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{$aluno->id}}').submit()"><i class="bi-trash"></i></a>
                                </form>
                            </td>
                            {{-- <a href="{{ route('aluno.destroy', ['aluno' => $aluno->id ]) }}"></a></td> --}}
                            
                        </tr>
                    @endforeach
                    
                </table>
                
                <div class="menu">
                    <ul>
                    
                        <li><a href="{{ route('inscricao.create') }}"><button type="button" class="btn btn-secondary">Exportar para CSV</button></a></li>
                        <li><a href="{{ route('inscricao.create') }}"><button type="button" class="btn btn-secondary">Exportar para PDF</button></a></li>
                        
                    </ul>
                </div>
            </div>
           
        </div>

    </div>

@endsection