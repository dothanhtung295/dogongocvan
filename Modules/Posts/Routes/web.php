<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use Modules\Posts\Controllers\PostController;
use Modules\Posts\Models\Posts_Setting;

// $namespace = 'Modules\\Posts\\Controllers';
// Route::group(['module' => 'Posts','controller' => $namespace . '\\PostController', 'middleware' => 'web'],
// function () {
//     $friendly_link = DB::table('friendly_link')->where('friendly_link', Str::afterLast(Request()->path(), '/'))->first();


//     Route::prefix(Posts_Setting::getLink('posts_link', $friendly_link->lang ?? 'vi'))
//         ->controller(PostController::class)
//         ->group(function () {
//             Route::get('/{posts}', 'Detail')->name("post.detail");
//         });
// });
Route::get(Posts_Setting::getLink('posts_link', $friendly_link->lang ?? 'vi') . '/{posts}', [PostController::class, 'Detail'])->name("post.detail");
