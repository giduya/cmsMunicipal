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

Route::get('/', [App\Http\Controllers\LandingController::class, 'index'])->name('landing');

Route::get('/apps', [App\Http\Controllers\CmsController::class, 'apps']);

Route::get('/cms', [App\Http\Controllers\CmsController::class, 'cms']);

Route::get('/cms/menu', [App\Http\Controllers\CmsController::class, 'menu']);

Route::post('/subir', [App\Http\Controllers\CmsController::class, 'subir']);

Auth::routes();
