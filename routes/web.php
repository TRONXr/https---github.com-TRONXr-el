<?php
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    $achievements = \App\Models\Achievement::all(); // Получаем все достижения
    return view('applications.landing', compact('achievements')); // Передаем в представление
})->name('landing');
Route::view('/landing', 'applications.landing')->name('applications.landing');

Route::post('/landing', [MessageController::class, 'landing'])->name('applications.landing');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');





Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index'); // Главная админ панель с заявками
    Route::get('/dashboard/message/{id}/edit', [AdminController::class, 'edit'])->name('dashboard.message.edit'); // Страница редактирования заявки
    Route::post('/dashboard/message/{id}', [AdminController::class, 'update'])->name('dashboard.message.update'); // Обновление заявки
    Route::delete('/dashboard/message/{id}', [AdminController::class, 'destroy'])->name('dashboard.message.destroy'); // Удаление заявки
    // Достижения
    Route::post('/dashboard/achievements', [AdminController::class, 'storeAchievement'])->name('admin.achievements.store');
    Route::delete('/dashboard/achievements/{id}', [AdminController::class, 'destroyAchievement'])->name('admin.achievements.destroy');
});

// ТЕСТЫ
Route::get('tests', [TestController::class, 'index'])->name('tests.index');
Route::get('/tests/{test}', [TestController::class, 'show'])->name('tests.show');
Route::post('/tests/{test}/result', [TestController::class, 'result'])->name('tests.result');



Route::get('/tests/{test}/result-pdf', [TestController::class, 'downloadPdf'])->name('tests.downloadPdf');


// رَبَّنَا آتِنَا فِي الدُّنْيَا حَسَنَةً وَفِي الآخِرَةِ حَسَنَةً وَقِنَا عَذَابَ النَّارِ 
// بِسْمِ اللّٰهِ
// Ва минхьум ман якъулу раббанā 'āтинā фи ад-дуня хасанатан ва фи ал-'āхъиратихасанатан ва къинā гьазъāба ан-нāр 
// «Господи, даруй нам благо в этой жизни и благо в вечности и защити нас от адского наказания» (сура аль-Бакара, аят – 201)

