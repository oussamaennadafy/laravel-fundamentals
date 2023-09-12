<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/posts/trash', [PostController::class, 'trash']);

Route::post('/posts/{post}/restore', [PostController::class, 'restore']);

Route::delete('/posts/{post}/deletePermanently', [PostController::class, 'deletePermanently']);

Route::resource('posts', PostController::class);
