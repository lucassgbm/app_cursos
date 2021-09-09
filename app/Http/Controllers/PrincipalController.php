<?php

namespace App\Http\Controllers;
use App\Models\Cursos;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function principal(Request $request){

        $cursos = Cursos::all();
        return view('site.principal', ['titulo' => 'Home', 'cursos' => $cursos]);
    }

    
}
