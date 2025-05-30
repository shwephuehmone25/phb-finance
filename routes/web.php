<?php

use App\Http\Controllers\Admin\BankAccountController;
use App\Http\Controllers\Admin\CurrencyRateController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isMember;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/admin/login', function () {
    return view('admin.auth.signIn');
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
    // Route::get('/login', 'showLoginForm')->name('login.form');
    // Route::post('/login', 'login')->name('login');
});

/**User Auth */
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

/*Admin Auth Routes*/
Route::get('admin/login', [AuthController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('admin/login', [AuthController::class, 'LoginAsAdmin']);

/*Admin Routes*/
Route::middleware(['auth:admin', isAdmin::class . ':SuperAdmin'])->group(function () {
    /**Auth */
    Route::post('admin/logout', [AuthController::class, 'logoutAsAdmin'])->name('admin.logout');

    /*Banks*/
    Route::get('banks', [BankAccountController::class, 'index'])->name('banks.index');
    Route::get('banks/create', [BankAccountController::class, 'create'])->name('banks.create');
    Route::post('banks', [BankAccountController::class, 'store'])->name('banks.store');
    Route::get('banks/{bankAccount}/edit', [BankAccountController::class, 'edit'])->name('banks.edit');
    Route::put('banks/{bankAccount}', [BankAccountController::class, 'update'])->name('banks.update');
    Route::delete('banks/{bankAccount}', [BankAccountController::class, 'destroy'])->name('banks.destroy');
    Route::get('banks/{bankAccount}', [BankAccountController::class, 'show'])->name('banks.show');

    /**Currency Rate */
    Route::get('currency-rates', [CurrencyRateController::class, 'index'])->name('currency-rates.index');
    Route::get('currency-rates/create', [CurrencyRateController::class, 'create'])->name('currency-rates.create');
    Route::post('currency-rates', [CurrencyRateController::class, 'store'])->name('currency-rates.store');
    Route::get('currency-rates/{currencyRate}/edit', [CurrencyRateController::class, 'edit'])->name('currency-rates.edit');
    Route::put('currency-rates/{currencyRate}', [CurrencyRateController::class, 'update'])->name('currency-rates.update');
    Route::delete('currency-rates/{currencyRate}', [CurrencyRateController::class, 'destroy'])->name('currency-rates.destroy');
    Route::get('currency-rates/{currencyRate}', [CurrencyRateController::class, 'show'])->name('currency-rates.show');

    /**Dashboard */
    Route::get('/admin/dashboard', [TransactionController::class, 'index'])->name('dashboard');

    /**transaction */
    Route::get('transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('transactions/{transaction}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');
    Route::put('transactions/{transaction}', [TransactionController::class, 'update'])->name('transactions.update');
    Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
});

/*User Routes*/
Route::middleware(['auth', isMember::class . ':User'])->group(function () {
    /**transaction */
    Route::get('/transactions/get', [DashboardController::class, 'getAllTransactions'])->name('get.transactions');
    Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
    Route::post('/transactions/create', [TransactionController::class, 'store'])->name('transactions.store');
    Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');
});
