<?php

namespace App\Http\Controllers;

use App\Exports\InscricoesExport;
use App\Models\Inscricao;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Cursos;
use App\Models\PagSeguro;
use App\Models\Status;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;




class InscricaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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

        // validações
        $request->validate($this->regras(), $this->feedback());

        $aluno_id = DB::table('alunos')
            ->where('alunos.nome_aluno', '=', $request->get('nome_aluno'))
            ->select('alunos.id')
            ->limit(1)
            ->get()
            ->toArray();
            
        $inscricao = new Inscricao();
        $inscricao->aluno_id = $aluno_id['0']->id;
        $inscricao->categoria_id = $request->get('categoria');
        $inscricao->status_id = $request->get('status');
        $inscricao->curso_id = $request->get('curso');
        $inscricao->save();

        // gerar boleto pelo pagseguro
        $boleto = new PagSeguro();
        if($boleto->gerarBoleto($inscricao) == 'error'){

            $msg = 'Houve um erro ao gerar o seu boleto. Entre em contato com o suporte';
            
        }else {

            $msg = $boleto->gerarBoleto($inscricao);
        }


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
        // dd($inscricao);
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
        // validações
        $request->validate($this->regras(), $this->feedback());

        $inscricao->aluno_id = $request->get('aluno_id');
        $inscricao->categoria_id = $request->get('categoria');
        $inscricao->status_id = $request->get('status');; 
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
        // deletar inscrição
        $inscricao->delete();

        return redirect()->route('inscricao.index');
    }

    public function exportar($extensao){
       
        //exportar para xls ou pdf
        $nome_arquivo = 'inscritos';
        if($extensao == 'xls'){
            $nome_arquivo .= '.xls';
        }elseif($extensao == 'pdf'){
            $nome_arquivo .= '.pdf';
        }

        return Excel::download(new InscricoesExport, $nome_arquivo);
    }

    public function regras(){
        return [
            'nome_aluno' => 'required',
            'categoria' => 'required',
            'curso' => 'required',
            'status' => 'required'
        ];
    }

    public function feedback(){
        return [
            'required' => 'O campo :attribute deve ser preenchido',
         
        ];
    }
}
