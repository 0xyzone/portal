<?php

use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\AvatarController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;

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
    if (Auth::guest()) {
        return view('welcome');
    } else {
        return redirect('dashboard');
    }
    
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/avatar', [AvatarController::class, 'update'])->name('profile.avatar.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Company routes
    Route::resource('/company', CompanyController::class);
    // Route::get('/company', [CompanyController::class, 'index'])->middleware(['auth', 'verified'])->name('company');
    // Route::get('/company/{id}', [CompanyController::class, 'show'])->name('show.company');
    // Route::get('/company/create', [CompanyController::class, 'create'])->name('create.company');
    // Route::get('/company/edit/{id}', [CompanyController::class, 'edit'])->name('edit.company');
    // Route::post('/company', [CompanyController::class, 'store'])->name('company.store');
    // Route::patch('/company/update/{id}', [CompanyController::class, 'update'])->name('company.update');
    Route::patch('/company/logo', [LogoController::class, 'update'])->name('company.logo.update');
    
    // Staff Routes
    Route::resource('staff', StaffController::class);
    
});

require __DIR__.'/auth.php';
