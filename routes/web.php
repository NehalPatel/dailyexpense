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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::resource('categories', \App\Http\Controllers\CategoriesController::class);
    Route::resource('tags', \App\Http\Controllers\TagsController::class);
    Route::resource('banks', \App\Http\Controllers\BanksController::class);
    Route::resource('expenses', \App\Http\Controllers\ExpensesController::class);
    Route::resource('incomes', \App\Http\Controllers\IncomesController::class);
});
