<?php

use App\Http\Controllers\RegisterUsuarioController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\tipoDocumentoController;
use App\Http\Controllers\UsuarioController;
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

Route::view('/', 'welcome');


// Route::resource('usuario', UsuarioController::class, [
//     'names' => 'usuario',
//     'parameters' => ['usuario' =>  'usuario'],
// ]);

Route::post('/register', [RegisterUsuarioController::class, 'store'])->name('usuario.store');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');


Route::view('/reset', 'resetPassword')->name("reset");
Route::get('/register', [tipoDocumentoController::class, 'index'])->name("register");
Route::view('/login', 'welcome')->name("login");
Route::view('/main', 'mainView')->name("mainView")->middleware('auth');
