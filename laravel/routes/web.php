<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Crud\UserController;
use App\Http\Controllers\Crud\ListaController;

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

Route::prefix('admin')->group(function () {
    Auth::routes();
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('home', [HomeController::class,'index']);

        Route::prefix('crud')->group(function () {
            //Crud
            Route::resource('/listas', ListaController::class);
            Route::resource('/users', UserController::class);
        });
    });
});

Route::get('', function () {
    return redirect('/admin/login');
});
