<?php
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PasswordConfirmationController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return redirect('/login'); })->name('welcome');

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
    Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->name('password.email');
    Route::get('/reset-password', [ResetPasswordController::class, 'create'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'store'])->name('password.update');
});

Route::middleware('auth')->group(function () {
    // Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
    Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');
    Route::get('/email/verify', [EmailVerificationPromptController::class, '__invoke'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware('signed')->name('verification.verify');
    Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, '__invoke'])->name('verification.send');
    // Route::view('/dashboard', 'dashboard')->middleware('verified')->name('dashboard'); 
    Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
    Route::view('/profile', 'profile')->middleware(['verified', 'password.confirm'])->name('profile');
    Route::get('/confirm-password', [PasswordConfirmationController::class, 'show'])->name('password.confirm');
    Route::post('/confirm-password', [PasswordConfirmationController::class, 'store']);
    // Tasks
    Route::post('/add-task', [LoginController::class, 'create_task'])->name('add-task');
    Route::get('/done-task/{id}', [LoginController::class, 'done_task'])->name('done-task');
    Route::get('/remove-task/{id}', [LoginController::class, 'remove_task'])->name('remove-task');

});

