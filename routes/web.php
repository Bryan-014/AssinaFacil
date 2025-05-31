<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    $user = Auth::user();

    if ($user->role_id == 'f5504d7f-8f40-4508-907f-48fb119813c6') {
        return redirect()->route('admin.dashboard');
    }

    if ($user->role_id == '1e0ba8e6-0c99-4bd3-9e9c-b89f33ed0fe0') {
        return redirect()->route('client.dashboard');
    }
})->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'ValidAdmin'])->group(function () {
    Route::get('/admin', function() {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/resellers', [PersonController::class, 'resselers'])->name('resellers.index');
    
    Route::get('/clients', [PersonController::class, 'clients'])->name('clients.index');

    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');

    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
});

Route::middleware(['auth', 'ValidClient'])->group(function () {
    Route::get('/client', function() {
        return view('client.dashboard');
    })->name('client.dashboard');

    Route::get('/services/list', [ServiceController::class, 'list'])->name('services.list');

    Route::get('/pending', [ContractController::class, 'index'])->name('pending.index');
    
    Route::get('/history', [PaymentController::class, 'index'])->name('history.index');
});

require __DIR__.'/auth.php';