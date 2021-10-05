<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\SiteSucessoController;
use App\Http\Controllers\TesteController;

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


// ROUTE DE TESTE PARA PARAMETROS
// Route::get(
//     '/contato/{nome}/{categoria_id} // PARAMETROS',
//     function (
//         string $nome = 'Desconhecido', // VALORES PADRÕES PARA PS PARAMETROS
//         int $categoria_id = 1 // - 'Informação'
//     ) {
//         echo "Estamos aqui:  $nome - $categoria_id";
//     }
// )->where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]+') // VALIDAÇÃO DE PARAMETRO COM REGEX;



// Route::get('/', function () {
//     return 'voda boa!';
// });

// Route::get('/sobre-nos', function () {
//     return 'sobre-nós, Guardiões da Verdade';
// });

// Route::get('/contato', function () {
//     return 'contato com ele: ++++-----';
// });

// metodo redirect redireciona do primeiro parametro para o segundo.
// Route::redirect('/rota2', 'rota1');

Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');
Route::get('/sucesso', [SiteSucessoController::class, 'sucesso'])->name('site.sucesso');
Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('site.sobrenos');
Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');


Route::post('/contato', [ContatoController::class,'salvar'])->name('site.contato');
Route::get('/login', [])->name('site.login');


Route::middleware('autenticacao:padrao, visitante')->prefix('/app')->group(function () {
    Route::get('/clientes', function () {return 'Clientes';})->name('app.clientes');
    Route::get('/fornecedores', [FornecedorController::class, 'index'])->name('app.fornecedores');
    Route::get('/produtos', function () {return 'produtos';})->name('app.produtos');
});


Route::get('/teste/{p1}/{p2}', [TesteController::class, 'teste'])->name('teste');


Route::fallback(function(){
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">Clique aqui</a> para ir até a página inicial.';
});