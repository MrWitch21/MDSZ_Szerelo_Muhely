<?php

use App\Http\Controllers\ProfileController;
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


Route::get('/', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('/');

Route::get('/create', function () {
    return view('create');
})->middleware(['auth', 'verified'])->name('create');

Route::get('/active', function () {
    return view('active');
})->middleware(['auth', 'verified'])->name('active');

Route::get('/closed', function () {
    return view('closed');
})->middleware(['auth', 'verified'])->name('closed');

Route::get('/warehouse', function () {
    return view('warehouse');
})->middleware(['auth', 'verified'])->name('warehouse');

Route::get('/service', function () {
    return view('service');
})->middleware(['auth', 'verified'])->name('service');

Route::group(['middleware' => ['auth', 'mechanic']], function () {
});
Route::group(['middleware' => ['auth', 'receptionist']], function () {
});

// admin middleware-hez tartozó útvonalaink
Route::group(['middleware' => ['auth', 'admin']], function () {
    // 1. admin útvonal regisztrációja
    // 2. admin útvonal regisztrációja
    // ...
    // utolsó admin útvonal regisztrációja
});

require __DIR__ . '/auth.php';
