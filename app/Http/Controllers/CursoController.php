<?php

namespace App\Http\Controllers;

use App\Models\Cursos;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return 'curso';

        $cursos = Cursos::paginate(10);

        // dd($cursos);
        return view('app.curso.index', ['cursos' => $cursos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('app.curso.create');

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
            'nome_curso' => 'required|min:4|max:40',
            'nome_curso' => 'required',
            'descricao' => 'required',
            'local' => 'required',
            'valor' => 'required',
            'data_inicio_curso' => 'required',
            'hora' => 'required',
            'data_inicio_inscricoes' => 'required',
            'data_termino_inscricoes' => 'required',
            'qtd_max_inscritos' => 'required',
            'arquivo_material' => 'required',

        ];

        $feedback = [
            'required' => 'Este campo é obrigatório',
            'nome_curso.min' => 'O campo deve ter no mínimo 4 caracteres',
            'nome_curso.max' => 'O campo deve ter no máximo 40 caracteres'
        ];

        $request->validate($regras, $feedback);


        // upload do arquivo aqui
        // $arquivo = $request->file('arquivo_material');
        // $arquivo_url = $arquivo->store('documentos/curso', 'public');

        $curso = new Cursos();
        $curso->nome_curso = $request->get('nome_curso');
        $curso->descricao = $request->get('descricao');
        $curso->local = $request->get('local');
        $curso->data_inicio_curso = $request->get('data_inicio_curso');
        $curso->hora_inicio = $request->get('hora');
        $curso->valor = $request->get('valor');
        $curso->data_inicio_inscricoes = $request->get('data_inicio_inscricoes');
        $curso->data_termino_inscricoes = $request->get('data_termino_inscricoes');
        $curso->qtd_max_inscritos = $request->get('qtd_max_inscritos');
        $curso->arquivo_material = $request->get('arquivo_material');
        // $curso->arquivo_material = $arquivo_url;
        $curso->save();

        
        return redirect()->route('curso.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function show(Cursos $curso)
    {
        return view('app.curso.show', ['curso' => $curso]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cursos  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit(Cursos $curso)
    {
        
        // dd($curso);
        return view('app.curso.edit', ['curso' => $curso]);
 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cursos  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cursos $curso)
    {

        $regras = [
            'nome_curso' => 'required|min:4|max:40',
            'nome_curso' => 'required',
            'descricao' => 'required',
            'local' => 'required',
            'valor' => 'required',
            'data_inicio_curso' => 'required',
            'hora' => 'required',
            'data_inicio_inscricoes' => 'required',
            'data_termino_inscricoes' => 'required',
            'qtd_max_inscritos' => 'required',
            'arquivo_material' => 'required',

        ];

        $feedback = [
            'required' => 'Este campo é obrigatório',
            'nome_curso.min' => 'O campo deve ter no mínimo 4 caracteres',
            'nome_curso.max' => 'O campo deve ter no máximo 40 caracteres'
        ];

        $request->validate($regras, $feedback);


        $curso->nome_curso = $request->get('nome_curso');
        $curso->descricao = $request->get('descricao');
        $curso->local = $request->get('local');
        $curso->data_inicio_curso = $request->get('data_inicio_curso');
        $curso->hora_inicio = $request->get('hora');
        $curso->valor = $request->get('valor');
        $curso->data_inicio_inscricoes = $request->get('data_inicio_inscricoes');
        $curso->data_termino_inscricoes = $request->get('data_termino_inscricoes');
        $curso->qtd_max_inscritos = $request->get('qtd_max_inscritos');
        $curso->arquivo_material = $request->get('arquivo_material');
        $curso->update();

        return redirect()->route('curso.show', ['curso' => $curso->id]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cursos  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cursos $curso)
    {
        $curso->delete();

        return redirect()->route('curso.index');

    }
}
