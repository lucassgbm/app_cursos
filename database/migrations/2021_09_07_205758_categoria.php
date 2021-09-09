<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class Categoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome_categoria');

        });

        DB::table('categoria')->insert([
            [ 'nome_categoria' => 'Estudante' ],
            [ 'nome_categoria' => 'Profissional' ],
            [ 'nome_categoria' => 'Associado' ],

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoria');

    }
}
