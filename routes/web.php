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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/site', function () {
    return view('site.index');
})->name('site');

/*Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->middleware(['auth'])->name('dashboard');*/

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);

// OFERTA (SITE)
Route::get('/ofertas/{username}/{idoferta}', [App\Http\Controllers\SiteController::class, 'oferta']);

// DASHBOARD AVALIÇÕES
Route::get('/avaliar/{username}', [App\Http\Controllers\SiteController::class, 'avaliar'])->name('avaliar');
Route::post('/registrar-avaliacao', [App\Http\Controllers\SiteController::class, 'registarAvaliacao'])->name('registrar.avaliacao');
Route::get('/{username}/obrigado', [App\Http\Controllers\SiteController::class, 'avaliarObrigado']);

// DASHBOARD OFERTAS
Route::get('/dashboard/ofertas', [App\Http\Controllers\OfertaController::class, 'index'])->name('ofertas');
Route::get('/dashboard/ofertas/adicionar', [App\Http\Controllers\OfertaController::class, 'criarOfertaView']);
Route::post('/dashboard/ofertas/adicionar', [App\Http\Controllers\OfertaController::class, 'adicionarOferta']);
Route::get('/dashboard/ofertas/detalhar/{id}', [App\Http\Controllers\OfertaController::class, 'detalharOfertaView']);
Route::get('/dashboard/ofertas/alterar/{id}', [App\Http\Controllers\OfertaController::class, 'alterarOfertaView']);
Route::put('/dashboard/ofertas/alterar/{id}', [App\Http\Controllers\OfertaController::class, 'alterarOferta']);
Route::get('/dashboard/ofertas/excluir/{id}', [App\Http\Controllers\OfertaController::class, 'excluirOfertaView']);
Route::put('/dashboard/ofertas/excluir/{id}', [App\Http\Controllers\OfertaController::class, 'excluirOferta']);
Route::get('/dashboard/ofertas/item/adicionar/{oferta}', [App\Http\Controllers\OfertaController::class, 'adicionarOfertaItemView']);
Route::post('/dashboard/ofertas/item/adicionar', [App\Http\Controllers\OfertaController::class, 'adicionarOfertaItem']);
Route::get('/dashboard/ofertas/item/alterar/{id}', [App\Http\Controllers\OfertaController::class, 'alterarOfertaItemView']);
Route::put('/dashboard/ofertas/item/alterar/{id}', [App\Http\Controllers\OfertaController::class, 'alterarOfertaItem']);
Route::get('/dashboard/ofertas/item/excluir/{id}', [App\Http\Controllers\OfertaController::class, 'excluirOfertaItemView']);
Route::put('/dashboard/ofertas/item/excluir/{id}', [App\Http\Controllers\OfertaController::class, 'excluirOfertaItem']);

// DASHBOARD CATEGORIAS
Route::get('/dashboard/categorias', [App\Http\Controllers\CategoriaController::class, 'index'])->name('categorias');
Route::get('/dashboard/categorias/editar/{id}', [App\Http\Controllers\CategoriaController::class, 'edit']);
Route::get('/dashboard/categorias/detalhes/{id}', [App\Http\Controllers\CategoriaController::class, 'show']);
Route::get('/dashboard/categorias/criar', [App\Http\Controllers\CategoriaController::class, 'create']);
Route::get('/dashboard/categorias/delete', [App\Http\Controllers\CategoriaController::class, 'delete']);

// DASHBOARD AVALIACOES
Route::get('/dashboard/avaliacao', [App\Http\Controllers\AvaliacaoController::class, 'index'])->name('avaliacao');
Route::get('/dashboard/avaliacao/detalhar/{id}', [App\Http\Controllers\AvaliacaoController::class, 'avaliacaoDetalhar']);
Route::put('/dashboard/avaliacao/publicar/{id}', [App\Http\Controllers\AvaliacaoController::class, 'avaliacaoPublicar']);

// DASHBOARD PERFIL
Route::get('/dashboard/perfil', [App\Http\Controllers\PerfilController::class, 'index'])->name('perfil');
Route::put('/dashboard/perfil/{id}', [App\Http\Controllers\PerfilController::class, 'atualizar'])->name('perfil.atualizar');

// DASHBOARD CLIENTES
Route::get('/dashboard/clientes', [App\Http\Controllers\ClienteController::class, 'index'])->name('clientes');
Route::get('/dashboard/clientes/detalhar/{id}', [App\Http\Controllers\ClienteController::class, 'detalharView']);
Route::get('/dashboard/clientes/adicionar', [App\Http\Controllers\ClienteController::class, 'adicionarView']);
Route::post('/dashboard/clientes/adicionar', [App\Http\Controllers\ClienteController::class, 'adicionar']);
Route::get('/dashboard/clientes/alterar/{id}', [App\Http\Controllers\ClienteController::class, 'alterarView']);
Route::put('/dashboard/clientes/alterar/{id}', [App\Http\Controllers\ClienteController::class, 'alterar']);
Route::get('/dashboard/clientes/excluir/{id}', [App\Http\Controllers\ClienteController::class, 'excluirView']);
Route::put('/dashboard/clientes/excluir/{id}', [App\Http\Controllers\ClienteController::class, 'excluir']);

//Route::get('/', [App\Http\Controllers\BaseConhecimentoController::class, 'dashboard']);
// Route::get('/base', [App\Http\Controllers\BaseConhecimentoController::class, 'baseLista']);
// Route::get('/base/{urlamigavel}/{id}', [App\Http\Controllers\BaseConhecimentoController::class, 'baseDetalhes']);


require __DIR__.'/auth.php';
