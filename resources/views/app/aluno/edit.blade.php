@extends('app.layouts.basico')

@section('titulo', 'Aluno')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina2">
            <p>Editar Aluno</p>
        </div>

       
        <div class="informacao-pagina">
            <div style="width: 80%; margin-left: auto; margin-right: auto">
                <div class="menu">
                    <ul>
                    <li><a href="{{ route('aluno.index') }}"><button type="button" class="btn btn-primary">Voltar</button></a></li>
                        
                    </ul>
                </div> 

                @component('app.aluno._components.form_create_edit', ['aluno' => $aluno])
                @endcomponent

            </div>
        </div>

    </div>

@endsection