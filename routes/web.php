<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\TicketController;
use App\Http\Controllers\Dashboard\TransactionController;
use App\Http\Controllers\Admin\MessageController;

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

//TODO: Main Page
Route::get('/', fn() => view('main/index'))->name('main.index');
Route::get('/berita', fn() => view('main.news'))->name('main.news');
Route::get('/wisata', fn() => view('main.tour'))->name('main.tour');
Route::get('/wisata', fn() => view('main.tour'))->name('main.tour');
Route::get('/tentang-kami', fn() => view('main.about-us'))->name('main.about-us');
Route::get('/profile/sejarah-nyalindung', fn() => view('main.history'))->name('main.history');
Route::get('/profile/tentang-burangrang', fn() => view('main.about-burangrang'))->name('main.about-burangrang');
Route::get('/profile/cooperation', fn() => view('main.cooperation'))->name('main.cooperation');

//* Guest Create Message
Route::post('/message', [MessageController::class, 'storeMessage'])->name('main.message');


//TODO: Authentication
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//TODO: Admin Page
Route::middleware(['auth'])->group(function () {
    //* View Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard/index');
    })->name('dashboard.index');

    //* Middleware Admin
    Route::middleware(['admin'])->group(function() {
        //* Message
        Route::get('/dashboard/messages', [MessageController::class, 'showMessage'])->name('dashboard.message.show');
        Route::get('/dashboard/messages/detail/{id}', [MessageController::class, 'detailMessage'])->name('dashboard.message.detail');
        Route::delete('/dashboard/messages/{id}', [MessageController::class, 'deleteMessage'])->name('dashboard.message.delete');

        Route::post('/dashboard/message/{id}/add-to-menu', [MessageController::class, 'addToMenu'])->name('dashboard.message.addToMenu');
        Route::post('/dashboard/message/{id}/remove-to-menu', [MessageController::class, 'removeToMenu'])->name('dashboard.message.removeToMenu');
    });

    //* Middleware Cashier
    # Route ticket
    Route::middleware(['cashier'])->group(function () {
        Route::resource('/dashboard/ticket', TicketController::class);
    });
    # Route Transaction
    Route::middleware('cashier')->group(function () {
        Route::get('/dashboard/transaction/report', [TransactionController::class, 'report'])->name('transaction.report');
        Route::get('/dashboard/transaction/report_pdf', [TransactionController::class, 'report_pdf'])->name('transaction.report_pdf');
        Route::resource('/dashboard/transaction', TransactionController::class);
    });
});
