<?php

use App\Http\Controllers\AuthenticationController;
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
    return view('welcome');
})->name('home');
// User signup and login routes
Route::get('/register', [AuthenticationController::class, 'create'])->name('register_user');
Route::get('/store', [AuthenticationController::class, 'store'])->name('store_user');
Route::get('/login', [AuthenticationController::class, 'index'])->name('login');