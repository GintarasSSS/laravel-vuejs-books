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

Route::prefix('ajax')->group(function () {
   Route::put('books/{id}', fn() => null);
   Route::delete('books/{id}', fn() => null);
});

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');
