<?php

namespace App\Exports;

use App\Models\Inscricao;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class InscricoesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Inscricao::all();

        $inscricoes = DB::table('inscricao')
            ->join('alunos', 'inscricao.aluno_id', '=', 'alunos.id')
            ->join('cursos', 'inscricao.curso_id', '=', 'cursos.id')
            ->join('categoria', 'inscricao.categoria_id', '=', 'categoria.id')
            ->join('status', 'inscricao.status_id', '=', 'status.id')
            ->select('inscricao.id', 'nome_aluno', 'cpf', 'email', 'nome_curso', 'inscricao.created_at', 'nome_categoria', 'nome_status')
            ->get();

            return $inscricoes;
    }
}
