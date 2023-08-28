<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/welcome/{name}', function () {
    return view('welcome');
})->name('welcome');

Route::get('/product/{id}', function() {
    return 
    "
    <h1>this is product page</h1>
    <a href='".route("welcome", "oussama")."'>go to welcome page</a>
    ";
});