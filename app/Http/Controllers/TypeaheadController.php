<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Aluno;

class TypeaheadController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
 
    public function autocomplete(Request $request)
    {

        $filterResult =  Aluno::select('id', 'nome_aluno')
        ->where('nome_aluno', 'like', "%{$request->term}%")
        ->pluck('nome_aluno');

        return response()->json($filterResult);

        //   $query = $request->term;
        //   $filterResult = Aluno::select('nome_aluno')
        //   ->where('nome_aluno', 'LIKE', '%'.$query.'%')->get();
        //   return response()->json($filterResult);
    
    }
}