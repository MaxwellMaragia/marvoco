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
Route::post('/', [App\Http\Controllers\FrontendController::class, 'store'])->name('save');
Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\YouthController::class, 'index'])->name('home');
Route::resource('youth', \App\Http\Controllers\YouthController::class);
Route::resource('profile',\App\Http\Controllers\Profile::class);
Route::resource('ward',\App\Http\Controllers\WardController::class);
Route::get('download/{id}',[\App\Http\Controllers\YouthController::class, 'download'])->name('download');