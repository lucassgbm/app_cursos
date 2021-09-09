<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title> Super Gestão - @yield('titulo') </title>
        <meta charset="utf-8">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        
        <link rel="stylesheet" href="{{ asset('css/estilo_basico.css') }}">
    </head>

    <body>
        {{-- menu do site --}}
        @include('app.layouts._partials.topo')
        @yield('conteudo')

            <footer class="rodape">
                <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                    <li class="nav-item"><a href="https://www.linkedin.com/in/lucasbelfort/" class="nav-link px-2 text-muted">Linkedin</a></li>
                    <li class="nav-item"><a href="https://github.com/lucassgbm" class="nav-link px-2 text-muted">GitHub</a></li>

                </ul>
                <p class="text-center text-muted">© 2021 Desenvolvido por Lucas</p>
            </footer>
    </body>
</html>