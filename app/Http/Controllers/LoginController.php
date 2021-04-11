<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;


class LoginController extends Controller

{
    //
    public function index(Request $request){

        $erro = '';

        if($request->get('erro') == 1){
            $erro = "Usuário e ou senha não existe";
        }
        if($request->get('erro') == 2){
            $erro = "Efetue o login para ter acesso";
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request){

        //Definindo regras de autenticação
        
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        //Recuperando parâmetros do formulário

        $email = $request->get('usuario');
        $password = $request->get('senha');

        $feedback = [
            'usuario.email' => 'O campo usuário (e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras, $feedback);

        //iniciar o Model user

        $user = new User();

        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();

        
        if(isset($usuario->name)){
            echo 'Usuário existe';
            

            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.clientes');

        }else{
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }
}
