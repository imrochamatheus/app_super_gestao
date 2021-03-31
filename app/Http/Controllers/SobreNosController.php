<?php

namespace App\Http\Controllers;

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;

class SobreNosController extends Controller
{

    public function __construct(){
        $this->Middleware('log_acesso');
    }
    public function sobrenos(){
        return view('site.sobre-nos');
    }
}
