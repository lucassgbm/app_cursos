<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    use HasFactory;

    public function regras() {
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
            'arquivo_material' => 'required',
        ];
    }

    public function feedback(){
        return [
            'required' => 'Este campo é obrigatório',
            'nome_curso.min' => 'O campo deve ter no mínimo 4 caracteres',
            'nome_curso.max' => 'O campo deve ter no máximo 40 caracteres'
        ];
    }
}
