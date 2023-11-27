<?php

use Modules\Ims\Controllers\ImagesController;
use Illuminate\Support\Facades\Route;

Route::get('uploads/{path?}', ImagesController::class)->where('path', '.*')->name('uploads');
Route::get('thumbs/{path?}', ImagesController::class)->where('path', '.*')->name('thumbs');
