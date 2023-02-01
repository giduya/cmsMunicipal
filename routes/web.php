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

Route::get('/', [App\Http\Controllers\CmsController::class, 'landing'])->name('landing');

Route::get('/inicio', [App\Http\Controllers\CmsController::class, 'inicio']);

Auth::routes();
