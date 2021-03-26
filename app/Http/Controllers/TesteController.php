<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function index(){
        //echo "A soma de $p1 + $p2 é: ".($p1+$p2);

        //Método por array associativo
        //return view('site.teste',['p1' => $p1, 'p2' => $p2]);

        //compact
        //return view('site.teste',compact('p1', 'p2'));

        //with
        return view('app.fornecedor.teste');
    }
}
