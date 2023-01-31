<?php

use Illuminate\Support\Facades\Route;

use App\Models\Instalar;
use App\Models\Declaracion;


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

Route::get('/', [App\Http\Controllers\PublicController::class, 'landing'])->name('landing');

Route::get('/phpInfo', [App\Http\Controllers\PublicController::class, 'phpInfo']);

Route::get('/validacion/{declaracionId}', [App\Http\Controllers\PublicController::class, 'validacion']);

Route::get('/old', [App\Http\Controllers\PublicController::class, 'old']);



Route::patch('inicio/titular', [App\Http\Controllers\DashboardController::class, 'titular']);

Route::patch('inicio/contrasena', [App\Http\Controllers\DashboardController::class, 'contrasena']);

Route::get('inicio/transparencia', [App\Http\Controllers\DashboardController::class, 'transparencia']);

Route::match(['get','post'],'/inicio/{pestana?}', [App\Http\Controllers\DashboardController::class, 'inicio'])->name('inicio');



Route::post('cliente/deploy', [App\Http\Controllers\ClienteController::class, 'deploy']);

Route::post('cliente/crear', [App\Http\Controllers\ClienteController::class, 'crear']);

Route::get('cliente/{subdominio}/borrar', [App\Http\Controllers\ClienteController::class, 'borrar']);

Auth::routes();




Route::match(['get','post','patch'],'declarante/crear', [App\Http\Controllers\DashboardController::class, 'declaranteCrear']);

Route::match(['get','post'],'declarante/lista', [App\Http\Controllers\DashboardController::class, 'declaranteLista']);

Route::delete('declarante/borrar', [App\Http\Controllers\DashboardController::class, 'declaranteBorrar']);

Route::match(['get','post'],'declarante/importar', [App\Http\Controllers\DashboardController::class, 'declaranteImportar']);

Route::patch('declarante/contrasena', [App\Http\Controllers\DashboardController::class, 'declarantePassword']);

Route::get('declarante/{usuario}', [App\Http\Controllers\DashboardController::class, 'declaranteHistorial']);

Route::get('declarante/{usuario}/editar', [App\Http\Controllers\DashboardController::class, 'declaranteCrear']);

Route::post('configuracion', [App\Http\Controllers\DashboardController::class, 'config']);






Route::get('versionPublica/{declaracionId}/pdf', [App\Http\Controllers\PublicController::class, 'pdf']);

Route::get('{declaracion?}/{declaracionId}/acuse', [App\Http\Controllers\PublicController::class, 'acuse']);




Route::get('/catalogo/{catalogo}/{a?}/{b?}/{c?}', [App\Http\Controllers\DeclaracionController::class, 'catalogo']);

Route::post('declaracion/crear', [App\Http\Controllers\DeclaracionController::class, 'crear']);

Route::get('{declaracion?}/{declaracionId}/siguiente', [App\Http\Controllers\DeclaracionController::class, 'siguiente']);

Route::get('{declaracion?}/{declaracionId}/borrar', [App\Http\Controllers\DeclaracionController::class, 'borrar']);

Route::match(['get','post','delete'], '/{declaracion?}/{declaracionId}/{tipoDeclaracion?}/{formatoSlug?}/{subformatoSlug?}/{array?}', [App\Http\Controllers\DeclaracionController::class, 'formato']);
