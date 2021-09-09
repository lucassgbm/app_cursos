<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;


class ContatoController extends Controller
{
    public function contato (Request $request){


        // dd($request);

        // $contato = new SiteContato();
        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email = $request->input('email');
        // $contato->motivo_contato = $request->input('motivo_contato');
        // $contato->mensagem = $request->input('mensagem');
        // // print_r($contato->getAttributes());
        // $contato->save();

        // pega todos os atributos num array associativo.. preencher o $fillable no arquivo model
        // $contato->fill($request->all());

        // ou
        // $contato = new SiteContato();
        // $contato->create($request->all());

        // print_r($contato->getAttributes()); die;

        $motivo_contatos = MotivoContato::all();


        return view('site.contato', ['titulo' => 'Contato', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar (Request $request){

        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos', // nomes com no mínimo 3 caracteres e no máximo 40
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $feedback = [
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 30 caracteres',
            'nome.unique' => 'O nome informado já está em uso',
            'email.email' => 'O email informado não é válido',
            'motivo_contatos_id.required' => 'O motivo do contato deve ser preenchido',
            'mensagem.max' => 'A mensagem deve ter no máximo 2000 caracteres',
            'required' => 'O campo :attribute deve ser preenchido',

        ];

        // validação dos dados recebidos pelo request
        $request->validate($regras,$feedback);

        SiteContato::create($request->all());

        return redirect()->route('site.index');

    }
}
