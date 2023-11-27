<?php

use Illuminate\Support\Facades\App;
use Modules\User\Controllers\UserController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Modules\User\Models\User_Setting;
use Illuminate\Support\Str;

$namespace = 'Modules\\User\\Controllers';
Route::middleware('web')->group(function () {
    Route::post('dang-nhap', [UserController::class, 'login'])->name('login.post');
    Route::get('dang-ky', [UserController::class, 'getRegister'])->name('register');
    Route::post('dang-ky', [UserController::class, 'postRegister'])->name('register.post');

    // quên mật khẩu
    Route::post('forgot-password', [UserController::class, 'postForgotPassword'])->name('forgot-password.post');
    Route::get('forgot-password', [UserController::class, 'getUpdatePassword'])->name('forgot-password.active');
    Route::post('update-password', [UserController::class, 'updatePassword'])->name('user.update.password');

    // end

    Route::get('logout', [UserController::class, 'logout'])->name('logout');

    Route::get('render-captcha', [UserController::class, 'renderCaptcha'])->name('captcha.render.re');
    Route::get('check-captcha', [UserController::class, 'checkCaptcha'])->name('captcha.check');
    Route::get('checkemail', [UserController::class, 'checkEmailRegister'])->name('email.check');
    Route::get('get-district', [UserController::class, 'getDistrict'])->name('get-district');
    Route::get('get-ward', [UserController::class, 'getWard'])->name('get-ward');
});
Route::group(['module' => 'User', 'namespace' => $namespace, 'controller' => $namespace . '\\UserController', 'middleware' => 'web'], function () {
    $friendly_link = DB::table('friendly_link')
        ->where('friendly_link', Str::afterLast(Request()->path(), '/'))
        ->first();
    // dd(User_Setting::getLink('user_link', App::getLocale()));
    App::setLocale($friendly_link->lang ?? 'vi');
    Route::prefix(User_Setting::getLink('account_link', App::getLocale()))
        ->controller(UserController::class)
        ->group(function () {
            Route::get(null, 'User')->name('user');
            Route::post('update-password', 'updatePassword')->name('user.update.password');
            Route::post('update-user', 'update')->name('user.update.infor');
            // Route::get('check-email', 'checkEmailRegister')->name('email.check');
        });
});
