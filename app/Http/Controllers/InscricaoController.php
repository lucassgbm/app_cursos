<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Inscricao;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Cursos;
use App\Models\Status;
use Illuminate\Support\Facades\DB;



class InscricaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return 'inscrições';

        $inscricoes = DB::table('inscricao')
            ->join('alunos', 'inscricao.aluno_id', '=', 'alunos.id')
            ->join('cursos', 'inscricao.curso_id', '=', 'cursos.id')
            ->join('categoria', 'inscricao.categoria_id', '=', 'categoria.id')
            ->join('status', 'inscricao.status_id', '=', 'status.id')
            ->select('inscricao.id', 'nome_aluno', 'nome_curso', 'inscricao.created_at', 'nome_categoria', 'cpf', 'email', 'nome_status')
            ->get();


        // dd($inscricoes);
        // $inscricao = Inscricao::paginate(10);
        return view('app.inscricao.index', ['inscricoes' => $inscricoes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categorias = Categoria::all();
        $status = Status::all();
        $cursos = Cursos::all();
        return view('app.inscricao.create', ['categorias' => $categorias, 'status' => $status, 'cursos' => $cursos]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $regras = [
            'nome_aluno' => 'required',
            'categoria' => 'required',
            'curso' => 'required'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
         
        ];

        $request->validate($regras, $feedback);

        // dd($request->all());

        $inscricao = new Inscricao();
        $inscricao->aluno_id = $request->get('aluno_id');
        $inscricao->categoria_id = $request->get('categoria');
        $inscricao->status_id = 1; // 1 = pendente
        $inscricao->curso_id = $request->get('curso');
        $inscricao->save();

        $msg = 'Foi enviado um boleto para o e-mail: '.$inscricao->aluno->email.'. A inscrição será efetivada com o pagamento.';

        return view('app.inscricao.show', ['inscricao' => $inscricao, 'msg' => $msg]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inscricao  $inscricao
     * @return \Illuminate\Http\Response
     */
    public function show(Inscricao $inscricao)
    {
        // $inscricao = DB::table('inscricao')
        // ->join('alunos', 'inscricao.aluno_id', '=', 'alunos.id')
        // ->join('cursos', 'inscricao.curso_id', '=', 'cursos.id')
        // ->join('categoria', 'inscricao.categoria_id', '=', 'categoria.id')
        // ->join('status', 'inscricao.status_id', '=', 'status.id')
        // ->select('inscricao.id', 'nome_aluno', 'nome_curso', 'inscricao.created_at', 'nome_categoria', 'cpf', 'email', 'nome_status')
        // ->where('inscricao.id', $inscricao->id)
        // ->get();

        // $inscricao = Inscricao::with(['curso.nome_curso', 'aluno', 'categoria', 'status'])->get();


        // dd($inscricao);
        
            return view('app.inscricao.show', ['inscricao' => $inscricao]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inscricao  $inscricao
     * @return \Illuminate\Http\Response
     */
    public function edit(Inscricao $inscricao)
    {
        $categorias = Categoria::all();
        $status = Status::all();
        $cursos = Cursos::all();
        return view('app.inscricao.edit', ['inscricao' => $inscricao, 'categorias' => $categorias, 'status' => $status, 'cursos' => $cursos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inscricao  $inscricao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inscricao $inscricao)
    {
        $regras = [
            'nome_aluno' => 'required',
            'categoria' => 'required',
            'curso' => 'required'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
         
        ];

        $request->validate($regras, $feedback);

        $inscricao->aluno_id = $request->get('aluno_id');
        $inscricao->categoria_id = $request->get('categoria');
        $inscricao->status_id = 1; // 1 = pendente
        $inscricao->curso_id = $request->get('curso');
        $inscricao->update();

        return redirect()->route('inscricao.show', ['inscricao' => $inscricao->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inscricao  $inscricao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inscricao $inscricao)
    {
        $inscricao->delete();

        return redirect()->route('inscricao.index');
    }
}