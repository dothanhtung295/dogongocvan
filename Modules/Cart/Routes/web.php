<?php

use Modules\Product\Controllers\ProductController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Modules\Cart\Controllers\CartController;
use Modules\Product\Models\Product;
use Modules\Product\Models\Product_Group;
use Modules\Product\Models\Product_Setting;

// Route::get(Product_Setting::getLink(), [ProductController::class, 'Product'])->name('product');
Route::get(Product_Setting::getLink() . '/{group?}', [ProductController::class, 'Product'])->name('product');
Route::get(Product_Setting::getLink() . '/{group}'. '/{product}', [ProductController::class, 'Detail'])->name('product.detail');

Route::get('addtocart', [ProductController::class, 'addToCart'])->name('product.addtocart');
Route::post('luu-danh-gia', [ProductController::class, 'saveComment'])->name('product.comment');

Route::group(['middleware' => 'web'], function(){
    Route::prefix('gio-hang')->controller(CartController::class)->group(function(){
        Route::get(null, 'index')->name('cart.index');
        Route::get('xoa', 'remove')->name('cart.remove');
        Route::get('cap-nhat', 'update')->name('cart.update');
        Route::get('dang-nhap', 'login')->name('cart.checkout.step1');
        Route::get('thong-tin-nhan-hang', 'getInforDelivery')->name('cart.checkout.step2');
        Route::post('thong-tin-nhan-hang', 'postInforDelivery')->name('cart.checkout.step2.post');
        Route::get('thanh-toan-dat-mua', 'getInforCheckout')->name('cart.checkout.step3');
        Route::post('thanh-toan-dat-mua', 'postInforCheckout')->name('cart.checkout.step3.post');
        Route::get('xac-nhan-dat-mua', 'getConfirmCheckout')->name('cart.checkout.step4');
        Route::post('xac-nhan-dat-mua', 'postConfirmCheckout')->name('cart.checkout.step4.post');
        Route::get('hoan-tat', 'completeCheckout')->name('cart.checkout.complete');
    });
});
