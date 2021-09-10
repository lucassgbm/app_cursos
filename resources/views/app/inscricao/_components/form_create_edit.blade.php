@if(isset($inscricao->id))
    <form method="post" action="{{ route('inscricao.update', ['inscricao' => $inscricao->id]) }}">
        @csrf
        @method('PUT')
@else
    <form method="post" action="{{ route('inscricao.store') }}">
        @csrf
@endif

        <table class="table">
            <tr>
                <td><label class="form-label">Nome do aluno</label></td>
                <td><input type="text" class="form-control" id="nome_aluno" name="nome_aluno" placeholder="Digite o nome para pesquisar" autocomplete="off" value="{{ $inscricao->aluno->nome_aluno ?? old('nome_aluno') }}">
                    <input type="hidden" id="aluno_id" name="aluno_id" value="{{ $inscricao->aluno->id ?? old('aluno_id') }}"> 
                    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
                    
                    <script>
                    var path = "{{ route('autocomplete')  }}";
                    $('#nome_aluno').typeahead({
                        source:  function (query, process) {
                        return $.get(path, { term: query }, function (data) {
                                return process(data);
                            });
                        }
                    });
                    </script>
                @if ($errors->has('nome_aluno'))
            
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ $errors->first('nome_aluno') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                </td>

                
            </tr>
            
            <tr>
                <td><label class="form-label">Categoria</label></td>
                <td>
                <select class="form-select" id="categoria" name="categoria" aria-label="Default select example">
                    <option value="">-- Selecione a Categoria --</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ ($inscricao->categoria_id ?? old('categoria')) == $categoria->id ? 'selected' : '' }}>{{ $categoria->nome_categoria }}
                        
                    @endforeach
                        
                </select>
                @if ($errors->has('categoria'))
            
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ $errors->first('categoria') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                </td>
            </tr>
            <tr>
                <td><label class="form-label">Curso</label></td>
                <td><select class="form-select" id="curso" name="curso" aria-label="Default select example">
                    <option value="">-- Selecione o Curso --</option>
                    @foreach ($cursos as $curso)
                        {{-- <option value="{{$curso->id}}">{{$curso->nome_curso}}</option> --}}
                        <option value="{{ $curso->id }}" {{ ($inscricao->curso_id ?? old('curso')) == $curso->id ? 'selected' : '' }}>{{ $curso->nome_curso }}
                        
                    @endforeach
                        
                </select>
                @if ($errors->has('curso'))
            
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ $errors->first('curso') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                </td>
            </tr>
            <tr>
                <td><label class="form-label">Status</label></td>
                <td><select class="form-select" id="status" name="status" aria-label="Default select example">
                    <option value="">-- Selecione o Status --</option>
                    @foreach ($status as $st)
                        {{-- <option value="{{$st->id}}">{{$st->nome_status}}</option> --}}
                        <option value="{{ $st->id }}" {{ ($inscricao->status_id ?? old('status')) == $st->id ? 'selected' : '' }}>{{ $st->nome_status }}

                        
                    @endforeach
                        
                </select>
                @if ($errors->has('status'))
            
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ $errors->first('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                </td>
            </tr>
             
        </table>
        
        
        
        
       

        <button type="submit" class="btn btn-dark">Prosseguir</button>
    </form>

