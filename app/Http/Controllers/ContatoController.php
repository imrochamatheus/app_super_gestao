<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sitecontato;
use App\MotivoContato;

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

        /*
        $contato = new sitecontato();
        $contato->fill($request->all());
        $contato->save();
        */
     
        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato (teste)', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request){
        
        $regras = [
            'nome'=> 'required|min:3|max:40|unique:sitecontatos',
            'telefone'=> 'required',
            'email'=> 'email',
            'motivo_contatos_id'=> 'required',
            'mensagem'=> 'required|max:2000'
        ];

        $feedback = [
            'nome.required'=> 'O campo nome precisa ser preenchido',
            'nome.min'=> 'O campo nome precisa ter pelo menos 3 caracteres',
            'nome.max'=> 'O campo nome precisa ter até 40 caracteres',
            'nome.unique'=> 'Nome indisponível',
            'telefone.required'=> 'O campo telefone precisa ser preenchido',
            
            'required'=> 'O campo :attribute deve ser preenchido',
            'email' => 'O :attribute informado não é válido'
        ];

        $request->validate($regras, $feedback);

        sitecontato::create($request->all());

        return redirect()->route('site.index');
    }
}
