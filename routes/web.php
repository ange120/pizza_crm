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
    return view('auth.login');
});

Auth::routes();

Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['role:admin'])->prefix('admin_panel')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\MainController::class, 'index'])->name('homeAdmin'); // /admin
    Route::get('/logout-admin', [App\Http\Controllers\Admin\MainController::class, 'logout'])->name('logoutAdmin'); // /admin
    Route::get('/list-ingredients', [App\Http\Controllers\Admin\StockController::class, 'listIngredients'])->name('listIngredients'); // /admin
    Route::get('/edit-ingredients/{id}', [App\Http\Controllers\Admin\StockController::class, 'editIngredients'])->name('editIngredients'); // /admin
    Route::post('/update-ingredients/{id}', [App\Http\Controllers\Admin\StockController::class, 'editIngredients'])->name('editIngredients'); // /admin
});

Route::middleware(['role:driver'])->prefix('driver_panel')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('homeAdmin'); // /driver
});
