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
    if (Auth::user()) {
        return redirect('home');
    }
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/search/{movie?}/{page?}', [App\Http\Controllers\SearchController::class, 'search'])->name('search');
    Route::get('/result/{id}/{media}', [App\Http\Controllers\RentController::class, 'show'])->name('details');
    Route::get('/rent/{id}/{media}', [App\Http\Controllers\RentController::class, 'rent'])->name('rent');

    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
});