<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;


class PagSeguro extends Model
{
    use HasFactory;

    public function gerarBoleto (Inscricao $inscricao){

        $response = Http::withHeaders([
            'Accept' => 'application/json;charset=ISO-8859-1',
            'Content-type' => 'application/json;charset=ISO-8859-1'
        ])->post(
            'https://ws.pagseguro.uol.com.br/recurring-payment/boletos?email=lucassgbm@hotmail.com&token=1545f8ae-6b40-46de-80c7-13e65abcc46dbb4b743f435a850c0e35d7bc7d81725ac458-7be5-40a7-833f-b00088438002',
            [
                "reference" => "PEDIDO123321",
                "firstDueDate" => "2021-10-06",
                "numberOfPayments" => "1",
                "periodicity" => "monthly",
                "amount" => "10.00", // alterar valor do curso aqui
                "instructions" => "juros de 1% ao dia e mora de 5,00",
                "description" => "Curso de gastronomia", // alterar nome do curso aqui
                "customer" => [
                    "document" => [
                        "type" => "CPF",
                        "value" => "22773216059"
                    ],
                    "name" => 'Aluno de teste',
                    "email" => $inscricao->aluno->email,
                    "phone" => [
                        "areaCode" => "11",
                        "number" => "80804040"
                    ]
                ]
            ]
        );

        // dd($response->json());

        $resposta = $response->json();

        // print_r($resposta["boletos"][0]['paymentLink']);
        if(!$resposta["boletos"][0]['paymentLink']){
            return 'error';
        }else {
            // link do boleto
            return $resposta["boletos"][0]['paymentLink'];
        }
        
    }
}
