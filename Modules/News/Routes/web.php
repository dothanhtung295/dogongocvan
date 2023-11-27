<?php

use Modules\News\Controllers\NewsController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Modules\News\Models\News_Setting;
use Illuminate\Support\Str;
use Modules\Ims\Models\Menu;
use Modules\News\Models\News_Group;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Arr;
use Modules\Service\Controllers\ServiceController;

Route::get(News_Setting::getLink(), [NewsController::class, 'News'])->name('news');
Route::get(News_Setting::getLink() . '/{new}', [NewsController::class, 'Detail'])->name('news.detail');
