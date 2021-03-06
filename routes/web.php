<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Criação de rotas                                Nomeando rotas
Route::middleware('log_acesso')
    ->get('/','PrincipalController@principal')
    ->name('site.index');
Route::get('/sobrenos','SobreNosController@sobrenos')->name('site.sobrenos');
Route::get('/contato','ContatoController@contato')->name('site.contato');
Route::post('/contato','ContatoController@salvar')->name('site.contato');
Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');


//Agrupamento de rotas                                      Nomeando rotas
Route::prefix('app')->middleware('autenticacao:padrao, visitante, p3, p4')->group(function(){
    Route::get('/home','HomeController@index')->name('app.home');
    Route::get('/sair','LoginController@sair')->name('app.sair');
    Route::get('/cliente','ClienteController@index')->name('app.cliente');
    Route::get('/fornecedore','FornecedorController@index')->name('app.fornecedor');
    Route::get('/produto','ProdutoController@index')->name('app.produto');
});

//Route::get('/teste/{p1}/{p2}','TesteController@teste')->name('teste');





/*Route::get('/rota2',function(){
    //redirecionamento de rota dentro da função de callback
    return redirect()->route('site.rota1');
})->name('site.rota1');*/



//Redirecionamento de rotas fora da função de callback
//Route::redirect('/rota2','/rota1');

//Rota de fallback
Route::fallback(function() {
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">Clique aqui </a> para retornar ao início';
});


//Criação de rotas com recebimento de parâmetros
Route::get(
    '/contato/{nome}/{categoria_id}',
    function(
        string $nome = 'Desconhecido',
        int $categoria_id = 1 // 1- 'Informação'
        ){
        echo "Estamos aqui: $nome - $categoria_id";
})->where('categoria_id','[0-9]+')->where('nome', '[A-Za-z]+');

/* verbo http

get
post
put
patch
delete
options

*/


