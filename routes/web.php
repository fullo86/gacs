<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BotController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SnapController;
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
    Route::post('/whatsapp_bot/save', [BotController::class, 'store_inform_wa'])->name('store_inform_wa_bot');
    Route::get('/telegram_bot', [BotController::class, 'page_bot_telegram'])->name('bot_telegram');
    Route::post('/telegram_bot/save', [BotController::class, 'store_inform_telegram'])->name('store_inform_telegram_bot');
    Route::delete('/transactions/delete/{id}', [BotController::class, 'destroy'])->name('remove-trx');

    Route::get('/transactions', [SnapController::class, 'index'])->name('transactions');
    Route::get('/transactions/checkout/{id}', [SnapController::class, 'confirmTrx'])->name('confirm-trx');
    Route::delete('/transactions/remove/{id}', [BotController::class, 'destroy'])->name('remove-trx');
    Route::get('/active/{id}', [SnapController::class, 'trigger'])->name('active');

    Route::middleware('auth-admin')->group(function() {
        Route::get('/transactions/show/deleted', [BotController::class, 'showDeleted'])->name('show-deleted');
        Route::get('/transactions/restore/{id}', [BotController::class, 'restore'])->name('restore-trx');    
    });
});

Route::get('/active/service/{id}', [SnapController::class, 'start_service'])->name('active');


