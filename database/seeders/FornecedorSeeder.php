<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fornecedor;
use Illuminate\Support\Facades\DB;


class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // instanciando o objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 1';
        $fornecedor->site = 'www.teste.com.br';
        $fornecedor->uf = 'DF';
        $fornecedor->email = 'teste1@teste1.com.br';
        $fornecedor->save();

        //  o método create (atenção para o atributo fillable da classe )
        Fornecedor::create([
            'nome' => 'Fornecedor 2', 
            'site' => 'wwww.fornecedor.com.br',
            'uf' => 'DF',
            'email' => 'teste2@teste2.com.br'
        ]);

        // insert
        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor 3',
            'site' => 'teste3@teste3.com.br',
            'uf' => 'GO',
            'email' => 'teste3@teste3.com.br'
        ]);

    }
}
