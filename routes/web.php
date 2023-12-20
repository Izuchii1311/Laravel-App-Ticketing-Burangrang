<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\TicketController;
use App\Http\Controllers\Dashboard\TransactionController;

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

// Main Page
Route::get('/', function () {
    return view('main/index');
})->name('main.index');
Route::get('/berita', fn() => view('main.news'))->name('main.news');
Route::get('/wisata', fn() => view('main.tour'))->name('main.tour');
Route::get('/wisata', fn() => view('main.tour'))->name('main.tour');
Route::get('/tentang-kami', fn() => view('main.about-us'))->name('main.about-us');
Route::get('/profile/sejarah-nyalindung', fn() => view('main.history'))->name('main.history');
Route::get('/profile/tentang-burangrang', fn() => view('main.about-burangrang'))->name('main.about-burangrang');
Route::get('/profile/cooperation', fn() => view('main.cooperation'))->name('main.cooperation');

// Authentication
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Page
Route::middleware(['auth'])->group(function () {
    // View Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard/index');
    })->name('dashboard.index');

    // Middleware Cashier
    Route::middleware(['cashier'])->group(function () {
        Route::resource('/dashboard/ticket', TicketController::class);
    });
    Route::middleware('cashier')->group(function () {
        Route::get('/dashboard/transaction/laporan', [TransactionController::class, 'laporan'])->name('transaction.laporan');
        Route::resource('/dashboard/transaction', TransactionController::class);
    });
});
