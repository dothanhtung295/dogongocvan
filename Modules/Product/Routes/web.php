<?php

use Modules\Product\Controllers\ProductController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Modules\Product\Models\Product;
use Modules\Product\Models\Product_Group;
use Modules\Product\Models\Product_Setting;

// Route::get(Product_Setting::getLink(), [ProductController::class, 'Product'])->name('product');
Route::get(Product_Setting::getLink() . '/{group?}', [ProductController::class, 'Product'])->name('product');
Route::get(Product_Setting::getLink() . '/{group}'. '/{product}', [ProductController::class, 'Detail'])->name('product.detail');

Route::get('addtocart', [ProductController::class, 'addToCart'])->name('product.addtocart');
Route::post('luu-danh-gia', [ProductController::class, 'saveComment'])->name('product.comment');

