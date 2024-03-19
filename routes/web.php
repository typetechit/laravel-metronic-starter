<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Roles
    Route::get('/users/{user}/roles/{role}', [RoleController::class, 'assignRole']);
    Route::delete('/users/{user}/roles/{role}', [RoleController::class, 'removeRole']);
    Route::resource('/roles', RoleController::class);

    // permission
    Route::resource('/permissions', PermissionController::class);
    Route::get('/add-permission/{permission}/roles/{role}', [PermissionController::class, 'givePermission']);
    Route::get('/revoke-permission/{permission}/roles/{role}', [PermissionController::class, 'revokePermission']);
});

require __DIR__.'/auth.php';
