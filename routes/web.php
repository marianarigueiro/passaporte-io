<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rotas Públicas
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/events', [EventController::class, 'index'])->name('events.index');

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Perfil
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Organizador  <-- MOVER PARA CIMA, ANTES DO SHOW
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'organizer'])->group(function () {
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
});

/*
|--------------------------------------------------------------------------
| Participante  <-- MOVER PARA CIMA
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'participant'])->group(function () {
    Route::post('/events/{event}/subscribe', [SubscriptionController::class, 'subscribe'])->name('events.subscribe');
    Route::delete('/events/{event}/unsubscribe', [SubscriptionController::class, 'unsubscribe'])->name('events.unsubscribe');
});

/*
|--------------------------------------------------------------------------
| Rota Pública de Detalhes (DEVE VIR POR ÚLTIMO)
|--------------------------------------------------------------------------
*/

Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

require __DIR__.'/auth.php';