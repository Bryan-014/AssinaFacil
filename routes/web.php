<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlanController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    $user = Auth::user();

    if ($user) {
        if ($user->role_id == env('ADMIN_ROLE_ID', 'role_id')) {
            return redirect()->route('admin.dashboard');
        }
    
        if ($user->role_id == env('CLIENT_ROLE_ID', 'role_id')) {
            return redirect()->route('client.dashboard');
        }
    }
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'ValidOnlyAdmin'])->group(function () {
    Route::get('/resellers', [PersonController::class, 'resellers'])->name('resellers.index');
    Route::get('/resellers/{id}/show', [PersonController::class, 'show'])->name('resellers.show');
    Route::post('/resellers/store', [PersonController::class, 'store'])->name('resellers.store');
    Route::post('/resellers/{id}/update', [PersonController::class, 'update'])->name('resellers.update');
    Route::post('/resellers/{id}/destroy', [PersonController::class, 'destroy'])->name('resellers.destroy');
});

Route::middleware(['auth', 'ValidAdmin'])->group(function () {
    Route::get('/admin', function() {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    
    Route::get('/clients', [PersonController::class, 'clients'])->name('clients.index');
    Route::get('/clients/{id}/show', [PersonController::class, 'show'])->name('clients.show');
    Route::post('/clients/store', [PersonController::class, 'store'])->name('clients.store');
    Route::post('/clients/{id}/update', [PersonController::class, 'update'])->name('clients.update');
    Route::post('/clients/{id}/destroy', [PersonController::class, 'destroy'])->name('clients.destroy');

    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::get('/services/{id}/show', [ServiceController::class, 'show'])->name('services.show');
    Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::post('/services/store', [ServiceController::class, 'store'])->name('services.store');
    Route::post('/services/{id}/update', [ServiceController::class, 'update'])->name('services.update');
    Route::post('/services/{id}/destroy', [ServiceController::class, 'destroy'])->name('services.destroy');
    
    Route::get('/services/{service_id}/plans', [PlanController::class, 'index'])->name('plans.index');
    Route::get('/services/{service_id}/plans/create', [PlanController::class, 'create'])->name('plans.create');
    Route::get('/services/{service_id}/plans/{id}/show', [PlanController::class, 'show'])->name('plans.show');
    Route::get('/services/{service_id}/plans/{id}/edit', [PlanController::class, 'edit'])->name('plans.edit');
    Route::post('/services/{service_id}/plans/store', [PlanController::class, 'store'])->name('plans.store');
    Route::post('/services/{service_id}/plans/{id}/update', [PlanController::class, 'update'])->name('plans.update');
    Route::post('/services/{service_id}/plans/{id}/destroy', [PlanController::class, 'destroy'])->name('plans.destroy');
    
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index'); 
    Route::get('/payments/{id}/show', [PaymentController::class, 'show'])->name('payments.show');
});

require __DIR__.'/auth.php';
