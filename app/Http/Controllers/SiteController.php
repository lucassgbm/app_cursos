<?php

namespace App\Http\Controllers;
use App\Models\Cursos;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(Request $request){

        $cursos = Cursos::all();
        return view('site.principal', ['titulo' => 'Home', 'cursos' => $cursos]);
    }

    
}
