<?php

use Modules\Contact\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use Modules\Contact\Models\Contact_Setting;

Route::match(['get', 'post'], Contact_Setting::getLink(), [ContactController::class, 'Contact'])->name('contact');
Route::post(Contact_Setting::getLink().'/form', [ContactController::class, 'form'])->name('contact.form');
Route::post(Contact_Setting::getLink().'/form-email', [ContactController::class, 'register'])->name('register.email');
