<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReferralController;

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

// Default route
Route::get('/', [Controller::class, 'index'])->name('index'); // List all users

// User Routes
Route::get('/users', [UserController::class, 'index'])->name('users.index'); // List all users
Route::get('/users/create', [UserController::class, 'create'])->name('users.create'); // Show create form
Route::post('/users', [UserController::class, 'store'])->name('users.store'); // Store a new user

Route::get('/referrals/{id}', [ReferralController::class, 'referrals'])->name('users.index'); // List all users