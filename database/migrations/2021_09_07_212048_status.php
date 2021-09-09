<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Status extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome_status');

        });

        DB::table('status')->insert([
            [ 'nome_status' => 'Pendente' ],
            [ 'nome_status' => 'Confirmado' ],
            [ 'nome_status' => 'Pago' ],

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status');

    }
}
