<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\UserController;

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
    return view('welcome');
});

//Request For System Controller.........
Route::get('/Registration',[SystemController::class,'registrationForm'])->name('registrationForm');
Route::post('/Registration-submission',[SystemController::class,'registrationFormSubmission'])->name('registrationFormSubmission');
Route::get('/Login',[SystemController::class,'loginForm'])->name('loginForm');
Route::post('/Login-submission',[SystemController::class,'loginFormSubmission'])->name('loginFormSubmission');
