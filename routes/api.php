<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RankController;
use App\Models\Rank;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post("/get-user", [RankController::class,"getUser"]);
Route::get("/get-ranks", [RankController::class,"getRanksArrage"]);
Route::post("/register", [AuthController::class,"register"]);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
