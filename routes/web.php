<?php

use App\Http\Controllers\RegisterUsuarioController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\tipoDocumentoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;

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


    Route::post('/reset', [ForgotPasswordController::class, 'sendResetLink'])->name('password.send');
    Route::post('/code-reset', [ForgotPasswordController::class, 'resetPassword'])->name('password.code');
    Route::view('/confirmation', 'codeConfirmation')->name('password.verify');
    Route::get('/reset-password/{email}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class,'resetPassword'])->name('password.update');




Route::view('/reset', 'resetPassword')->name("reset");
Route::get('/register', [tipoDocumentoController::class, 'index'])->name("register");
Route::view('/login', 'welcome')->name("login");
Route::view('/main', 'mainView')->name("mainView")->middleware('auth');
