<?php

use App\Http\Controllers\RegisterUsuarioController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\tipoDocumentoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\PortatilController;
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
// Routes register - login - welcome
Route::view('/', 'welcome')->name('welcome');
Route::post('/register', [RegisterUsuarioController::class, 'store'])->name('usuario.store');
Route::get('/register', [tipoDocumentoController::class, 'index'])->name("register");
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
Route::view('/login', 'welcome')->name("login");

// Routes resetPassword
Route::post('/reset', [ForgotPasswordController::class, 'sendResetLink'])->name('password.send');
Route::post('/code-reset', [ForgotPasswordController::class, 'resetPassword'])->name('password.code');
Route::view('/confirmation', 'codeConfirmation')->name('password.verify');
Route::get('/reset-password/{email}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('password.update');
Route::view('/reset', 'resetPassword')->name("reset");

// Route navigation
Route::view('/main', 'mainView')->name("mainView")->middleware('auth');
Route::view('/Registroentradas', 'registros.Registro')->name('RRegistro')->middleware('auth');
Route::view('/HistorialRegistros', 'registros.HistorialRegistros')->name('HRegistro')->middleware('auth');
Route::view('/portatiles', 'portatiles.CRUDPortatiles')->name('CRUDPortatiles')->middleware('auth');
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('Usuarios')->middleware('auth');


Route::post('Buscar', [UsuarioController::class, 'buscarByDocument'])->name('buscar');

//  Routes portatiles
Route::post('/portatiles', [PortatilController::class,'store'])->name('portatil.store');
