<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BotController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DashboardController::class, 'dashboard'])->name('homepage');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register/save', [AuthController::class, 'store_register'])->name('registered');
Route::get('/lostpassword', [AuthController::class, 'lostpwd'])->name('lostpassword');
Route::get('/account/verify/{id}', [AuthController::class, 'verified'])->name('verified');


Route::middleware('auth')->group(function() {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/users', [UserController::class, 'index'])->name('users');    
    Route::get('/account/{id}', [UserController::class, 'edit'])->name('account');
    Route::put('/account/update/{id}', [UserController::class, 'update'])->name('update-account');
    Route::get('/account/change-password/{id}', [UserController::class, 'change_password'])->name('change-password');
    Route::patch('/account/change-password/{id}', [UserController::class, 'store_new_password'])->name('account-changepwd');
    
    Route::get('/whatsapp_bot', [BotController::class, 'page_bot_wa'])->name('bot_wa');
    Route::get('/telegram_bot', [BotController::class, 'page_bot_telegram'])->name('bot_telegram');
    
});


