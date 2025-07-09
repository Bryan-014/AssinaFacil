<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlanController;
use App\Models\Payment;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    $user = Auth::user();

    if ($user) {
        if ($user->role_id == env('DEALER_ROLE_ID', 'role_id') || $user->role_id == env('ADMIN_ROLE_ID', 'role_id')) {
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

    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'ValidOnlyAdmin'])->group(function () {
    Route::get('/resellers', [UserController::class, 'resellers'])->name('resellers.index');
    Route::get('/resellers/{id}/show', [UserController::class, 'show'])->name('resellers.show');
    Route::post('/resellers/store', [UserController::class, 'store'])->name('resellers.store');
    Route::post('/resellers/{id}/update', [UserController::class, 'update'])->name('resellers.update');
    Route::post('/resellers/{id}/destroy', [UserController::class, 'destroy'])->name('resellers.destroy');
    
    Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::post('/services/store', [ServiceController::class, 'store'])->name('services.store');
    Route::post('/services/{id}/update', [ServiceController::class, 'update'])->name('services.update');
    Route::post('/services/{id}/destroy', [ServiceController::class, 'destroy'])->name('services.destroy');

    Route::get('/services/{service_id}/plans/create', [PlanController::class, 'create'])->name('plans.create');
    Route::get('/services/{service_id}/plans/{id}/edit', [PlanController::class, 'edit'])->name('plans.edit');
    Route::post('/services/{service_id}/plans/store', [PlanController::class, 'store'])->name('plans.store');
    Route::post('/services/{service_id}/plans/{id}/update', [PlanController::class, 'update'])->name('plans.update');
    Route::post('/services/{service_id}/plans/{id}/destroy', [PlanController::class, 'destroy'])->name('plans.destroy');
});

Route::middleware(['auth', 'ValidAdmin'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    Route::get('/clients', [UserController::class, 'clients'])->name('clients.index');
    Route::get('/clients/{id}/show', [UserController::class, 'show'])->name('clients.show');
    Route::get('/clients/{id}/show/{contract_id}', [UserController::class, 'show'])->name('clients.contract');
    Route::post('/clients/store', [UserController::class, 'store'])->name('clients.store');
    Route::post('/clients/{id}/update', [UserController::class, 'update'])->name('clients.update');
    Route::post('/clients/{id}/destroy', [UserController::class, 'destroy'])->name('clients.destroy');

    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('/services/{id}/show', [ServiceController::class, 'show'])->name('services.show');
    
    Route::get('/services/{service_id}/plans', [PlanController::class, 'index'])->name('plans.index');
    Route::get('/services/{service_id}/plans/{id}/show', [PlanController::class, 'show'])->name('plans.show');
    
    Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index'); 
    Route::get('/payment/{id}/show', [PaymentController::class, 'show'])->name('payment.show');
});

Route::middleware(['auth', 'ValidClient'])->group(function () {
    Route::get('/client', [ContractController::class, 'index'])->name('client.dashboard');
    Route::get('/client/{contract_id}', [ContractController::class, 'show'])->name('client.contract');

    Route::get('/services/list', [ServiceController::class, 'list'])->name('services.list');
    Route::get('/services/{id}/view', [ServiceController::class, 'view'])->name('services.view');
    
    Route::post('/contract/{plan_id}', [ContractController::class, 'store'])->name('contract.store');
    Route::post('/contract/{id}/update', [ContractController::class, 'update'])->name('contract.update');
    Route::post('/contract/{id}/destroy', [ContractController::class, 'destroy'])->name('contract.destroy');

    Route::get('/pending', [ContractController::class, 'pending'])->name('pending.index');
    Route::get('/pending/{id}/show', [PaymentController::class, 'create'])->name('pending.show');
    
    Route::get('/payments/my', [PaymentController::class, 'history'])->name('payments.history');
    Route::get('/payments/my/{id}/show', [PaymentController::class, 'show'])->name('payments.show');
    Route::post('/payment/{contract_id}', [PaymentController::class, 'store'])->name('payments.store');
    Route::post('/payment/update/', [PaymentController::class, 'update'])->name('payment.update');
});

require __DIR__.'/auth.php';
