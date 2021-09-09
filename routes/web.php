<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\WebsiteController::class, 'home']);
Auth::routes(['register' => false]);


Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');
Route::resource('categories', \App\Http\Controllers\CategoriesController::class);
Route::resource('chemicals',\App\Http\Controllers\ChemicalsController::class);
Route::resource('posts',\App\Http\Controllers\PostController::class);
Route::resource('premier',\App\Http\Controllers\ProductsController::class);
Route::resource('profile',\App\Http\Controllers\Profile::class);
Route::resource('banner',\App\Http\Controllers\BannersController::class);
Route::resource('brands',\App\Http\Controllers\BrandsController::class);
Route::resource('deliverables',\App\Http\Controllers\DeliverablesController::class);
Route::resource('reviews',\App\Http\Controllers\ReviewsController::class);
Route::resource('products',\App\Http\Controllers\ProductsController::class);
