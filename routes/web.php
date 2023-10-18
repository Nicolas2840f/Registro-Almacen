<?php

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



Route::view('/reset','resetPassword')->name("reset");
Route::view('/register','registerUser')->name("register");
Route::view('/login','welcome')->name("login");