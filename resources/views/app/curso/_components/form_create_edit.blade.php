@if(isset($curso->id))
    <form method="post" action="{{ route('curso.update', ['curso' => $curso->id]) }}">
        @csrf
        @method('PUT')
@else
    <form method="post" action="{{ route('curso.store') }}">
        @csrf
@endif

        <table class="table">
            <tr>
                <td><label class="form-label">Nome do curso</label></td>
                <td><input type="text" class="form-control" id="nome_curso" name="nome_curso" value="{{ $curso->nome_curso ?? old('nome_curso') }}" >
                {{-- {{ $errors->has('nome_curso') ? $errors->first('nome_curso') : '' }}</td> --}}
                @if ($errors->has('nome_curso'))
            
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ $errors->first('nome_curso') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </tr>
            <tr>
                <td><label class="form-label">Descrição</label></td>
                <td><textarea class="form-control" id="descricao" name="descricao"  rows="3">{{ $curso->descricao ?? old('descricao') }}</textarea>
                {{-- {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}</td> --}}
                @if ($errors->has('descricao'))
            
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ $errors->first('descricao') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </tr>
            <tr>
                <td><label class="form-label">Valor do curso</label></td>
                <td><input type="valor" class="form-control" id="valor" name="valor" placeholder="valor do curso" value="{{ $curso->valor ?? old('valor') }}">
                {{-- {{ $errors->has('valor') ? $errors->first('valor') : '' }}</td> --}}
                @if ($errors->has('valor'))
            
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ $errors->first('valor') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </tr>
            <tr>
                <td><label class="form-label">Data de início do curso</label></td>
                <td><input type="date" class="form-control" id="data_inicio_curso" name="data_inicio_curso" placeholder="dd/mm/aaaa" value="{{ $curso->data_inicio_curso_inscricoes ?? old('data_inicio_curso_inscricoes') }}">
                {{-- {{ $errors->has('data_inicio_curso') ? $errors->first('data_inicio_curso') : '' }}</td> --}}
                @if ($errors->has('data_inicio_curso'))
            
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ $errors->first('data_inicio_curso') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
            </tr>
            <tr>
                <td><label class="form-label">Data de início das inscrições</label></td>
                <td><input type="date" class="form-control" id="data_inicio_inscricoes" name="data_inicio_inscricoes" placeholder="dd/mm/aaaa" value="{{ $curso->data_inicio_inscricoes_inscricoes ?? old('data_inicio_inscricoes_inscricoes') }}">
                {{-- {{ $errors->has('data_inicio_inscricoes') ? $errors->first('data_inicio_inscricoes') : '' }}</td> --}}
                @if ($errors->has('data_inicio_inscricoes'))
            
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ $errors->first('data_inicio_inscricoes') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
            </tr>
            <tr>
                <td><label class="form-label">Data de término das inscrições</label></td>
                <td><input type="date" class="form-control" id="data_termino_inscricoes" name="data_termino_inscricoes" placeholder="dd/mm/aaaa" value="{{ $curso->data_termino_inscricoes_inscricoes ?? old('data_termino_inscricoes_inscricoes') }}">
                {{-- {{ $errors->has('data_termino_inscricoes') ? $errors->first('data_termino_inscricoes') : '' }}</td> --}}
                @if ($errors->has('data_termino_inscricoes'))
            
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ $errors->first('data_termino_inscricoes') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
            </tr>
            <tr>
                <td><label class="form-label">Quantidade máxima de inscritos</label></td>
                <td><input type="qtd_max_inscritos" class="form-control" id="qtd_max_inscritos" name="qtd_max_inscritos" value="{{ $curso->qtd_max_inscritos ?? old('qtd_max_inscritos') }}">
                {{-- {{ $errors->has('qtd_max_inscritos') ? $errors->first('qtd_max_inscritos') : '' }}</td> --}}
                @if ($errors->has('qtd_max_inscritos'))
            
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ $errors->first('qtd_max_inscritos') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </tr>
            <tr>
                <td><label class="form-label">Upload do arquivo com o material</label></td>
                <td><input class="form-control" type="file" id="arquivo_material" name="arquivo_material" value="{{ $curso->arquivo_material ?? old('arquivo_material') }}">
                {{-- {{ $errors->has('arquivo_material') ? $errors->first('arquivo_material') : '' }}</td> --}}
                @if ($errors->has('arquivo_material'))
            
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ $errors->first('arquivo_material') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </tr>
        
        </table>
       

        <button type="submit" class="btn btn-dark">Salvar</button>
    </form>