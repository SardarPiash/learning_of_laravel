<?php

use App\Http\Controllers\newController;
use Illuminate\Support\Facades\Route;



Route::get('/',[newController::class,'home'])->name('home');
Route ::get('/service',[newController::class,'service'])->name('service');
Route::get('/about-us',[newController::class,'aboutUs'])->name('aboutUs');
Route ::get('/contact-us',[newController::class,'contactUs'])->name('contactUs');
Route::get('/our-team',[newController::class,'ourTeam'])->name('ourTeam');