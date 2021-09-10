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

        // retorna todos os cursos
        $cursos = Cursos::all();

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

        // validação de campos
        $request->validate($this->regras(), $this->feedback());

        // upload do arquivo:
        $arquivo_urn = $this->upload_arquivo($request);

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
        $curso->arquivo_material = $arquivo_urn;
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

        // validação de campos
        $request->validate($this->regras(), $this->feedback());

        // upload do arquivo:
        $arquivo_urn = $this->upload_arquivo($request);

        $curso->nome_curso = $request->get('nome_curso');
        $curso->descricao = $request->get('descricao');
        $curso->local = $request->get('local');
        $curso->data_inicio_curso = $request->get('data_inicio_curso');
        $curso->hora_inicio = $request->get('hora');
        $curso->valor = $request->get('valor');
        $curso->data_inicio_inscricoes = $request->get('data_inicio_inscricoes');
        $curso->data_termino_inscricoes = $request->get('data_termino_inscricoes');
        $curso->qtd_max_inscritos = $request->get('qtd_max_inscritos');
        $curso->arquivo_material = $arquivo_urn;
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
        // deletar o curso
        $curso->delete();

        return redirect()->route('curso.index');

    }

    public function regras (){

        return [
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
            'arquivo_material' => 'required|file|mimes:pdf',

        ];
    }

    public function feedback (){

        return [
            'required' => 'Este campo é obrigatório',
            'nome_curso.min' => 'O campo deve ter no mínimo 4 caracteres',
            'nome_curso.max' => 'O campo deve ter no máximo 40 caracteres',
            'arquivo_material.mimes' => 'O arquivo deve ser .pdf'
        ];

    }

    public function upload_arquivo($request){

        $host = request()->getHttpHost();
        $arquivo = $request->file('arquivo_material');
        // salva o arquivo na pasta storage/arquivos/curso
        return $host.'/storage/'.$arquivo->store('arquivos/curso', 'public');

    }
}
