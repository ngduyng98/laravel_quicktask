<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;


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

Route::get('lang/{language}', [LocalizationController::class, 'changeLanguage'])->name('change_language');
Route::get('/home', [HomeController::class, 'index'])->name('home_index');
Route::resource('users', UserController::class)->except(['show']);
Route::resource('posts', PostController::class)->except(['index', 'show']);
Route::get('list/{id}', [PostController::class, 'findByIdUser'])->name('posts.list');
