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
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/leitura', [App\Http\Controllers\simulacao\LeituraController::class, 'index'])->name('leitura');

Route::get('/tabuada', [App\Http\Controllers\simulacao\TabuadaController::class, 'index'])->name('tabuada');

Route::get('/perfil', [App\Http\Controllers\PerfilController::class, 'index'])->name('perfil');
Route::post('/perfil/submit', [App\Http\Controllers\PerfilController::class, 'submit'])->name('perfil.submit');
Route::post('/perfil/doc', [App\Http\Controllers\PerfilController::class, 'documentos'])->name('perfil.doc');
Route::post('/perfil/doc/delete', [App\Http\Controllers\PerfilController::class, 'doc_delete'])->name('perfil.doc.delete');

Route::get('/configuracao', [App\Http\Controllers\simulacao\ConfigController::class, 'index'])->name('config');
Route::post('/configuracao/submit', [App\Http\Controllers\simulacao\ConfigController::class, 'submit'])->name('config.submit');