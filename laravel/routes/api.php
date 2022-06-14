<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ListaController;
use App\Http\Controllers\API\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::prefix('list')->group(function () {
    Route::get('', [ListaController::class,'getUser']);
    Route::get('/savedLists/{user}', [ListaController::class,'getSavedLists']);

    //Route::group(['middleware' => ['jwt.verify']], function() {
        Route::post('', [ListaController::class,'store']);
        Route::post('/save-list', [ListaController::class,'saveList']);
        Route::patch('{list}', [ListaController::class,'update']);
        Route::patch('{list}/addContent', [ListaController::class,'addContentToList']);
        Route::delete('{list}', [ListaController::class,'destroy']);
    //});
});

//User
Route::prefix('user')->group(function () {
    Route::get('', [UserController::class,'getUser']);
    Route::get('{user}/friends', [UserController::class,'getUserFriends']);

    Route::get('authenticated', [UserController::class,'getAuthenticatedUser']);
    Route::post('register', [UserController::class,'register']);
    Route::post('login', [UserController::class,'authenticate']);


    //Route::group(['middleware' => ['jwt.verify']], function() {
        Route::post('friend-request', [UserController::class,'friendRequest']);
        Route::patch('{userId}', [UserController::class,'update']);
        Route::delete('{userId}', [UserController::class,'destroy']);
    //});
});
