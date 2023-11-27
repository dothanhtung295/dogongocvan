<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Modules\Service\Models\Service_Setting;
use Illuminate\Support\Str;
use Modules\Service\Controllers\ServiceController;

$namespace = 'Modules\Service\Controllers';
Route::group(
    ['middleware' => 'web'],
    function () {
        $friendly_link = DB::table('friendly_link')->where('friendly_link', Str::afterLast(Request()->path(), "/"))->first();
        Route::prefix(Service_Setting::getLink('service_link', $friendly_link->lang ?? 'vi'))
            ->controller(ServiceController::class)
            ->group(function () {
                    Route::get(null, 'Service')->name("service");
                });
    }
);
