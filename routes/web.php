<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;



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
Route::resource('post',\App\Http\Controllers\PostController::class);
Route::resource('settings', \App\Http\Controllers\SettingsController::class);
Route::resource('about', \App\Http\Controllers\AboutController::class);
Route::resource('contacts', \App\Http\Controllers\ContactsController::class);

//website urls
Route::get('/', [App\Http\Controllers\WebsiteController::class, 'home']);
Route::get('contact-us', [App\Http\Controllers\WebsiteController::class, 'contact']);
Route::get('blog',[App\Http\Controllers\WebsiteController::class, 'blog']);
Route::get('our-products',[App\Http\Controllers\WebsiteController::class, 'products']);
Route::get('blog/{post}',[App\Http\Controllers\WebsiteController::class,'post'])->name('post');
Route::get('premier-product/{product}',[App\Http\Controllers\WebsiteController::class,'premier_product'])->name('premier_product');
