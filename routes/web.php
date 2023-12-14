<?php

use App\Http\Controllers\Fotografia;
use App\Http\Controllers\Registro;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
  return view('index');
})->name('index');

Route::resource('/registro', Registro::class);
Route::resource('/fotografia', Fotografia::class);


Route::get('/fotografia/{fotografium}/delete', [Fotografia::class, 'delete'])->name('fotografia.delete');
Route::get('/registro/{reg}/delete', [Registro::class, 'delete'])->name('registro.delete');

