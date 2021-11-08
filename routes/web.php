<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

use App\Http\Controllers\SiteController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProdutoDetalheController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PedidoProdutoController;

use App\Http\Controllers\InscricaoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\ConfiguracoesController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\AreaAlunoController;
use App\Http\Controllers\PagseguroBoletoController;
use App\Http\Controllers\TypeaheadController;


use App\Http\Controllers\TesteController;

// ou inserir a middleware no arquivo \App\Http\Kernel em web ou routeMiddleware
// use App\Http\Middleware\LogAcessoMiddleware;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [SiteController::class, 'index'])->name('site.index'); //->middleware('log.acesso');

Route::post('/area-aluno/autenticar', [AreaAlunoController::class, 'autenticar'])->name('area-aluno.login');
Route::get('/area-aluno/create', [AreaAlunoController::class, 'create'])->name('area-aluno.create');
Route::get('/area-aluno/{erro?}', [AreaAlunoController::class, 'index'])->name('area-aluno');
Route::post('/area-aluno/store', [AreaAlunoController::class, 'store'])->name('area-aluno.store');
Route::get('/area-aluno/show/{aluno}', [AreaAlunoController::class, 'show'])->name('area-aluno.show');
Route::get('/area-aluno/home/{aluno}', [AreaAlunoController::class, 'home'])->name('area-aluno.home');
Route::post('/area-aluno/inscrever', [AreaAlunoController::class, 'inscrever'])->name('area-aluno.inscrever');
Route::get('/area-aluno/logout', [AreaAlunoController::class, 'logout'])->name('area-aluno.logout');


Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');

// rotas para a área administrativa
Route::middleware('autenticacao:padrao,visitante')->prefix('app')->group(function (){
    Route::get('/home', [HomeController::class, 'index'])->name('app.home');
    Route::get('/sair', [LoginController::class, 'sair'])->name('app.sair');

    Route::get('inscricao/exportar/{extensao}', [InscricaoController::class, 'exportar'])->name('inscricao.exportar');

    // index store show edit update destroy
    Route::resource('inscricao', InscricaoController::class);



    Route::resource('curso', CursoController::class);
    Route::resource('configuracoes', ConfiguracoesController::class);
    Route::resource('aluno', AlunoController::class);
    
});


Route::fallback(function(){
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">Clique aqui</a> para ir para a página principal';
});

// rota para o autocomplete: selecionar o aluno na tela de inscrição conforme for digitado no campo
Route::get('autocomplete', [TypeaheadController::class, 'autocomplete'])->name('autocomplete');
