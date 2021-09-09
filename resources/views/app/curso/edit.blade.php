@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina2">
            <p>Editar Curso</p>
        </div>

       
        <div class="informacao-pagina">
            <div style="width: 80%; margin-left: auto; margin-right: auto">
                <div class="menu">
                    <ul>
                    <li><a href="{{ route('curso.index') }}"><button type="button" class="btn btn-primary">Voltar</button></a></li>
                        
                    </ul>
                </div> 

                @component('app.curso._components.form_create_edit', ['curso' => $curso])
                @endcomponent

            </div>
        </div>

    </div>

@endsection