<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\UserController;
use Inertia\Inertia;
Route::get('/', function () {
    return Inertia::render('UserForm');
});


Route::get('/users', [UserController::class, 'index'])->name('users.index'); // List Users
Route::post('/userscreate', [UserController::class, 'store'])->name('users.store'); // Create User
Route::get('/users/{user}', [UserController::class, 'edit'])->name('users.edit'); // Edit User
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update'); // Update User
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy'); // Delete User

