<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sitecontato;

class ContatoController extends Controller
{
    public function contato(Request $request){
        /*
        echo '<pre>';
        print_r($request->all());
        echo '</pre>';
        echo $request->input('nome');
        echo '<br>';
        echo $request->input('telefone');
        echo '<br>';
        echo $request->input('email');
        echo '<br>';
        echo $request->input('mensagem');
        */
      
        /*
        $contato = new sitecontato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_do_contato');
        $contato->mensagem = $request->input('mensagem');

        $contato->save();

        */


        //print_r($contato->getAttributes());

        $contato = new sitecontato();
        $contato->fill($request->all());
        $contato->save();
     

        return view('site.contato', ['titulo' => 'Contato (teste)']);
    }
}
