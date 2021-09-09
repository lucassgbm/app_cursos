<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome_curso');
            $table->text('descricao');
            $table->float('valor', 8,2)->default(0.00);
            $table->date('data_inicio_curso');
            $table->date('data_inicio_inscricoes');
            $table->date('data_termino_inscricoes');
            $table->integer('qtd_max_inscritos');
            $table->string('arquivo_material');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}
