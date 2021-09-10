<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome_aluno');
            $table->string('senha');
            $table->string('email')->unique();
            $table->bigInteger('cpf');
            $table->string('empresa');
            $table->text('endereco');
            $table->bigInteger('telefone');
            $table->bigInteger('celular');
        });

        DB::table('alunos')->insert([
            [
                'nome_aluno' => 'Lucas Belfort', 
                'email' => 'lucas@teste.com',
                'senha' => '1234',
                'cpf' => '99999999999',
                'empresa' => 'Coca Cola',
                'endereco' => 'QD 01 BLOCO O LOTE 2 - Samambaia Sul',
                'telefone' => '33333333',
                'celular' => '999999999'
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alunos');
    }
}
