<?php

use Illuminate\Support\Facades\Route;
use Modules\Home\Controllers\HomeController;
use Modules\Home\Models\Home_Setting;

// App::setLocale('en');
Route::get('/', [HomeController::class, 'Home'])->name('/');
Route::get(Home_Setting::getLink(), [HomeController::class, 'home'])->name('home');
// Route::get('home/form', [HomeController::class, 'sendFrom'])->name('home.sendFrom');
// Route::get('search', [HomeController::class, 'search'])->name('home.search');
