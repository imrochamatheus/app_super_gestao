<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;

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
Route::get('/login', function(){return 'Login';})->name('site.login');


//Agrupamento de rotas                                      Nomeando rotas
Route::prefix('app')->group(function(){
    Route::get('/clientes',function(){return 'Clientes';})->name('app.clientes');
    Route::get('/fornecedores','FornecedorController@index')->name('app.fornecedores');
    Route::get('/produtos',function(){return 'Produtos';})->name('app.produtos');
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


