<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RankController;
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

Route::get('/login', [AuthController::class,"showLogin"]);
Route::post('/auth/login', [AuthController::class,"login"])->name("login");
Route::get('/register', [AuthController::class,"showRegister"]);
Route::middleware(["auth"])->group(function () {
    Route::get('/', [RankController::class,"getRanksArrage"])->name("index");
    Route::post('/', [RankController::class,"gestUser"]);
    Route::post('/create', [PostController::class,"store"])->name("create.post");
});