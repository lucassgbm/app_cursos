@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina2">
            <p>Inscrições</p>
        </div>

        

        <div class="informacao-pagina">
            
            
            <div style="width: 80%; margin-left: auto; margin-right: auto">
            <div class="menu">
            <ul>
            
                {{-- <li>
                    <form class="row g-3">
                        
                        <div class="col-auto">
                            <input type="text" class="form-control" id="inputPassword2" placeholder="pesquisar">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-secondary">pesquisar</button>
                        </div>

                    </form>
                </li> --}}
                <li><a href="{{ route('inscricao.create') }}"><button type="button" class="btn btn-dark">Nova inscrição</button></a></li>
                  
            </ul>
        </div> 
                <br>
                <table class="table table-striped">
                    <tr>
                        <thead>
                            <th scope="col">Inscrito</th>
                            <th scope="col">Curso</th>
                            <th scope="col">Data da inscrição</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">CPF</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Status</th>
                            <th scope="col">Ações</th>
                        </thead>
                    </tr>
                    @foreach ($inscricoes as $inscricao)
                        <tr>
                            <td><a href="{{ route('inscricao.show', ['inscricao' => $inscricao->id ]) }}">{{ $inscricao->nome_aluno }}</a></td>
                            <td>{{ $inscricao->nome_curso }}</td>
                            <td>{{ date('d/m/Y', strtotime($inscricao->created_at)) }}</td>
                            <td>{{ $inscricao->nome_categoria }}</td>
                            <td>{{ $inscricao->cpf }}</td>
                            <td>{{ $inscricao->email }}</td>
                            <td>{{ $inscricao->nome_status }}</td>
                            
                            {{-- ATUALIZAR INSCRICAO --}}
                            <td><a href="{{ route('inscricao.edit', ['inscricao' => $inscricao->id ]) }}"><i class="bi-pencil"></i></a>

                                {{-- EXCLUIR A INSCRICAO --}}
                                <form id="form_{{$inscricao->id}}" method="post" action="{{ route('inscricao.destroy', ['inscricao' => $inscricao->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{$inscricao->id}}').submit()"><i class="bi-trash"></i></a>
                                </form>
                            </td>
                            {{-- <a href="{{ route('inscricao.destroy', ['inscricao' => $inscricao->id ]) }}"></a></td> --}}
                            
                        </tr>
                    @endforeach
                </table>
                {{-- @component('app.cliente._components.form_create_edit')
                @endcomponent --}}
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