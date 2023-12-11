<?php

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

// Main Page
Route::get('/', function () {
    return view('main/index');
})->name('main.index');



// Admin Page
Route::get('/dashboard', function() {
    return view('dashboard/index');
})->name('dashboard.index');