<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\Backend\DashboardController::class,'index'])->name('dashboard');

Route::get('products',[\App\Http\Controllers\Backend\ProductController::class,'index'])->name('admin.product');

Route::get('products/create',[\App\Http\Controllers\Backend\ProductController::class,'create'])->name('admin.product.create');

Route::post('products/create',[\App\Http\Controllers\Backend\ProductController::class,'store']);


