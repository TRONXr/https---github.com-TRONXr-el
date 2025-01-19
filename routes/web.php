<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/register',[RegisterController::class, 'registerform'])->name('auth.register');
Route::post('/register',[RegisterController::class, 'register'])->name('auth.register');

Route::view('/create-application', 'applications.create_application')->name('application.create');
Route::view('/landing', 'applications.landing')->name('application.landing');
Route::view('/application', 'applications.index')->name('application.index');

Route::view('/admin', 'admin.index')->name('admin.index');

Route::get('/login', [LoginController::class, 'loginform'])->name('auth.login');
Route::post('/login', [LoginController::class, 'login'])->name('auth.login');