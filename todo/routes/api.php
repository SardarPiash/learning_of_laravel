<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\UserController;


Route::get('/Registration',[SystemController::class,'registrationForm'])->name('registrationForm');
Route::post('/Registration-submission',[SystemController::class,'registrationFormSubmission'])->name('registrationFormSubmission');
Route::get('/Login',[SystemController::class,'loginForm'])->name('loginForm');
Route::post('/Login-submission',[SystemController::class,'loginFormSubmission'])->name('loginFormSubmission');

//Request for Admin Controller......
Route ::get('/Admin-dashboard',[AdminController::class,'viewAdminDashboard'])->name('viewAdminDashboard');


//Request for User Controller.....
Route ::get('/User-dashboard',[UserController::class,'viewUserDashboard'])->name('viewUserDashboard');
Route::post('/Todo-list',[UserController::class,'seetodolist'])->name('seetodolist');
Route::post('/Add-Todo',[UserController::class,'addtodo'])->name('addtodo');

