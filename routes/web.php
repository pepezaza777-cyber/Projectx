<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/user', [UserController::class, 'index']);
Route::post('/user/login', [UserController::class, 'login']);
Route::get('/user/register', [UserController::class, 'register_view']);
Route::post('/user/register', [UserController::class, 'register']);
Route::middleware(['CheckUser'])->group(function () {
Route::get('/user/home', [UserController::class, 'home']);
Route::get('/user/changepassword', [UserController::class, 'changepassword_view']);
Route::post('/user/changepassword', [UserController::class, 'changepassword']);
Route::get('/user/logout', [UserController::class, 'logout']);
});
Route::get('/', function () {
    return view('welcome');
});
