<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title> Gestão Cursos - @yield('titulo') </title>
        <meta charset="utf-8">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="{{ asset('css/estilo_basico.css') }}">
    </head>

    <body>
    <header>

        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <strong>LB Cursos</strong>
            </a>
            
            </div>
        </div>
        </header>

        @yield('conteudo')

        <footer class="text-muted py-5">
        <div class="container">
            <p class="float-end mb-1">
            <a href="#">Ir para o topo</a>
            </p>
            <p class="mb-0">Desenvolvido por Lucas Belfort <a href="/">GitHub</a>&nbsp<a href="../getting-started/introduction/">LinkedIn</a>.</p>
        </div>
        </footer>
    </body>
</html>