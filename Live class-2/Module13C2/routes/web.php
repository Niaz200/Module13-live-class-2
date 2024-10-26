<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerificationMiddleware;

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

// Page Route
Route::view('/Registration','pages.auth.registration-page');
Route::view('/Login','pages.auth.login-page');
Route::view('/Profile','pages.dashboard.profile-page')->middleware([TokenVerificationMiddleware::class]);


// Back-End Route
Route::post("/userRegistration",[UserController::class,'userRegistration']);
Route::post("/userLogin",[UserController::class,'userLogin']);
Route::get("/userProfile",[UserController::class,'userProfile'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/userLogout",[UserController::class,'userLogout'])->middleware([TokenVerificationMiddleware::class]);
