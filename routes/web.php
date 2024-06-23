<?php


use App\Http\Controllers\RiskAreaController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\AlertController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Rotas de autenticação
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

// Protegendo rotas com autenticação
Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index']);

    // Rotas de recursos
    Route::resource('risk-areas', RiskAreaController::class);
    Route::resource('incidents', IncidentController::class);
    Route::resource('alerts', AlertController::class);
});
