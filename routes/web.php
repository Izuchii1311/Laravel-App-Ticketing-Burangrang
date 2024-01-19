<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\TicketController;
use App\Http\Controllers\Dashboard\TransactionController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PostController;

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

// TODO: User (Guest) Page
Route::get('/', fn() => view('main/index'))->name('main.index');
Route::get('/berita', fn() => view('main.news'))->name('main.news');
Route::get('/wisata', fn() => view('main.tour'))->name('main.tour');
Route::get('/wisata', fn() => view('main.tour'))->name('main.tour');
Route::get('/tentang-kami', fn() => view('main.about-us'))->name('main.about-us');
Route::get('/profile/sejarah-nyalindung', fn() => view('main.history'))->name('main.history');
Route::get('/profile/tentang-burangrang', fn() => view('main.about-burangrang'))->name('main.about-burangrang');
Route::get('/profile/cooperation', fn() => view('main.cooperation'))->name('main.cooperation');

# Guest Page
Route::post('/message', [MessageController::class, 'storeMessage'])->name('main.message');


//TODO: Authentication
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


//TODO: Dashboard Page with Authentication
Route::middleware(['auth'])->group(function () {
    # Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard/index');
    })->name('dashboard.index');


    //TODO: Dashboard Admin
    Route::middleware(['admin'])->group(function() {
        # Message
        Route::get('/dashboard/message', [MessageController::class, 'showMessage'])->name('dashboard.message.show');
        Route::get('/dashboard/message/detail/{slug}', [MessageController::class, 'detailMessage'])->name('dashboard.message.detail');
        Route::delete('/dashboard/message/{slug}', [MessageController::class, 'deleteMessage'])->name('dashboard.message.delete');

        Route::post('/dashboard/message/{slug}/add-to-menu', [MessageController::class, 'addToMenu'])->name('dashboard.message.addToMenu');
        Route::post('/dashboard/message/{slug}/remove-to-menu', [MessageController::class, 'removeToMenu'])->name('dashboard.message.removeToMenu');

        # Posts
        Route::resource('/dashboard/posts', PostController::class);
    });


    // TODO: Dashboard Cashier
    Route::middleware(['cashier'])->group(function () {
        # Ticket
        Route::resource('/dashboard/ticket', TicketController::class);
        # Transaction
        Route::get('/dashboard/transaction/report', [TransactionController::class, 'report'])->name('transaction.report');
        Route::get('/dashboard/transaction/report_pdf', [TransactionController::class, 'report_pdf'])->name('transaction.report_pdf');
        Route::resource('/dashboard/transaction', TransactionController::class);
    });
});
