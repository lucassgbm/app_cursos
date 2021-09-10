<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


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
            $table->string('local');
            $table->date('data_inicio_curso');
            $table->string('hora_inicio');
            $table->float('valor', 8,2)->default(0.00);
            $table->date('data_inicio_inscricoes');
            $table->date('data_termino_inscricoes');
            $table->integer('qtd_max_inscritos');
            $table->string('arquivo_material');

            
        });

        DB::table('cursos')->insert([
            [
                'nome_curso' => 'Curso de hambúrguer artesanal', 
                'descricao' => 'Aprenda a fazer uma grande variedade de hambúrgueres artesanais para você vender no seu restaurante', 
                'local' => 'Instituto de gastronomia de brasília',
                'data_inicio_curso' => '2021-09-01',
                'hora_inicio' => '09:00',
                'valor' => 400.00,
                'data_inicio_inscricoes' => '2021-08-01',
                'data_termino_inscricoes' => '2021-08-15',
                'qtd_max_inscritos' => 30,
                'arquivo_material' => 'arquivo.pdf'

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
        Schema::dropIfExists('cursos');
    }
}
