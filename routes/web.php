<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{CidadeController,
                                ImovelController,
                                FotoController};

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

Route::prefix('admin')->name('admin.')->group(function(){

    Route::resource('cidades', CidadeController::class)->except(['show']);
    Route::resource('imoveis', ImovelController::class);
    Route::resource('imoveis.fotos', FotoController::class)->except(['show', 'edit', 'update']);;

});

Route::resource('/', App\Http\Controllers\Site\CidadeController::class)->only('index');

Route::get('/sobre', function () {
    return '<h1>Sobre</h1>';
});
