<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // retorna todos os alunos
        $alunos = Aluno::all();
        // $alunos = Aluno::paginate(10);
        return view('app.aluno.index', ['alunos' => $alunos]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.aluno.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // validar campos
        $request->validate($this->regras(), $this->feedback());

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


        return redirect()->route('aluno.show', ['aluno' => $aluno->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function show(Aluno $aluno)
    {
        return view('app.aluno.show', ['aluno' => $aluno]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function edit(Aluno $aluno)
    {
        return view('app.aluno.edit', ['aluno' => $aluno]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aluno $aluno)
    {

        // validar campos
        $request->validate($this->regras(), $this->feedback());

        $aluno->nome_aluno = $request->get('nome_aluno');
        $aluno->endereco = $request->get('endereco');
        $aluno->email = $request->get('email');
        $aluno->cpf = $request->get('cpf');
        $aluno->empresa = $request->get('empresa');
        $aluno->telefone = $request->get('telefone');
        $aluno->celular = $request->get('celular');
        $aluno->senha = $request->get('senha');
        $aluno->update();


        return redirect()->route('aluno.show', ['aluno' => $aluno->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aluno $aluno)
    {
        // deletar registro
        $aluno->delete();

        return redirect()->route('aluno.index');
    }

    public function regras (){

        return [
            'nome_aluno' => 'required|min:4|max:40',
            'nome_aluno' => 'required',
            'endereco' => 'required',
            'email' => 'required|email',
            'cpf' => 'required|numeric',
            'empresa' => 'required',
            'telefone' => 'required|numeric',
            'celular' => 'required|numeric',
            'senha' => 'required',
            'confirmar_senha' => 'required',

        ];
    }

    public function feedback (){

        return [
            'required' => 'Este campo é obrigatório',
            'nome_aluno.min' => 'O campo deve ter no mínimo 4 caracteres',
            'nome_aluno.max' => 'O campo deve ter no máximo 40 caracteres',
            'email' => 'O e-mail informado não é valido',
            'numeric' => 'O valor deve ser numérico'
        ];
    }
}
