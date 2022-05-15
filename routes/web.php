<?php

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

Route::get('/', [\App\Http\Controllers\UserController::class, 'show']);

Route::get('/home', [\App\Http\Controllers\QuizController::class, 'show']);

Route::get('/registeruser', [\App\Http\Controllers\UserController::class, 'registerUser']);

Route::post('/login', [\App\Http\Controllers\UserController::class, 'login']);

Route::get('/quiz/create', [\App\Http\Controllers\QuizController::class, 'create']);

Route::get('/quiz/edit/{id}', [\App\Http\Controllers\QuizController::class, 'edit']);

Route::get('/quiz/delete/{id}', [\App\Http\Controllers\QuizController::class, 'delete']);

Route::post('/quiz/save', [\App\Http\Controllers\QuizController::class, 'save']);

Route::post('/register', [\App\Http\Controllers\UserController::class, 'register']);
