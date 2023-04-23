<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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

Route::get('/company', function () {
    $user = Auth::user();
    $company = $user->company;
    if($user->company_id == null){
        return redirect(route('create.company'));
    } else {
        return view('company.index', compact('user', 'company'));
    }
})->middleware(['auth', 'verified'])->name('company');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/avatar', [AvatarController::class, 'update'])->name('profile.avatar.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Company routes
    Route::get('/company/create', [CompanyController::class, 'create'])->name('create.company');
    Route::get('/company/edit/{id}', [CompanyController::class, 'edit'])->name('edit.company');
    Route::post('/company', [CompanyController::class, 'store'])->name('company.store');
    Route::patch('/company/logo', [CompanyController::class, 'update'])->name('company.logo.update');
});

require __DIR__.'/auth.php';
