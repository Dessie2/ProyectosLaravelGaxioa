<?php

use Illuminate\Support\Facades\Route;

// Redirigir la raíz hacia /admin
Route::redirect('/', '/admin');

// Rutas protegidas por autenticación
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Agrupamos todas las rutas del panel admin
    Route::prefix('admin')->name('admin.')->group(function () {
        require __DIR__ . '/admin.php';
    });

    // Si quisieras dejar el dashboard general de Jetstream:
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
