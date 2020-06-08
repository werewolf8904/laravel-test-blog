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

Route::get('/', [\App\Http\Controllers\PostsCategoryController::class,'index']);

Route::resource('post','PostController');
Route::resource('posts-category','PostsCategoryController');

Route::post('add-comment/{type}/{id}',[\App\Http\Controllers\CommentController::class,'add'])->name('add-comment');
