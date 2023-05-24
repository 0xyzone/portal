<?php

use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\AvatarController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\OrderController;
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
    
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile Routes
    Route::resource('/profile', ProfileController::class);
    Route::patch('/profile/avatar/update', [AvatarController::class, 'update'])->name('avatar.update');

    // Company routes
    Route::resource('/company', CompanyController::class);
    Route::patch('/company/logo', [LogoController::class, 'update'])->name('company.logo.update');
    
    // Staff Routes
    Route::resource('staff', StaffController::class);

    // Inventory Routes
    Route::resource('{company}/inventory', ItemController::class);

    // Order Routes
    Route::resource('{company}/order', OrderController::class);
    Route::get('/{company}/order/{order}/step2', [OrderController::class, 'create_order_items'])->name('order.create.items');
    Route::post('/{company}/order/{order}/step2/store', [OrderController::class, 'store_order_items'])->name('order.store.item');

});

require __DIR__.'/auth.php';
