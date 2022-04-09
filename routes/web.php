<?php

use App\Http\Controllers\ActividadesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProcesosController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CanalesController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\SolicitantesController;
use App\Http\Controllers\TiempoController;
use App\Http\Controllers\ExcelController;

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

Route::resource('proceso',ProcesosController::class)->middleware('auth');
Route::resource('actividades', ActividadesController::class)->middleware('auth');
Route::resource('canales', CanalesController::class)->middleware('auth');
Route::resource('clientes', ClientesController::class)->middleware('auth');
Route::resource('solicitantes', SolicitantesController::class)->middleware('auth');
Route::resource('tiempo', TiempoController::class)->middleware('auth');

Auth::routes();

Route::get('admin/export/', [ProcesosController::class, 'export'])->middleware('auth');


Route::get('/home', [ProcesosController::class, 'index'])->name('home')->middleware('auth');
Route::resource('admin', AdminController::class)->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [ProcesosController::class, 'index'])->name('home');
});

Route::get('storage-link', function(){
    Artisan::call('storage:link');
});
