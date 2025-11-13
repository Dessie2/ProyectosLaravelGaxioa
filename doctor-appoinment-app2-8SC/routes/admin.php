<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;

// Dashboard principal del panel
Route::get('/', function () {
    return view('admin.dashboard');
})->name('dashboard');

// CRUD de Roles
Route::resource('roles', RoleController::class)->names('roles');

// CRUD de Usuarios
Route::resource('users', UserController::class)->names('users');
