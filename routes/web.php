<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Foundation\Console\RouteListCommand;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('login', [AuthController::class, 'index'])->name('login');

Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');

Route::get('registration', [AuthController::class, 'registration'])->name('registration');

Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('registration.post');

Route::get('index', [AuthController::class, 'dashboard'])->name('index');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

//Forgot Password

Route::get('forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('forgot.password.get');

Route::post('forgot-password', [ForgotPasswordController::class, 'submitForgotPasswordForm'])->name('forgot.password.post');

Route::get('reset-password/{token}', [ForgotPasswordController::class,'showResetPasswordForm'])->name('reset.password.get');

Route::post('reset-password', [ForgotPasswordController::class, 'submitPasswordResetForm'])->name('reset.password.post');

//Category


