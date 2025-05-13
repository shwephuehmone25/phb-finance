<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CurrencyRateController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard.dashboard');
});

//Auth::routes();
Route::prefix('user')->controller(AuthController::class)->group(function () {
    // STEP 1: Phone & OTP
    Route::get('/request-otp', 'showOtpRequestForm')->name('otp.request');
    Route::post('/send-otp', 'requestOtp')->name('otp.send');

    // STEP 2: Verify OTP
    Route::get('verify-otp', 'showVerifyOtpForm')->name('otp.verify');
    Route::post('verify-otp', 'verifyOtp')->name('verify.otp');

    // STEP 3: Complete registration
    Route::get('/register', 'showRegisterForm')->name('register.form');
    Route::post('/register', 'register')->name('register');

    // Login
    Route::get('/login', 'showLoginForm')->name('login.form');
    Route::post('/login', 'login')->name('login');
});

Route::resource('currency-rates', CurrencyRateController::class);
