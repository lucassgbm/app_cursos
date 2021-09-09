<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{
    use HasFactory;

    protected $table = 'inscricao';

    public function aluno() {
        return $this->belongsTo(Aluno::class);
    }

    public function curso() {
        return $this->belongsTo(Cursos::class);
    }

    public function categoria() {
        return $this->belongsTo(Categoria::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }

}
