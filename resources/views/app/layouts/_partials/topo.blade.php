<div class="topo">

    {{-- <div class="logo">
        <img src="{{ asset('img/logo.png') }}">
    </div> --}}

    {{-- <div class="menu">
        <ul>
            <li><a href="{{ route('app.home') }}">Home</a></li>
            <li><a href="{{ route('inscricao.index') }}">Inscrição</a></li>
            <li><a href="{{ route('curso.index') }}">Curso</a></li>
            <li><a href="{{ route('configuracoes.index') }}">Configurações</a></li>
            <li><a href="{{ route('app.sair') }}">Sair</a></li>
        </ul>
    </div> --}}
</div>
<nav class="navbar navbar-light bg-light fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">LB_CURSOS</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('app.home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('aluno.index') }}">Alunos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('inscricao.index') }}">Inscrição</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('curso.index') }}">Cursos</a>
          </li>
          <p class="border-bottom"></p>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('configuracoes.index') }}">Configurações</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('app.sair') }}">Sair</a>
          </li>
          
        </ul>
        
      </div>
    </div>
  </div>
</nav>
