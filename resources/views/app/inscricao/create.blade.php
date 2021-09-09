@extends('app.layouts.basico')

@section('titulo', 'Inscrição')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina2">
            <p>Nova inscrição</p>
        </div>


        <div class="informacao-pagina">
            <div style="width: 80%; margin-left: auto; margin-right: auto">
                <div class="menu">
                    <ul>
                    <li><a href="{{ route('inscricao.index') }}"><button type="button" class="btn btn-secondary">Voltar</button></a></li>
                        
                    </ul>
                </div> 

                @component('app.inscricao._components.form_create_edit', ['categorias' => $categorias, 'status' => $status, 'cursos' => $cursos])
                @endcomponent

            </div>
        </div>

    </div>

@endsection