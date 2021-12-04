<?php

use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\SkillController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('profile', [ProfileController::class, 'index']);
Route::get('projects', [ProjectController::class, 'index']);
Route::get('skills', [SkillController::class, 'index']);
Route::get('contacts', [ContactController::class, 'index']);
