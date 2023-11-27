<?php

use Modules\About\Controllers\AboutController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Modules\About\Models\About_Setting;
use Modules\Product\Models\Product;
use Illuminate\Support\Str;

Route::get(About_Setting::getLink(), [AboutController::class, 'about'])->name('about');
