<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', [App\Http\Controllers\FrontendController::class, 'personal_registration']);
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
