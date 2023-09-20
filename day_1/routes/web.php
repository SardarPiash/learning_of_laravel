<?php

use App\Http\Controllers\newController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;



Route::get('/',[newController::class,'home'])->name('home');
Route ::get('/service',[newController::class,'service'])->name('service');
Route::get('/about-us',[newController::class,'aboutUs'])->name('aboutUs');
Route ::get('/contact-us',[newController::class,'contactUs'])->name('contactUs');
Route::get('/our-team',[newController::class,'ourTeam'])->name('ourTeam');
Route::get('/student-info-form',[newController::class,'viewForm'])->name('studentInfo');
Route::post('/submitForm',[newController::class,'output'])->name('studentForm');

// Route for Tecaher Controller....
Route::get('/Teacher-form',[TeacherController::class,'viewForm'])->name('teacher');
Route::post('/submitForm',[TeacherController::class,'submitForm'])->name('teacherForm');

//Route for User Controller....
Route::get('/Registration',[UserController::class,'registration'])->name('registration');
Route::post('/submitForm1',[UserController::class,'registrationForm'])->name('registrationForm');
Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/submitForm2',[UserController::class,'loginForm'])->name('loginForm');
