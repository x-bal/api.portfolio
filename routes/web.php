<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::view('/', 'auth.login');

Route::get('/init', function () {
    shell_exec('composer install');
    Artisan::call('migrate');
    Artisan::call('db:seed');
    Artisan::call('key:generate');
});

Auth::routes([
    'register' => false,
    'reset' => false
]);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/my-profile', [DashboardController::class, 'profile'])->name('myprofile');
    Route::post('/my-profile/{user:id}', [DashboardController::class, 'updateProfile'])->name('my-profile');

    Route::resource('/profile', ProfileController::class);
    Route::resource('/projects', ProjectController::class);
    Route::resource('/skills', SkillController::class);
    Route::resource('/contacts', ContactController::class);
    Route::resource('/tags', TagController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
