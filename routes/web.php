<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->name('dashboard')->middleware(['auth']);

Route::match(['post', 'get'] , '/register', [AuthController::class, 'register'])->name('register');
Route::match(['post', 'get'], '/login', [AuthController::class, 'login'])->name('login');

Route::get('/registered/{id}', [AuthController::class, 'registered'])->name('registered');

Route::get('/verify/{id}', [AuthController::class, 'verify'])->name('verify');

Route::get('/verified', function (){
    return view('verified.index');
})->name('verified');


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


//RECOVER PASS ROUTES

Route::get('/forget', [AuthController::class, 'forget'])->name('forget');
Route::get('/recover/{token}', [AuthController::class, 'recover'])->name('recover');
Route::post('/send_recovery_link', [AuthController::class, 'send_recovery_link'])->name('send_recovery_link');
Route::put('/changepassword/{user}', [AuthController::class, 'changepassword'])->name('change-password');


Route::get('/sent',function (){
    return view('login.recovery');
})->name('sent');
