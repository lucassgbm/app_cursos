<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Aluno;
use \App\Models\Cursos;
use \App\Models\Inscricao;
use Illuminate\Support\Facades\DB;
use App\Models\PagSeguro;


use function PHPUnit\Framework\isNull;

class AreaAlunoController extends Controller
{
    public function index(Request $request){

        $erro = '';

        if($request->get('erro') == 1){
            $erro = 'Usuário e senha não existem';
        }

        if($request->get('erro') == 2){
            $erro = 'Necessário realizar login para ter acesso à página.';
        }        

        $cursos = Cursos::all();
        return view('site.principal', ['titulo' => 'Home', 'cursos' => $cursos, 'erro' => $erro]);

    }

    public function autenticar(Request $request){

        // regras de validação
        $regras = [
            'email' => 'email',
            'senha' => 'required'
        ];

        $feedback = [
            'email.email' => 'O usuário (e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras, $feedback);

        $email = $request->get('email');
        $senha = $request->get('senha');


        $aluno = Aluno::select()
                    ->where('email', $email)
                    ->where('senha', $senha)
                    ->get()
                    ->first();

        if(isset($aluno->email)){

            session_start();
            $_SESSION['email'] = $aluno->email;

            return redirect()->route('area-aluno.home', ['aluno' => $aluno]);
            
        } else {

            return redirect()->route('area-aluno', ['erro' => 1 ]);

        }

    }

    public function create(){
        return view('area-aluno.register', ['titulo' => 'Cadastro']);
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function store(Request $request){

            $regras = [
            'nome_aluno' => 'required|min:4|max:40',
            'nome_aluno' => 'required',
            'endereco' => 'required',
            'email' => 'required|email|unique:alunos',
            'cpf' => 'required|numeric',
            'empresa' => 'required',
            'telefone' => 'required|numeric',
            'celular' => 'required|numeric',
            'senha' => 'required',
            'confirmar_senha' => 'required',

        ];

        $feedback = [
            'required' => 'Este campo é obrigatório',
            'nome_aluno.min' => 'O campo deve ter no mínimo 4 caracteres',
            'nome_aluno.max' => 'O campo deve ter no máximo 40 caracteres',
            'email' => 'O e-mail informado não é valido',
            'email.unique' => 'O e-mail informado já está cadastrado',
            'numeric' => 'O valor deve ser numérico'
        ];

        $request->validate($regras, $feedback);

        $aluno = new Aluno();
        $aluno->nome_aluno = $request->get('nome_aluno');
        $aluno->endereco = $request->get('endereco');
        $aluno->email = $request->get('email');
        $aluno->cpf = $request->get('cpf');
        $aluno->empresa = $request->get('empresa');
        $aluno->telefone = $request->get('telefone');
        $aluno->celular = $request->get('celular');
        $aluno->senha = $request->get('senha');
        $aluno->save();


        return redirect()->route('area-aluno.show', ['aluno' => $aluno->id]);
    }

    public function show(Aluno $aluno)
    {
        return view('area-aluno.show', ['titulo' => 'Cadastro', 'aluno' => $aluno]);
    }

    public function home (Aluno $aluno){

        // query para todas as inscrições já feitas 
        $inscricoes = DB::table('inscricao')
            ->join('alunos', 'inscricao.aluno_id', '=', 'alunos.id')
            ->join('cursos', 'inscricao.curso_id', '=', 'cursos.id')
            ->where('inscricao.aluno_id', '=', $aluno->id)
            ->select('cursos.nome_curso', 'cursos.descricao', 'cursos.data_inicio_curso', 'cursos.created_at', 'cursos.valor', 'cursos.local', 'cursos.hora_inicio', 'cursos.arquivo_material')
            ->get();

        // mostra apenas os cursos ainda não inscritos
        $cursos = DB::table('cursos')
            ->leftJoin('inscricao', 'inscricao.curso_id', '=', 'cursos.id')
            ->where('inscricao.aluno_id', '<>', $aluno->id)
            ->orWhereNull('inscricao.aluno_id')
            ->select('cursos.id', 'cursos.nome_curso')
            ->get();


        return view('area-aluno.home', ['titulo' => 'Cadastro', 'aluno' => $aluno, 'inscricoes' => $inscricoes, 'cursos' => $cursos]);

    }

    

    public function inscrever (Request $request){

        $regras = [
            'nome_aluno' => 'required',
            'curso' => 'required'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
         
        ];

        $request->validate($regras, $feedback);

        // dd($request->all());

        $inscricao = new Inscricao();
        $inscricao->aluno_id = $request->get('aluno_id');
        $inscricao->categoria_id = 1; // 1 = estudante
        $inscricao->status_id = 1; // 1 = pendente
        $inscricao->curso_id = $request->get('curso');
        $inscricao->save();

        
        // gerar boleto pelo pagseguro
        $boleto = new PagSeguro();
        if($boleto->gerarBoleto($inscricao) == 'error'){

            $msg = 'error';
            
        }else {

            $msg = $boleto->gerarBoleto($inscricao);
        }
        

        return view('area-aluno.msg', ['inscricao' => $inscricao, 'titulo' => 'Inscrição', 'msg' => $msg, 'aluno' => $inscricao->aluno]);

    }

    
}
