<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\TicketController;

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

// Authentication
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Page
Route::middleware('auth')->group(function() {
    Route::get('/dashboard', function() {
        return view('dashboard/index');
    })->name('dashboard.index');
    Route::resource('/dashboard/ticket', TicketController::class)->middleware('cashier');
});